@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2>Modifier l'auteur</h2>
        <form action="{{ route('admin.auteurs.update', $auteur) }}" method="POST" enctype="multipart/form-data"
            class="w-50 mx-auto bg-light p-4 rounded">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'auteur</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $auteur->nom) }}" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo (optionnelle)</label>
                @if($auteur->photo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $auteur->photo) }}" alt="Photo" style="max-width: 120px;">
                    </div>
                @endif
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('admin.auteurs.index') }}" class="btn btn-secondary ms-2">Annuler</a>
        </form>
    </div>
@endsection