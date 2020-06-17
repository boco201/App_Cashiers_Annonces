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
     <h2 style="color:blue;text-align:right"><a href="{{ route('site.professionnels.create')}}"> Ajouter une annonce</a></h2><br>
     <form method="post" action="{{ route('site.professionnels.update', $professionnel->id )}}" enctype="multipart/form-data">
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
            <label for="pro_id">Identité: </label>
            <select name="pro_id" id="pro_id" class="form-control">
               @foreach($pros as $pro)
               <option value="{{ $pro->id }}">{{ $pro->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" placeholder="Ajouter un titre" value="{{ $professionnel->title }}">
         </div>

         <div class="form-group">
            <label for="content">Description</label>
            <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Ajouter une description">{{ $professionnel->content }}</textarea>
         </div>

         <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" name="price" class="form-control" placeholder="Ajouter un prix" value="{{ $professionnel->price }}">
         </div>


         <div>
            <label for="image">Upload Image: </label><br>
            <input type="file" name="image" />
              <img src="{{ asset('image/professionnels/'.$professionnel->image )}}"  width="100" height="100" />
              <input type="hidden" name="hidden_image" value="{{ $professionnel->image }}" />
		   </div>

         <div><br>
         
         <button type="submit" class="btn btn-primary"> Ajouter</button>
        </div>
     </form>

</div>
@endsection