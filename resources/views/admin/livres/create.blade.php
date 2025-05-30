@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Ajouter un nouveau livre</h2>
    <form action="{{ route('admin.livres.store') }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto bg-light p-4 rounded">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image_couverture" class="form-label">Image de couverture</label>
            <input type="file" class="form-control" id="image_couverture" name="image_couverture" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="pdf_file" class="form-label">Fichier PDF</label>
            <input type="file" class="form-control" id="pdf_url" name="pdf_url" accept="application/pdf">
        </div>

        <div class="mb-3">
            <label for="auteur_id" class="form-label">Auteur</label>
            <select class="form-control" id="auteur_id" name="auteur_id" required>
                @foreach($auteurs as $auteur)
                    <option value="{{ $auteur->id }}" {{ old('auteur_id') == $auteur->id ? 'selected' : '' }}>{{ $auteur->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie_id">
                <option value="">Aucune</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Ajouter le livre</button>
        <a href="{{ route('admin.livres.index') }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</div>
@endsection
