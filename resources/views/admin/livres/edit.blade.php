@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2>Modifier le livre</h2>
        <form action="{{ route('admin.livres.update', $livre) }}" method="POST" enctype="multipart/form-data"
            class="w-75 mx-auto bg-light p-4 rounded">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $livre->titre) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"
                    rows="3">{{ old('description', $livre->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image_couverture" class="form-label">Image de couverture</label>
                @if($livre->image_couverture)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $livre->image_couverture) }}" alt="Couverture" style="max-width: 120px;">
                    </div>
                @endif
                <input type="file" class="form-control" id="image_couverture" name="image_couverture" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="pdf_url" class="form-label">Fichier PDF</label>
                @if($livre->pdf_url)
                    <div class="mb-2">
                        <a href="{{ asset('storage/' . $livre->pdf_url) }}" target="_blank"
                            class="btn btn-outline-primary btn-sm">
                            Voir le PDF actuel
                        </a>
                    </div>
                @endif
                <input type="file" class="form-control" id="pdf_file" name="pdf_url" accept="application/pdf">
                <small class="form-text text-muted">Laissez vide pour conserver le PDF actuel.</small>
            </div>

            <div class="mb-3">
                <label for="auteur_id" class="form-label">Auteur</label>
                <select class="form-control" id="auteur_id" name="auteur_id" required>
                    @foreach($auteurs as $auteur)
                        <option value="{{ $auteur->id }}" {{ $livre->auteur_id == $auteur->id ? 'selected' : '' }}>
                            {{ $auteur->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select class="form-control" id="categorie_id" name="categorie_id">
                    <option value="">Aucune</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $livre->categorie_id == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('admin.livres.index') }}" class="btn btn-secondary ms-2">Annuler</a>
        </form>
    </div>
@endsection