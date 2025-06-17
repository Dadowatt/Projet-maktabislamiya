@extends('layouts.user')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4 text-success">Tous les Livres</h3>
        <div class="row">
            @forelse($livres as $livre)
                <div class="col-12 col-sm-6 col-md-3 mb-4 mx-auto" style="max-width: 300px;">
                    <div class="card shadow p-2" style="min-height: 28rem;">
                        <a href="{{ route('user.livres.show', $livre->id) }}">
                            <img src="{{ $livre->image_couverture ? asset('storage/' . $livre->image_couverture) : asset('default-cover.jpg') }}"
                                class="card-img-top" alt="Couverture" style="height:16rem; object-fit:contain;">
                        </a>
                        <div class="card-body bg-light">
                            <h6 class="card-title">{{ $livre->titre }}</h6>
                            <p class="card-text text-muted small">{{ $livre->auteur->nom ?? 'Auteur inconnu' }}</p>
                            <div class="d-flex align-items-center text-warning">
                                <i class="fa-solid fa-star me-1"></i>
                                @php
                                    $moyenne = $livre->notes->avg('valeur');
                                @endphp
                                <span class="me-auto text-dark">{{ $moyenne ? number_format($moyenne, 1) : '' }}</span>
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