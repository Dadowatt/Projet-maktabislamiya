@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Modifier la catégorie</h2>
    <form action="{{ route('admin.categories.update', $categorie) }}" method="POST" 
    class="w-50 mx-auto bg-light p-4 rounded">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $categorie->nom) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</div>
@endsection