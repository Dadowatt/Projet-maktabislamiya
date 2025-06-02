@extends('layouts.admin')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Liste des auteurs</h2>
    <a href="{{ route('admin.auteurs.create') }}" class="btn btn-primary mb-3">Ajouter un auteur</a>

    <div class="row">
        @forelse($auteurs as $auteur)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body d-flex flex-column align-items-center">
                        <a href="{{ route('admin.auteurs.show', $auteur) }}"
                           style="border:2px solid #2ecc40; border-radius:50%; width:110px; height:110px; overflow:hidden; margin-bottom:10px; display:block;">
                            <img src="{{ $auteur->photo ? asset('storage/'.$auteur->photo) : asset('default-avatar.png') }}"
                                 alt="{{ $auteur->nom }}"
                                 style="width:100%; height:100%; object-fit:cover;">
                        </a>

                        <div class="fw-bold mb-2">{{ $auteur->nom }}</div>

                        {{-- Nouveau : Affichage des stats --}}
                        <!-- <div class="text-muted small mb-2">
                            📚 {{ $auteur->livres->count() }} livre{{ $auteur->livres->count() > 1 ? 's' : '' }}<br>
                            👥 {{ $auteur->followers_count }} follower{{ $auteur->followers_count > 1 ? 's' : '' }}
                        </div> -->

                        <a href="{{ route('admin.auteurs.edit', $auteur) }}" class="btn btn-sm btn-success mb-1">Modifier</a>

                        <form action="{{ route('admin.auteurs.destroy', $auteur) }}" method="POST" onsubmit="return confirm('Supprimer cet auteur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>Aucun auteur trouvé.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
