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

       @foreach($professionnels as $professionnel)

          <div class="col-md-12">
            <form method="post" action="{{ route('admin.professionnels.premium.update', $professionnel->id) }}">
                @csrf
                 @method('PATCH')
                 <label for="premium" class="checkbox">
                  <h1 style="color: blue;">Category: {{ $professionnel->category->name }}</h1>
                 <h2 style="color: tomato;"><input type="checkbox" name="premium" onChange="this.form.submit()"> <a href="{{ route('site.professionnels.show', $professionnel->id )}}"> {{ $professionnel->title }}</a></h2>

                </label>
                <p><img src="{{ asset('image/professionnels/'.$professionnel->image )}}" width="100" height="100" alt="" /></p>
                  <p>{{ str_limit( $professionnel->content, 100) }}</p>
                <p class="date_publication">L'article est publié, {{ $professionnel->created_at->diffForHumans() }}</p>
                 
              </form><br>
         <form method="post" action="{{ route('admin.professionnels.premium.destroy', $professionnel->id) }}">
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
  <p>{{ $professionnels->links() }}</p>
  </div>   
@endsection