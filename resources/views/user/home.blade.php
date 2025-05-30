<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .categorie{
        text-decoration: none;
        color: #555;
        font-weight: bold;
    }
</style>
</head>
<body>
    
@extends('layouts.user')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-success mb-0">Liste des livres</h3>
        <a href="{{ route('user.livres') }}" class="text-success" style="font-size:1rem;">voir tout <i class="bi bi-chevron-double-right"></i></a>
    </div>
    <div class="row">
        @foreach($livres->take(8) as $livre)
            <div class="col-12 col-sm-6 col-md-3 mb-4 mx-auto" style="max-width: 300px;">
                <div class="card shadow p-2" style="height: 25rem;">
                    <a href="{{ route('user.livres.show', $livre->id) }}">
                        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
                             class="card-img-top" alt="Couverture" style="height: 15rem; object-fit:cover;">
                    </a>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title mb-1">{{ $livre->titre }}</h6>
                        <p class="card-text text-muted small mb-1">{{ $livre->auteur->nom ?? '' }}</p>
                        <div class="d-flex align-items-center text-warning">
                            <i class="fa-solid fa-star me-1"></i>
                            @php
    $moyenne = $livre->notes->avg('valeur');
@endphp
<span class="me-auto text-dark">{{ number_format($moyenne, 1) ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </section>
    <section>
        <div class="row g-4">
          <div class="d-flex justify-content-between align-items-center mt-5">
            <h5 class="text-success mb-2">Catégories des livres</h5>
            <a href="{{ route('user.categories.index') }}" class="text-success">voir tout <i class="fas fa-angle-double-right"></i></a>
          </div>
          <div class="container text-center">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mt-3">
              
            @foreach ( $categories as $categorie )
            <div class="col">
                <div class="p-4 shadow">
                    <a href="{{ route('user.categories.show', $categorie) }}" class="categorie">{{ $categorie->nom }}</a></div>
              </div>
            @endforeach
             
            </div>
          </div>
        </div>
    </section>

    <section>
        <div class="row mt-5">
            <div class="d-flex justify-content-between align-items-center">
          <h5 class="text-success mb-2">Liste des auteurs</h5>
          <a href="{{ route('user.auteurs.index') }}" class="text-success">voir tout <i class="fas fa-angle-double-right"></i></a>
        </div>
        <div id="carouselAuteurs" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($auteurs->chunk(3) as $chunkIndex => $auteursChunk)
            <div class="carousel-item @if($chunkIndex === 0) active @endif">
                <div class="d-flex justify-content-center gap-4 flex-wrap">
                    @foreach ($auteursChunk as $auteur)
                        <div class="text-center">
                            <a href="{{ route('user.auteurs.show', $auteur->id) }}">
                                <img src="{{ asset('storage/' . $auteur->photo) }}" class="rounded-circle border border-success border-2" alt="{{ $auteur->nom }}" width="100" height="100">
                            </a>
                            <p class="mt-2">{{ $auteur->nom }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAuteurs" data-bs-slide="prev">
        <span class="bi bi-chevron-left fs-1 text-dark"></span>
        <span class="visually-hidden">Précédent</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselAuteurs" data-bs-slide="next">
        <span class="bi bi-chevron-right fs-1 text-dark"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>
        </div>
    </section>
@endsection
</body>
</html>