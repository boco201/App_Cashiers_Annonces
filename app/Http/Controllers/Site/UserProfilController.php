<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\{ GalleryImage, Annonce, Category, User, Particulier };

class UserProfilController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $user = Auth::user();
       
       $annonces = $user->annonces()->orderBy('created_at','desc')->paginate(5);
       //$uploads = DB::table('uploads')->orderBy('annonce_id','desc')->get();
   
        return view('site.profils.index', compact('annonces'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
   {

   
    $categories = Category::all();
    $particuliers = Particulier::all();
    $gallery_images = GalleryImage::all();

    return view('site.profils.create', compact('categories', 'particuliers', 'gallery_images'));

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
            'particulier_id' => 'required',
            'title' => 'required|min:10',
            'content' => 'required|min:10|max:1000',
            'price' => 'required',
            'image'         =>  'required|image|max:2048'
        ]);
        
        $annonce = new Annonce();
        $annonce->category_id = $request->category_id;
        $annonce->particulier_id = $request->particulier_id;
        $annonce->title = $request->title;
        $annonce->content = $request->content;
        $annonce->price = $request->price;
        $annonce->image('image', $annonce);
        $annonce->user_id = Auth::id();

     if ($annonce->save()) {
        GalleryImage::imageGallery('gallery_image',$annonce->id);
            return redirect()->route('site.profils.index')->withSuccess('Votre annonce est ajouté avec succès dit boco');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        $categories = Category::all();
        $particuliers = Particulier::all();
        $gallery_images = GalleryImage::all();

        return view('site.profils.show', compact('categories', 'annonce', 'particuliers', 'gallery_images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        $categories = Category::all();
        $particuliers = Particulier::all();

        return view('site.profils.edit', compact('categories', 'annonce', 'particuliers'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        $annonce->category_id = $request->category_id;
        $annonce->particulier_id = $request->particulier_id;
        $annonce->title = $request->title;
        $annonce->content = $request->content;
        $annonce->price = $request->price;
        $annonce->image('image', $annonce);
        $annonce->user_id = Auth::id();

        if ($annonce->save()) {
            return redirect()->route('site.profils.index')->withSuccess('Votre annonce a été modifié avec Succès ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        if ($annonce->delete(request()->id)) {

           $galleryimage = GalleryImage::with('annonce',$annonce->id)->delete();
            
            return redirect()->route('site.profils.index')->withDanger('Votre annonce a été supprimée avec Succès ');
        }
        //
    }
}

 