@extends('site.app')

@section('title', 'Boco | Pros Annonces')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
        <p><a href=""><img src="{{ asset('image/professionnels/'.$professionnel->image )}}" width="740" height="500" alt=""></a></p>
        </div>
        <div class="col-md-4">
            <h3><a href="{{ route('site.annonces.index')}}"> {{ $professionnel->title }}</a></h3>
            <p>{{ $professionnel->price}} €</p>
            <p>{{ $professionnel->category->name }}</p>
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
    </div>
        <div class="col-md-12">
          <p>{{ $professionnel->content }}</p>
        </div>
    </div>
</div>

@endsection