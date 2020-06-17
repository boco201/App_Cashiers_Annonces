@extends('admin.app')

@section('title', 'Create Annonce')

@section('content')
<div class="container mt-4">

@if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}        
        </div>
@endif

@if(count($errors) > 0)
  <div class="alert alert-danger">
  @foreach($errors->all() as $error)
   <ul>
      <li>{{$error}}</li>
   </ul>
  @endforeach
  </div>
@endif
     <h2 style="color:blue;text-align:right">Ajouter une annonce</h2><br>
     <form method="post" action="{{ route('admin.annonces.update', $annonce->id )}}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
         <div class="form-group">
            <label for="category_id">Category: </label>
            <select name="category_id" id="category_id" class="form-control">
               @foreach($categories as $category)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="particulier_id">Identité: </label>
            <select name="particulier_id" id="particulier_id" class="form-control">
               @foreach($particuliers as $particulier)
               <option value="{{ $particulier->id }}">{{ $particulier->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" placeholder="Ajouter un titre" value="{{ $annonce->title }}">
         </div>

         <div class="form-group">
            <label for="content">Description</label>
            <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Ajouter une description">{{ $annonce->content }}</textarea>
         </div>

         <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" name="price" class="form-control" placeholder="Ajouter un prix" value="{{ $annonce->price }}">
         </div>


         <div>
            <label for="image">Upload Image: </label><br>
            <input type="file" name="image" />
              <img src="{{ asset('image/products/'.$annonce->image )}}"  width="100" height="100" />
              <input type="hidden" name="hidden_image" value="{{ $annonce->image }}" />
		   </div>

         <div><br>
         
         <button type="submit" class="btn btn-primary"> Ajouter</button>
        </div>
     </form>

</div>
@endsection