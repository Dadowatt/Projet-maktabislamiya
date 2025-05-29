@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h4>Résultats pour : <em>{{ $query }}</em> (Auteurs)</h4>
    <div class="row mt-3">
        @forelse($auteurs as $auteur)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body d-flex flex-column align-items-center">
                        <a href="{{ route('user.auteurs.show', $auteur->id) }}">
                            <div style="border:2px solid #2ecc40; border-radius:50%; width:110px; height:110px; overflow:hidden; margin-bottom:10px;">
                                <img src="{{ $auteur->photo ? asset('storage/'.$auteur->photo) : asset('default-avatar.png') }}"
                                     alt="{{ $auteur->nom }}"
                                     style="width:100%; height:100%; object-fit:cover;">
                            </div>
                        </a>
                        <div class="fw-bold mb-1">{{ $auteur->nom }}</div>
                        <p class="text-muted small mb-0">{{ $auteur->livres_count }} {{ Str::plural('livre', $auteur->livres_count) }}</p>
                        <p class="text-muted small">{{ $auteur->followers_count }} {{ Str::plural('abonné', $auteur->followers_count) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun auteur trouvé.</p>
        @endforelse
    </div>
</div>
@endsection
