<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ GalleryImage, Category, Annonce, User, Particulier };
use Illuminate\Support\Facades\Auth;


class AdminAnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonce::with('category')->orderBy('id', 'DESC')->paginate(3);
        return view('admin.annonces.index', compact('annonces'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $particuliers = Particulier::all();

        return view('admin.annonces.create', compact('categories', 'particuliers'));
        //
    }
    
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {

     $request->validate([
        'category_id' => 'required',
        'title' => 'required|min:10',
        'content' => 'required|min:10|max:1000',
        'price' => 'required',
        'image'         =>  'required|image|max:2048'
    ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image/products/'), $new_name);
        $form_data = array(
            'title'       =>   $request->title,
            'content'        =>   $request->content,
            'price'        =>   $request->price,
            'category_id'        =>   $request->category_id,
            'user_id'          => Auth::id(),
            'image'            =>   $new_name
        );

        Annonce::create($form_data);

        return redirect()->route('admin.annonces.index')->withSuccess('Votre annonce est ajouté avec succès!');
    }*/


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
        }
        return redirect()->route('admin.annonces.index')->withSuccess('Votre annonce est ajouté avec succès dit boco');
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

        return view('admin.annonces.show', compact('categories', 'annonce', 'particuliers'));
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

        return view('admin.annonces.edit', compact('categories', 'annonce', 'particuliers'));
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
            return redirect()->route('admin.annonces.index')->withSuccess('Votre annonce a été modifié avec Succès ');
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
        $annonce->delete();    
         return redirect()->route('admin.annonces.index')->withDanger('Votre annonce a été supprimée avec Succès ');
        //
        
    }
}
