@extends('layouts.admin')

@section('content')
<div class="container mt-4">
     @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2>Liste des livres</h2>
    <a href="{{ route('admin.livres.create') }}" class="btn btn-primary mb-3">Ajouter un livre</a>
    <div class="row g-4">
        @forelse($livres as $livre)
            <div class="col-12 col-sm-6 col-md-3 mb-4" style="max-width: 250px;">
                <div class="card shadow-sm" style="height: 27rem;">
                    <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
                         class="card-img-top shadow" alt="Couverture" style="height: 18rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title mb-1">{{ $livre->titre }}</h6>
                        <p class="card-text text-muted small mb-1">{{ $livre->auteur->nom ?? 'Auteur inconnu' }}</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <a href="{{ route('admin.livres.show', $livre) }}" class="btn btn-success btn-sm fw-bold">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>Aucun livre trouvé.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection