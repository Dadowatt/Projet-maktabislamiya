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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('user.home') }}">Maktaba.<span class="text-success">islam</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Adoration</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Apprentissage</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Comportement islamique</a></li>
            </ul>
            <form class="d-flex ms-auto" action="#" method="GET">
                <input class="form-control me-2" type="search" placeholder="Chercher par Titre, Auteur..." aria-label="Search">
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
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-person me-2"></i> Auteurs</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-journal-bookmark me-2"></i> Livres</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-tags me-2"></i> Catégories</a>
                </div>
                <h6 class="text-success fw-bold mb-3">Bibliothèque</h6>
                <div class="list-group mb-3">
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-list-check me-2"></i> Liste De Lecture</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-person-badge me-2"></i> Mes Auteurs</a>
                     <a href="{{ route('user.favoris.index') }}" class="list-group-item list-group-item-action">
                     <i class="bi bi-heart-fill text-danger me-2"></i> Mes Favoris
                     </a>
                </div>
                <h6 class="text-success fw-bold mb-3">Activité</h6>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-bookmark-check me-2"></i> Thèmes choisi</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-person-circle me-2"></i> Profil</a>
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
                            <a href="{{ route('user.livres.show', $livre->id) }}" class="btn btn-success btn-sm py-0 px-2" style="font-size: 0.85rem;">Lecture</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <h6 class="fw-bold text-success mt-4">Top Auteurs</h6>
        <div class="d-flex mb-2">
    @foreach($topAuteurs as $auteur)
        <div class="text-center me-2">
            <img src="{{ $auteur->photo ? asset('storage/'.$auteur->photo) : asset('default-avatar.png') }}"
                 class="rounded-circle border border-success mb-1"
                 style="width: 48px; height: 48px; object-fit: cover;"
                 alt="{{ $auteur->nom }}">
            <div style="font-size: 0.85rem;">
                {{ $auteur->nom }}
                <span class="bg-secondary small">{{ $auteur->followers_count }}</span>
            </div>
        </div>
    @endforeach
</div>
    </div>
</div>
    </div>
</div>

<footer class="bg-dark text-light pt-4 text-center mt-4">
    <small>&copy; {{ date('Y') }} Maktaba.islam</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>