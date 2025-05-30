@extends('layouts.user')

@section('content')
<div class="row align-items-start">
    <div class="col-md-4">
        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
             class="img-fluid rounded shadow" alt="Couverture" style="height: 23rem;">
    </div>
    <div class="col-md-8">
        <h5 class="text-secondary mb-2">Details de livre:</h5>
        <h4 class="text-success fw-bold">{{ $livre->titre }}</h4>
        <p>
            <strong>Auteur :</strong>
            <a href="{{ route('user.auteurs.show', $livre->auteur->id ?? '') }}">
                {{ $livre->auteur->nom ?? '' }}
            </a>
        </p>
        <p><strong>Catégories :</strong> {{ $livre->categorie->nom }}</p>
        <p><strong>Description :</strong> {{ $livre->description }}</p>
        <div>
            <span>
                @for($i = 1; $i <= 5; $i++)
                    <i class="fa-solid fa-star{{ $i <= round($noteMoyenne) ? ' text-warning' : ' text-secondary' }}"></i>
                @endfor
            </span>
            <span class="ms-2">({{ $nbAvis }} avis)</span>
        </div>
        <form action="{{ route('user.livres.note', $livre->id) }}" method="POST" class="mb-2">
            @csrf
            <label class="me-2">Noter ce livre :</label>
            <div class="rating d-inline-flex mt-2">
                @for($i = 5; $i >= 1; $i--)
                    <input type="radio" name="valeur" value="{{ $i }}" id="star{{ $i }}" {{ $userNote == $i ? 'checked' : '' }}>
                    <label for="star{{ $i }}"><i class="fa-solid fa-star"></i></label>
                @endfor
            </div>
            <button type="submit" class="btn btn-primary ms-3">
                <i class="fas fa-paper-plane"></i> Soumettre ma note
            </button>
        </form>
        <div class="d-flex align-items-center">
            <a href="{{ route('user.livres.lecture', $livre->id) }}" class="btn btn-primary me-3">
    Lecture
</a>

            <form action="{{ route('user.livres.favoris', $livre->id) }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="btn {{ $estFavori ? 'btn-danger' : 'btn-outline-danger' }}">
                    <i class="fas fa-heart"></i>
                    {{ $estFavori ? 'Retirer des favoris' : 'Ajouter à mes favoris' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
