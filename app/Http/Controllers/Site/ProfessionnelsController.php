<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\{Professionnel, Category, User, Pro };

class ProfessionnelsController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $user = Auth::user();
       
       $professionnels = $user->professionnels()->orderBy('created_at','desc')->paginate(5);
       //$uploads = DB::table('uploads')->orderBy('annonce_id','desc')->get();
   
        return view('site.professionnels.index', compact('professionnels'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Pros(Professionnel $professionnel, $slug)
    {

        return view('site.professionnels.pros', compact('professionnel'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
   {

   
    $categories = Category::all();
    $pros = Pro::all();

    return view('site.professionnels.create', compact('categories', 'pros'));

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_id' => 'required',
            'pro_id' => 'required',
            'title' => 'required|min:10',
            'content' => 'required|min:10|max:1000',
            'price' => 'required',
            'image'         =>  'required|image|max:2048'
        ]);
        
        $professionnel = new Professionnel();
        $professionnel->category_id = $request->category_id;
        $professionnel->pro_id = $request->pro_id;
        $professionnel->title = $request->title;
        $professionnel->content = $request->content;
        $professionnel->price = $request->price;
        $professionnel->image('image', $professionnel);
        $professionnel->user_id = Auth::id();

        if ($professionnel->save()) {
            return redirect()->route('site.professionnels.index')->withSuccess('Votre annonce est ajouté avec succès dit boco');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Professionnel $professionnel)
    {
        $categories = Category::all();
        $pros = Pro::all();

        return view('site.professionnels.show', compact('categories', 'professionnel', 'pros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Professionnel $professionnel)
    {
        $categories = Category::all();
        $pros = Pro::all();

        return view('site.professionnels.edit', compact('categories', 'professionnel', 'pros'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professionnel $professionnel)
    {
        $professionnel->category_id = $request->category_id;
        $professionnel->pro_id = $request->pro_id;
        $professionnel->title = $request->title;
        $professionnel->content = $request->content;
        $professionnel->price = $request->price;
        $professionnel->image('image', $professionnel);
        $professionnel->user_id = Auth::id();
        if ($professionnel->save()) {
            return redirect()->route('site.professionnels.index')->withSuccess('Votre annonce a été modifié avec Succès ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professionnel $professionnel)
    {
        if ($professionnel->delete()) {

         return redirect()->route('site.professionnels.index')->withDanger('Votre annonce a été supprimée avec Succès ');
    }

  }
}
