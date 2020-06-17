@extends('admin.app')

@section('title', 'Boco | show Annonces')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
        <p><a href=""><img src="{{ asset('image/products/'.$annonce->image )}}" width="740" height="500" alt=""></a></p>
        </div>
        <div class="col-md-4">
            <h3><a href="{{ route('site.profils.index')}}"> {{ $annonce->title }}</a></h3>
            <p>{{ $annonce->price}} €</p>
            <p>{{ $annonce->category->name }}</p>
            <form action="">
                <div class="form-group">
                   <label for="name">Nom</label>
                   <input type="text" name="name" class="form-control" placeholder="Ajouter un nom">
                </div>
                <div class="form-group">
                   <label for="email">Mail</label>
                   <input type="text" name="email" class="form-control" placeholder="Ajouter un Mail">
                </div>
                <div class="form-group">
                   <label for="content">Message</label>
                   <textarea name="content" id="content" cols="30" rows="5" class="form-control" placeholder="Ajouter votre message"></textarea>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary">Envoyer votre message</button>
                </div>
            </form>
        </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    @foreach($annonce->gallery_images as $gallery_image)
       <a href=""> <img src="{{ asset('image/galleries/'.$gallery_image->gallery_image )}}" class="d-block w-100" alt=""></a>
       @endforeach
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
 
</div>
        <div class="col-md-12">
          <p>{{ $annonce->content }}</p>
        </div>
    </div>
</div>
<div class="container">
   
</div><br>

@endsection
