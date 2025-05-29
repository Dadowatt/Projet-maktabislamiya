@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h4>Résultats pour : <em>{{ $query }}</em> (Livres)</h4>
    <div class="row mt-3">
        @forelse($livres as $livre)
            {{-- réutilise le même design de carte --}}
            <div class="col-12 col-sm-6 col-md-3 mb-4 mx-auto" style="max-width: 300px;">
                <div class="card shadow p-2" style="height: 25rem;">
                    <a href="{{ route('user.livres.show', $livre->id) }}">
                        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}"
                             class="card-img-top" alt="Couverture" style="height: 15rem; object-fit:cover;">
                    </a>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title mb-1">{{ $livre->titre }}</h6>
                        <p class="card-text text-muted small mb-1">{{ $livre->auteur->nom ?? 'Auteur inconnu' }}</p>
                        <div class="d-flex align-items-center text-warning">
                            <i class="fa-solid fa-star me-1"></i>
                            @php $moyenne = $livre->notes->avg('valeur'); @endphp
                            <span class="me-auto text-dark">{{ $moyenne ? number_format($moyenne, 1) : 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun livre trouvé.</p>
        @endforelse
    </div>
</div>
@endsection
