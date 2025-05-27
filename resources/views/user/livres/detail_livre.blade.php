@extends('layouts.user')

@section('content')
@if(session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
@endif
<div class="row align-items-start">
    <div class="col-md-4">
        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
             class="img-fluid rounded shadow" alt="Couverture">
    </div>
    <div class="col-md-8">
        <h1 class="text-success fw-bold">{{ $livre->titre }}</h1>
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
        <form action="{{ route('user.livres.note', $livre->id) }}" method="POST" class="mb-1">
            @csrf
            <label class="mb-1">Noter ce livre :</label>
            <div class="rating d-inline-flex">
    @for($i = 5; $i >= 1; $i--)
        <input type="radio" name="note" value="{{ $i }}" id="star{{ $i }}" {{ $userNote == $i ? 'checked' : '' }}>
        <label for="star{{ $i }}"><i class="fa-solid fa-star"></i></label>
    @endfor
</div>
</form>
  <button type="submit" class="btn btn-primary mt-1"><i class="fas fa-paper-plane"></i> Soumettre ma note</button>
        <form action="{{ route('user.livres.favoris', $livre->id) }}" method="POST" class="mb-2">
            @csrf
            <button type="submit" class="btn btn-outline-danger mt-2"><i class="fas fa-heart"></i> Ajouter à mes favoris</button>
        </form>
        <a href="{{ asset('storage/'.$livre->pdf_url) }}" class="btn btn-success" target="_blank">Lecture</a>
    </div>
</div>
@endsection