@extends('layouts.admin')
@section('content')

<div class="container mt-3">
    <form class="w-75 bg-light p-3" action="{{ route('admin.livres.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="image_couverture" class="form-label">Image de couverture</label>
        <input type="file" class="form-control" id="image_couverture" name="image_couverture" accept="image/*">
    </div>
    <div class="mb-3">
    <label for="pdf_url" class="form-label">Lien du PDF</label>
    <input type="url" class="form-control" id="pdf_url" name="pdf_url" placeholder="coller le lien ici" required>
</div>
    <div class="mb-3">
        <label for="auteur_id" class="form-label">Auteur</label>
        <select class="form-control" id="auteur_id" name="auteur_id" required>
            @foreach($auteurs as $auteur)
                <option value="{{ $auteur->id }}">{{ $auteur->nom }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="categorie_id" class="form-label">Catégorie</label>
        <select class="form-control" id="categorie_id" name="categorie_id">
            <option value="">Aucune</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-lg btn-primary">Ajouter</button>
</form>
</div>
@endsection