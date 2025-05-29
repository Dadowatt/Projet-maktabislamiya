@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <div class="row align-items-center mb-4">
        <div class="col-md-3">
            <div style="border: 3px solid #2ecc40; border-radius: 50%; width: 150px; height: 150px; overflow: hidden;">
                <img src="{{ $auteur->photo ? asset('storage/'.$auteur->photo) : asset('default-avatar.png') }}"
                     alt="{{ $auteur->nom }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
        <div class="col-md-6">
            <h3>{{ $auteur->nom }}</h3>
            <p class="text-muted">{{ $auteur->followers_count }} {{ Str::plural('abonné', $auteur->followers_count) }}</p>

            @php
                $isFollowing = false;
                if (isset($user) && $user->auteurSuivis) {
                    $isFollowing = $user->auteurSuivis->contains($auteur->id);
                }
            @endphp

            <form action="{{ route('user.auteurs.toggleFollow', $auteur->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-{{ $isFollowing ? 'danger' : 'primary' }}">
                    {{ $isFollowing ? 'Ne plus suivre' : 'Suivre' }}
                </button>
            </form>
        </div>
    </div>

    <hr>

    <h4>Ouvrages de {{ $auteur->nom }}</h4>
    <div class="row g-4">
        @forelse($auteur->livres as $livre)
            <div class="col-12 col-sm-6 col-md-3 mb-4" style="max-width: 250px;">
                <div class="card shadow-sm" style="height: 27rem;">
                    <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
                         class="card-img-top shadow" alt="Couverture" style="height: 18rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title mb-1">{{ $livre->titre }}</h6>
                        <p class="card-text text-muted small mb-1">{{ $auteur->nom }}</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <a href="{{ route('user.livres.show', $livre->id) }}" class="btn btn-success btn-sm fw-bold">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>Aucun livre trouvé pour cet auteur.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
