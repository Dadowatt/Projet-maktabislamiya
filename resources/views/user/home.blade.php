<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .categorie {
      text-decoration: none;
      color: #555;
      font-weight: bold;
    }

    .hover-card {
      border-radius: 15px;
      transition: all 0.3s ease-in-out;
    }

    .hover-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      background-color: #f1fdf1;
    }
  </style>
</head>

<body>

  @extends('layouts.user')

  @section('content')
    <section class="bg-light p-2">
    <div class="d-flex justify-content-between mb-2">
      <h3 class="mb-4">Liste des livres</h3>
      <a href="{{ route('user.livres') }}" class="text-success" style="font-size:1rem;">voir tout <i
        class="bi bi-chevron-double-right"></i></a>
    </div>
    <div class="row">
      @foreach($livres->take(8) as $livre)
      <div class="col-12 col-sm-6 col-md-3 mb-4 mx-auto" style="max-width: 300px;">
      <div class="card hover-card shadow p-2" style="min-height: 28rem;">
      <a href="{{ route('user.livres.show', $livre->id) }}">
      <img
        src="{{ $livre->image_couverture ? asset('storage/' . $livre->image_couverture) : asset('default-cover.jpg') }}"
        class="card-img-top" alt="Couverture" style="height: 16rem; object-fit:contain;">
      </a>
      <div class="card-body bg-light">
      <h6 class="card-title">{{ $livre->titre }}</h6>
      <p class="card-text text-muted small">{{ $livre->auteur->nom ?? '' }}</p>
      <div class="d-flex align-items-center text-warning">
        <i class="fa-solid fa-star me-1"></i>
        @php
      $moyenne = $livre->notes->avg('valeur');
      @endphp
        <span class="me-auto text-dark">{{ number_format($moyenne, 1) ?? '0' }}</span>
      </div>
      </div>
      </div>
      </div>
    @endforeach
    </div>
    </section>

    <section class="mt-5 bg-light p-2">
    <div class="d-flex justify-content-between mb-4">
      <h5>Catégories des livres</h5>
      <a href="{{ route('user.categories.index') }}" class="text-success">voir tout <i
        class="fas fa-angle-double-right"></i></a>
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
      @foreach ($categories->take(10) as $categorie)
      @php
      $icons = [
      'Hajj & Umra' => 'fa-solid fa-kaaba',
      'Comportement' => 'bi bi-people-fill',
      'Apprentissage' => 'fas fa-mosque',
      'Biographie' => 'fas fa-brain',
      'Adoration' => 'fa-solid fa-person-praying',
      'Prières et Purification' => 'fas fa-heartbeat',
      'Invocations' => 'fas fa-feather-alt',
      'Mariage' => 'fas fa-landmark',
      'Invocation' => 'fa-solid fa-place-of-worship',
      'Jeûne & Zakat' => 'fa-solid fa-hand-holding-heart',
      'Hadith' => 'fas fa-flask',
      ];
      $icon = $icons[$categorie->nom] ?? 'fas fa-book';
      @endphp

      <div class="col">
      <a href="{{ route('user.categories.show', $categorie) }}" class="text-decoration-none">
        <div class="card text-center h-100 border-0 shadow-sm hover-card p-3">
        <div class="mb-2">
        <i class="{{ $icon }} fa-2x text-success"></i>
        </div>
        <h6 class="text-dark">{{ $categorie->nom }}</h6>
        </div>
      </a>
      </div>
    @endforeach
    </div>
    </section>

    <section class="bg-light p-2 mt-5">
    <div class="row">
      <div class="d-flex justify-content-between mb-4">
      <h5>Liste des auteurs</h5>
      <a href="{{ route('user.auteurs.index') }}" class="text-success">voir tout <i
        class="fas fa-angle-double-right"></i></a>
      </div>
      <div id="carouselAuteurs" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach ($auteurs->chunk(4) as $chunkIndex => $auteursChunk)
      <div class="carousel-item @if($chunkIndex === 0) active @endif">
      <div class="d-flex justify-content-center gap-4 flex-wrap">
        @foreach ($auteursChunk as $auteur)
      <div class="text-center" style="width: 150px;">
      <a href="{{ route('user.auteurs.show', $auteur->id) }}">
      <img src="{{ asset('storage/' . $auteur->photo) }}"
      class="rounded-circle border border-success border-2" alt="{{ $auteur->nom }}" width="100"
      height="100">
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