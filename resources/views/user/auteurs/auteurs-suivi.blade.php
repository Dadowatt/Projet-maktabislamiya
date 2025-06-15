@extends('layouts.user')

@section('content')
    <div class="container mt-4">
        <h3 class="text-success">Mes Auteurs Suivis</h3>
        <hr>
        <div class="row">
            @forelse($auteurs as $auteur)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 mt-2">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column align-items-center">
                            <a href="{{ route('user.auteurs.show', $auteur->id) }}">
                                <div
                                    style="border:2px solid #2ecc40; border-radius:50%; width:110px; height:110px; overflow:hidden; margin-bottom:10px;">
                                    <img src="{{ $auteur->photo ? asset('storage/' . $auteur->photo) : asset('default-avatar.png') }}"
                                        alt="{{ $auteur->nom }}" style="width:100%; height:100%; object-fit:cover;">
                                </div>
                            </a>
                            <div class="fw-bold mb-2">{{ $auteur->nom }}</div>
                            <p class="text-muted small">{{ $auteur->followers_count }}
                                {{ Str::plural('abonné', $auteur->followers_count) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Vous ne suivez aucun auteur pour le moment.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection