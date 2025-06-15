@extends('layouts.admin')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Détails du livre</h2>
        <div class="card mb-4 w-75">
            <div class="row g-0">
                @if($livre->image_couverture)
                    <div class="col-sm-12 col-md-4">
                        <img src="{{ asset('storage/' . $livre->image_couverture) }}" class="img-fluid rounded-start"
                            style="height:30rem" alt="Image de couverture">
                    </div>
                @endif
                <div class="col-sm-12 col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-success">{{ $livre->titre }}</h5>
                        <p class="card-text"><strong>Description :</strong>
                            {{ $livre->description ?? 'Aucune description' }}</p>
                        <p class="card-text"><strong>Auteur :</strong> {{ $livre->auteur->nom }}</p>
                        <p class="card-text"><strong>Catégorie :</strong> {{ $livre->categorie->nom ?? 'Aucune' }}</p>
                        <p class="card-text">
                            <strong>Fichier PDF :</strong>
                            @if($livre->pdf_url)
                                <a href="{{ asset('storage/' . $livre->pdf_url) }}" class="btn btn-sm btn-outline-success"
                                    target="_blank">Voir le PDF</a>
                            @else
                                <span class="text-muted">Non disponible</span>
                            @endif
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('admin.livres.edit', $livre) }}" class="btn btn-warning me-2">Modifier</a>
                            <form action="{{ route('admin.livres.destroy', $livre) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="{{ route('admin.livres.index') }}" class="btn btn-success ms-2">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection