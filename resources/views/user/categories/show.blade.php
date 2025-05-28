@extends('layouts.user')

@section('content')
<section>
    <a href="{{ route('user.home') }}" class="btn btn-success mb-2">Retour</a>
    <h3 class="text-success mb-4">Livres de la catégorie : {{ $categorie->nom }}</h3>
    <div class="row">
        @forelse($livres as $livre)
            <div class="col-12 col-sm-6 col-md-3 mb-4 mx-auto" style="max-width: 300px;">
                <div class="card shadow p-2" style="height: 25rem;">
                    <a href="{{ route('user.livres.show', $livre->id) }}">
                        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
                             class="card-img-top" alt="Couverture" style="height: 15rem; object-fit:cover;">
                    </a>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title mb-1">{{ $livre->titre }}</h6>
                        <p class="card-text text-muted small mb-1">{{ $livre->auteur->nom ?? '' }}</p>
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-star text-warning me-1"></i>
                            <span class="me-auto">{{ $livre->note ?? '4.7' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucun livre trouvé pour cette catégorie.</p>
        @endforelse
    </div>
</section>
@endsection
