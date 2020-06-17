@extends('site.app')

@section('title', 'Boco | Annonces')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
        <p><a href=""><img src="{{ asset('image/products/'.$annonce->image )}}" width="770" height="500" alt=""></a></p>
        </div>
        <div class="col-md-4">
            <h3><a href="{{ route('site.annonces.index')}}"> {{ $annonce->title }}</a></h3>
            <p>{{ $annonce->price}} €</p>
            <p>{{ $annonce->category->name }}</p>
            <p>{{ $annonce->particulier->name }}</p>
        </div>
        <div class="col-md-12"> 
        @foreach($annonce->gallery_images as $gallery_image)
        <tr>
        <a href=""><img src="{{ asset('image/galleries/'.$gallery_image->gallery_image )}}" width="150" height="150" alt=""></a>
        </tr>
       
        @endforeach
        </div>
        <div class="col-md-12">
          <p>{{ $annonce->content }}</p>
        </div>
    </div>
</div>

@endsection



