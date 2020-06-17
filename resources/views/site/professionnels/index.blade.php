@extends('admin.app')

@section('title', 'Boco | ProsPanel')

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
      <h3 style="text-align:right;"><a href="{{ route('site.comptes.account') }}" target="_blank" rel="noopener noreferrer">Voire compte</a> &nbsp&nbsp|&nbsp&nbsp<a href="{{ route('site.comptes.account') }}">Se deconnecter</a>&nbsp&nbsp | &nbsp<a href="{{ route('site.professionnels.create')}}"> Ajouter une annonce</a></h3>
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
    @foreach($professionnels as $professionnel)
    <tr>
        <td>{{ $professionnel->id }}</td>
        <td><img src="{{ asset('image/professionnels/'.$professionnel->image )}}" width="100" height="100" alt=""></td>
        <td>{{ $professionnel->category->name }}</td>
        <td><a href="{{ route('site.professionnels.show', $professionnel->id) }}"> {{ $professionnel->title }}</a></td>
        <td>{{ str_limit($professionnel->content, 100) }}</td>
        <td>{{ $professionnel->price }}</td>
        <td><a href="{{ route('site.professionnels.edit', $professionnel->id) }}" class="btn btn-secondary">Editer</a></td>
        <td> <form method="post" action="{{ route('site.professionnels.destroy', $professionnel->id )}}" enctype="multipart/form-data">
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
<p>{{ $professionnels->links() }}</p>
</div>
@endsection