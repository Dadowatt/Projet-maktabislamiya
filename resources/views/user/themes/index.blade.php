@extends('layouts.user')

@section('content')
    <section class="container my-4">
        <h3 class="mb-4 text-success">Vos thèmes choisis et leurs livres</h3>
        @forelse ($categories as $categorie)
        <hr>
            <div class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="text-primary mb-0">{{ $categorie->nom }}</h4>

                    <form action="{{ route('user.themes.retirer', $categorie->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir retirer ce thème ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            Retirer ce thème
                        </button>
                    </form>
                </div>
                <div class="row">
                    @forelse ($categorie->livres as $livre)
                        <div class="col-12 col-sm-6 col-md-3 mb-4">
                            <div class="card h-100 shadow-sm">
                                <a href="{{ route('user.livres.show', $livre->id) }}">
                                    <img src="{{ $livre->image_couverture ? asset('storage/' . $livre->image_couverture) : asset('default-cover.jpg') }}"
                                         class="card-img-top" alt="{{ $livre->titre }}" style="height: 200px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $livre->titre }}</h6>
                                    <p class="card-text text-muted small">
                                        {{ $livre->auteur->nom ?? 'Auteur inconnu' }}
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-star text-warning me-1"></i>
                                        <span class="me-auto">{{ $livre->note ?? '4.7' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Aucun livre trouvé pour cette catégorie.</p>
                    @endforelse
                </div>
            </div>
        @empty
            <p class="text-muted">Vous n'avez sélectionné aucun thème pour le moment.</p>
        @endforelse
    </section>
@endsection
