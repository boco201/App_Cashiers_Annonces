@extends('site.app')

@section('title', 'Boco | Annonces')

@section('content')

<div class="container mt-4">
@if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}        
        </div>
@endif
    <div class="row">
        <div class="col-md-8">
            <div class="row">
            @foreach($annonces as $annonce)
              <div class="col-md-5">
                    <p><a href=""><img src="{{ asset('image/products/'.$annonce->image )}}" width="300" height="250" alt=""></a></p>
              </div>
              <div class="col-md-7">
                    <h3> <a href="{{ $annonce->path()}}"> {{ $annonce->title }}</a></h3>
                    <p>{{ str_limit($annonce->content, 200) }}</p>
                    <p>{{ $annonce->price}} €</p>
                    <p>{{ $annonce->category->name }}</p>
                    <p>{{ $annonce->particulier->name}} </p>
              </div>
              @endforeach
            </div>
        </div>
        <div class="col-md-4">
        <h1>Pub</h1>
        </div>

        <div class="col-md-8">
            <div class="row">
            @foreach($professionnels as $professionnel)
              <div class="col-md-5">
                    <p><a href=""><img src="{{ asset('image/professionnels/'.$professionnel->image )}}" width="300" height="250" alt=""></a></p>
              </div>
              <div class="col-md-7">
                    <h3> <a href="{{ $professionnel->path() }}"> {{ $professionnel->title }}</a></h3>
                    <p>{{ str_limit($professionnel->content, 200) }}</p>
                    <p>{{ $professionnel->price}} €</p>
                    <p>{{ $professionnel->category->name }}</p>
                    <p>{{ $professionnel->pro->name }}</p>
              </div>
              @endforeach
            </div>
        </div>
        <div class="col-md-4">
        <h1>Pub</h1>
        </div>

    </div>
</div>
<div class="container">
<p>{{ $annonces->links() }}</p>
</div>
@endsection

