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
    <p><strong>Auteur :</strong> <a href="#">{{ $livre->auteur->nom ?? '' }}</a></p>
    <p><strong>Catégorie :</strong> {{ $livre->categorie->nom ?? '' }}</p>
    <p><strong>description :</strong> {{ $livre->description }}</p>

    <div class="mb-2">
        {{-- Affichage de la note moyenne --}}
        <span>
            @for($i = 1; $i <= 5; $i++)
                <i class="fa-solid fa-star{{ $i <= round($noteMoyenne) ? ' text-warning' : ' text-secondary' }}"></i>
            @endfor
        </span>
        <span class="ms-2">({{ $nbAvis }} avis)</span>
    </div>

    {{-- Formulaire de notation --}}
    <form action="{{ route('user.livres.note', $livre->id) }}" method="POST" class="mb-2">
        @csrf
        <label class="mb-1">Noter ce livre :</label>
        <div class="rating d-inline-flex">
            @for($i = 5; $i >= 1; $i--)
                <input type="radio" name="valeur" value="{{ $i }}" id="star{{ $i }}" {{ $userNote == $i ? 'checked' : '' }}>
                <label for="star{{ $i }}"><i class="fa-solid fa-star"></i></label>
            @endfor
        </div>
        <button type="submit" class="btn btn-primary mt-2">
            <i class="fas fa-paper-plane"></i> Soumettre ma note
        </button>
    </form>

    {{-- Formulaire d’ajout ou retrait des favoris --}}
<form action="{{ route('user.livres.favoris', $livre->id) }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn {{ $estFavori ? 'btn-danger' : 'btn-outline-danger' }}">
        <i class="fas fa-heart"></i>
        {{ $estFavori ? 'Retirer des favoris' : 'Ajouter à mes favoris' }}
    </button>
</form>

<a href="{{ asset('storage/'.$livre->pdf_url) }}" class="btn btn-success" target="_blank">Lecture</a>
</div>
</div>
@endsection