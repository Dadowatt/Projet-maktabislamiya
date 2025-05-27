@extends('layouts.user')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-success mb-0">Liste des livres</h3>
        <a href="{{ route('user.livres') }}" class="text-success" style="font-size:1rem;">voir tout <i class="bi bi-chevron-double-right"></i></a>
    </div>
    <div class="row">
        @foreach($livres->take(4) as $livre)
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
                            <i class="fa-solid fa-star text-waring me-1"></i>
                            <span class="me-auto">{{ $livre->note ?? '4.7' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <a href="{{ route('user.livres') }}" class="btn btn-outline-success">Afficher plus</a>
    </div>
@endsection