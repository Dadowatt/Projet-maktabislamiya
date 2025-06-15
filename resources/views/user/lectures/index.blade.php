@extends('layouts.user')

@section('content')
    <div class="container">
        <h4 class="mb-4">Ma Liste de Lecture</h4>
        <hr>
        @if($lectures->isEmpty())
            <p>Vous n'avez encore aucun livre dans votre liste de lecture.</p>
        @else
            <div class="row">
                @foreach($lectures as $livre)
                    <div class="col-12 col-sm-6 col-md-3 mb-4 mx-auto" style="max-width: 300px;">
                        <div class="card shadow p-2" style="max-height: 30rem; min-height:30rem;">
                            <a href="{{ route('user.livres.show', $livre->id) }}">
                                <img src="{{ $livre->image_couverture ? asset('storage/' . $livre->image_couverture) : asset('default-cover.jpg') }}"
                                    class="card-img-top" alt="Couverture" style="height: 16rem; object-fit:contain;">
                            </a>
                            <div class="card-body bg-light">
                                <h6 class="card-title">{{ $livre->titre }}</h6>
                                <p class="card-text text-muted small">{{ $livre->auteur->nom ?? 'Auteur inconnu' }}</p>
                                <div class="d-flex align-items-center text-warning">
                                    <i class="fa-solid fa-star me-2"></i>
                                    @php
                                        $moyenne = $livre->notes->avg('valeur');
                                    @endphp
                                    <span class="text-dark">{{ $moyenne ? number_format($moyenne, 1) : '0' }}</span>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('user.livres.lecture', $livre->id) }}" target="_blank"
                                        class="btn btn-success mt-2">
                                        <i class="fas fa-book-open me-2"></i>Reprendre</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection