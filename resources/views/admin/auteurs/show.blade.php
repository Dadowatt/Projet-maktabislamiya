@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row align-items-center mb-5">
        <div class="col-md-3 text-center text-md-start">
            <div style="border:3px solid #3498db; border-radius:50%; width:150px; height:150px; overflow:hidden; margin: 0 auto 10px auto;">
                <img src="{{ $auteur->photo ? asset('storage/'.$auteur->photo) : asset('default-avatar.png') }}"
                     alt="{{ $auteur->nom }}"
                     style="width:100%; height:100%; object-fit:cover;">
            </div>
        </div>
        <div class="col-md-9">
            <h3 class="mb-2">{{ $auteur->nom }}</h3>
            <p class="text-muted"><strong>{{ $auteur->followers_count }}</strong> {{ Str::plural('abonné', $auteur->followers_count) }}</p>
        </div>
    </div>

    <h4 class="mb-3">Ses ouvrages</h4>
    <div class="row g-4">
        @forelse($livres as $livre)
            <div class="col-12 col-sm-6 col-md-3 mb-4" style="max-width: 250px;">
                <div class="card shadow-sm" style="height: 27rem;">
                    <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
                         class="card-img-top shadow" alt="Couverture" style="height: 18rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title mb-1">{{ $livre->titre }}</h6>
                        <p class="card-text text-muted small mb-1">{{ $auteur->nom }}</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <a href="{{ route('admin.livres.show', $livre) }}" class="btn btn-success btn-sm fw-bold">Voir plus</a>
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
