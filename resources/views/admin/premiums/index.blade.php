@extends('admin.app')

@section('title', 'AdminPanel')

@section('content')


  <div class="container mt-4">
  @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}        
        </div>
      @endif

      @if (session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}        
        </div>
      @endif
     <div class="row">

       @foreach($annonces as $annonce)

          <div class="col-md-12">
            <form method="post" action="{{ route('admin.premiums.update', $annonce->id) }}">
                @csrf
                 @method('PATCH')
                 <label for="premiums" class="checkbox">
                  <h1 style="color: blue;">Category: {{ $annonce->category->name }}</h1>
                 <h2 style="color: tomato;"><input type="checkbox" name="premiums" onChange="this.form.submit()"> <a href="{{ route('admin.annonces.show', $annonce->id )}}"> {{ $annonce->title }}</a></h2>

                </label>
                <p><img src="{{ asset('image/products/'.$annonce->image )}}" width="100" height="100" alt="" /></p>
                  <p>{{ str_limit( $annonce->content, 100) }}</p>
                <p class="date_publication">L'article est publié, {{ $annonce->created_at->diffForHumans() }}</p>
                 
              </form><br>
         <form method="post" action="{{ route('admin.premiums.destroy', $annonce->id) }}">
         @method('DELETE')
        @csrf
        <div>
          <button type="submit" class="btn btn-danger">Supprimer annonce</button>
        </div>

              </form>
            </div>
      
    @endforeach

  </div>
  
  <div class="container">
  <p>{{ $annonces->links() }}</p>
  </div>   
@endsection