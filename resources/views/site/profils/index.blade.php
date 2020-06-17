@extends('admin.app')

@section('title', 'Boco | UserPanel')

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
      <h3 style="text-align:right;"><a href="{{ route('site.professionnels.index')}}"> AdminPanelPros</a>&nbsp&nbsp | &nbsp<a href="{{ route('site.annonces.index')}}"> Se deconnecter</a>&nbsp&nbsp | &nbsp<a href="{{ route('site.profils.create')}}"> Ajouter une annonce</a></h3>
     <div></div><br>
    <table class="table table-condensed">
    <tr style="background-color:tomato;color:#fff;font-weight:bold;">
        <td>ID</td>
        <td>Image</td>
        <td>Category</td>
        <td>Title</td>
        <td>Content</td>
        <td>Price</td>
        <td>Editer</td>
        <td>Supprimer</td>
    </tr>
    @foreach($annonces as $annonce)
    <tr>
        <td>{{ $annonce->id }}</td>
        <td><img src="{{ asset('image/products/'.$annonce->image )}}" width="100" height="100" alt=""></td>
        <td>{{ $annonce->category->name }}</td>
        <td><a href="{{ route('site.profils.show', $annonce->id) }}"> {{ $annonce->title }}</a></td>
        <td>{{ str_limit($annonce->content, 100) }}</td>
        <td>{{ $annonce->price }}</td>
        <td><a href="{{ route('site.profils.edit', $annonce->id) }}" class="btn btn-secondary">Editer</a></td>
        <td> <form method="post" action="{{ route('site.profils.destroy', $annonce->id )}}" enctype="multipart/form-data">
      @csrf
      @method('DELETE')
      <div>
      <button type="submit" class="btn btn-danger"> Supprimer </button>
        </div>
     </form>Supprimer</td>
    </tr>
    @endforeach
    </table>
</div>
<div class="container">
<p>{{ $annonces->links() }}</p>
</div>
@endsection