@extends('layouts.user')

@section('content')
    <a href="{{ route('user.home') }}" class="text-success fs-3"><i class="bi bi-arrow-left-circle"></i></a>
    <h4 class="text-muted mb-2">Details du livre:</h4>
    <div class="card mb-4 mx-auto border-0">
    <div class="row g-0">
    <div class="col-sm-12 col-md-4">
        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
             class="img-fluid rounded-start shadow" alt="Couverture" style="height: 28rem;">
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="card-body">
            <h5 class="card-title text-success mb-3">{{ $livre->titre }}</h5>
            <p class="catd-text"><strong>Auteur :</strong> <a href="{{ route('user.auteurs.show', $livre->auteur->id ?? '') }}">
            {{ $livre->auteur->nom ?? '' }}</a></p>
            <p class="card-text"><strong>Description :</strong> {{ $livre->description }}</p>
            <p class="card-text"><strong>Catégories :</strong> {{ $livre->categorie->nom }}</p>
        <div>
            <span>
                @for($i = 1; $i <= 5; $i++)
                    <i class="fa-solid fa-star{{ $i <= round($noteMoyenne) ? ' text-warning' : ' text-secondary' }}"></i>
                @endfor
            </span>
            <span class="ms-2">({{ $nbAvis }} avis)</span>
        </div>
        <form action="{{ route('user.livres.note', $livre->id) }}" method="POST" class="mb-4">
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
        <a href="{{ route('user.livres.lecture', $livre->id) }}" class="btn btn-success me-3" target="_blank">
            Lecture
        </a>
        <a href="{{ asset('storage/' . $livre->pdf_url) }}" class="btn btn-sm btn-outline-success p-2 me-3" download>
                Télécharger le PDF
            </a>
            <form action="{{ route('user.livres.favoris', $livre->id) }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="btn p-2 {{ $estFavori ? 'btn-danger' : 'btn-outline-danger' }}">
                    <i class="fas fa-heart"></i>
                    {{ $estFavori ? 'Retirer des favoris' : 'Ajouter à mes favoris' }}
                </button>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
@endsection
