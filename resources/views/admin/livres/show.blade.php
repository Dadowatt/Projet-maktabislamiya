@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card h-100 shadow-sm">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
                             class="img-fluid rounded-start h-100" alt="Couverture">
                    </div>
                    <div class="col-8">
                        <div class="card-body d-flex flex-column h-100">
                            <h6 class="card-title mb-1">{{ $livre->titre }}</h6>
                            <p class="card-text text-muted small mb-1">{{ $livre->auteur->nom ?? 'Auteur inconnu' }}</p>
                            <p>{{ $livre->description }}</p>
                            <p class="text-muted small mb-1">ajouté le {{ $livre->created_at->format('d/m/Y') }}</p>
                            <h6 class="card-title mb-1">
                                Catégorie: <span class="fw-normal">{{ $livre->categorie->nom ?? 'Aucune' }}</span>
                            </h6>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <a href="{{ route('admin.livres.edit', $livre) }}" class="btn btn-success btn-sm fw-bold">Modifier</a>
                              <form action="{{ route('admin.livres.destroy', $livre) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                               <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce livre ?')">Supprimer</button>
                                </form>
                                <a href="{{ $livre->pdf_url }}" class="btn btn-primary" target="_blank">Voir pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection