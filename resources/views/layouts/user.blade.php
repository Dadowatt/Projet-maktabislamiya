<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maktaba.islam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        footer a{
            text-decoration: none;
        }
        .main-content-scroll {
            max-height: 85vh;
            overflow-y: auto;
        }
        .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-start;
}
.rating input[type="radio"] {
    display: none;
}
.rating label {
    cursor: pointer;
    font-size: 2rem;
    color: #ccc;
    transition: color 0.2s;
}
.rating label:hover,
.rating label:hover ~ label,
.rating input:checked ~ label {
    color: #ffc107 !important;
}

    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light* bg-light">
    @php
    $adoration = \App\Models\Categorie::where('nom', 'Adoration')->first();
    $apprentissage = \App\Models\Categorie::where('nom', 'Apprentissage')->first();
    $comportement = \App\Models\Categorie::where('nom', 'Comportement')->first();
@endphp
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('user.home') }}">Maktaba.<span class="text-success">islam</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-3">
                <li class="nav-item me-3"><a class="nav-link active" href="{{ route('user.home') }}">Accueil</a></li>

                @if($adoration)
<li class="nav-item">
    <a class="nav-link" href="{{ route('user.categories.show', $adoration->id) }}"><span><i class="bi bi-heart-fill text-success me-1"></i></span>Adoration</a>
</li>
@endif
                @if($apprentissage)
<li class="nav-item">
    <a class="nav-link" href="{{ route('user.categories.show', $apprentissage->id) }}"><i class="bi bi-mortarboard-fill me-2 text-success"></i>Apprentissage</a>
</li>
@endif
            @if($comportement)
<li class="nav-item">
    <a class="nav-link" href="{{ route('user.categories.show', $comportement->id) }}"><i class="bi bi-people-fill me-2 text-success"></i>Comportement</a>
</li>
@endif
            </ul>
    <form class="d-flex ms-auto" action="{{ route('user.recherche') }}" method="GET">
    <input class="form-control me-2" type="search" name="q" placeholder="Trier par..." aria-label="Search" required>
    <select class="form-select me-2" name="type" style="width: auto;">
        <option value="livre" selected>Livre</option>
        <option value="auteur">Auteur</option>
        <option value="categorie">Catégorie</option>
    </select>
    
    <button class="btn btn-success" type="submit">Chercher</button>
</form>
        </div>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="row">
        <!-- Sidebar gauche -->
        <div class="col-md-2">
            <div class="list-group mb-3">
                <h6 class="text-success fw-bold mb-2">Catégorie</h6>
                <div class="list-group mb-3">
                    <a href="{{ route('user.auteurs.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-person me-2"></i> Auteurs</a>
                    <a href="{{ route('user.livres') }}" class="list-group-item list-group-item-action"><i class="bi bi-journal-bookmark me-2"></i> Livres</a>
                    <a href="{{ route('user.categories.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-tags me-2"></i> Catégories</a>
                </div>
                <h6 class="text-success fw-bold mb-3">Bibliothèque</h6>
                <div class="list-group mb-3">
                    <a href="{{ route('user.lectures.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-list-check me-2"></i> Liste De Lecture</a>
                    <a href="{{ route('user.auteurs.auteurs-suivi') }}" class="list-group-item list-group-item-action"><i class="bi bi-person-badge me-2"></i> Mes Auteurs</a>
                     <a href="{{ route('user.favoris.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-heart-fill text-danger me-2"></i> Mes Favoris</a>
                </div>
                <h6 class="text-success fw-bold mb-3">Activité</h6>
                <div class="list-group">
                    <a href="{{ route('user.themes') }}" class="list-group-item list-group-item-action"><i class="bi bi-bookmark-check me-2"></i> Thèmes choisi</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-person-circle me-2"></i> Profile</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Contenu dynamique central -->
        <div class="col-md-8 overflow-auto">
            <div class="container py-4 main-content-scroll">
                @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('info'))
    <div class="alert alert-info">{{ session('info') }}</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
                @yield('content')
            </div>
        </div>

<!-- Sidebar droite -->
<div class="col-md-2 mb-3">
    <div>
        <h6 class="fw-bold text-success">Derniers livres publiés</h6>
        @foreach($livresRecents as $livre)
            <div class="card mb-2">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}" class="img-fluid rounded-start" alt="Couverture">
                    </div>
                    <div class="col-8">
                        <div class="card-body py-2 px-2">
                            <h6 class="card-title mb-1" style="font-size: 0.95rem;">{{ $livre->titre }}</h6>
                            <a href="{{ route('user.livres.show', $livre->id) }}" class="btn btn-success btn-sm py-0 px-2" style="font-size: 0.85rem;">consulter</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <h6 class="fw-bold text-success mt-4">Top Auteurs</h6>
        <div class="d-flex mb-2">
    @foreach($topAuteurs as $auteur)
        <div class="text-center me-2">
            <a href="{{ route('user.auteurs.show', $auteur->id) }}">
            <img src="{{ $auteur->photo ? asset('storage/'.$auteur->photo) : asset('default-avatar.png') }}"
                 class="rounded-circle border border-success mb-1"
                 style="width: 55px; height: 55px; object-fit: cover;"
                 alt="{{ $auteur->nom }}"></a>
            <div style="font-size: 0.85rem;">
                {{ $auteur->nom }}
                <!-- <span class="bg-secondary small">{{ $auteur->followers_count }}</span> -->
            </div>
        </div>
    @endforeach
</div>
    </div>
</div>
    </div>
</div>

<footer class="bg-light text-dark pt-5 pb-4">
  <div class="container text-md-left">
    <div class="row">
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
        <h5 class="text-uppercase fw-bold mb-4">
        Maktaba Islam
        </h5>
        <p>Maktaba Islam est une bibliothèque numérique islamique à but non
          lucratif conçue pour les musulman(e)s francophones afin de les
          fournir un accès direct aux ressources d'information, numériques
          et analogiques de la religion islamique.</p>
        <div class="mt-3">
          <a href="#" class="me-3"><i class="text-success fab fa-facebook"></i></a>
          <a href="#" class="me-3"><i class="text-success fab fa-twitter"></i></a>
          <a href="#" class="me-3"><i class="text-success fab fa-instagram"></i></a>
          <a href="#" class="me-3"><i class="text-success fab fa-telegram"></i></a>
        </div>
      </div>

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold mb-4">Services</h6>
        <p><a href="#" class="text-dark">À propos de nous</a></p>
        <p><a href="#" class="text-dark">Mon Compte</a></p>
        <p><a href="#" class="text-dark">Nous contacter</a></p>
      </div>

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold mb-4">Informations légales</h6>
        <p><a href="#" class="text-dark">Politique de confidentialité</a></p>
        <p><a href="#" class="text-dark">Conditions générales d'utilisation</a></p>
        <p><a href="#" class="text-dark"> FAQ</a></p>
      </div>

      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <h6 class="text-uppercase fw-bold mb-4">Contact Info</h6>
        <p><i class="fas fa-phone me-2 text-success"></i> +221 33 837 55 51</p>
        <p><i class="fas fa-envelope me-2 text-success"></i> Maktaba-islam@gmail.com</p>
        <p><i class="fas fa-map-marker-alt me-2 text-success"></i> Ville de Guediawaye. Dakar, Rue SN-77</p>
      </div>
    </div>
  </div>

  <div class="container mt-4 border-top pt-3 text-center">
    <p class="mb-0">&copy; {{ date('Y') }} <span class="text-success">Maktaba Islam.</span> Tout droit réservé.</p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>