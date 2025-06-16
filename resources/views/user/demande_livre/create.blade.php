@extends('layouts.user')

@section('content')
  <form class="form-control bg-light mx-auto w-75" method="POST" action="{{ route('user.demande_livre.store') }}">
    @csrf

    {{-- Affichage du nom et de l'email de l'utilisateur connecté --}}
    <div class="mb-3">
    <p><strong>Nom :</strong> {{ Auth::user()->nom ?? Auth::user()->name }}</p>
    <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
    </div>

    <div class="mb-3">
    <label for="titre_livre" class="form-label">Titre du livre</label>
    <input type="text" class="form-control" name="titre_livre" required>
    </div>

    <div class="mb-3">
    <label for="nom_auteur" class="form-label">Auteur (optionnel)</label>
    <input type="text" class="form-control" name="nom_auteur">
    </div>

    <div class="mb-3">
    <label for="details" class="form-label">Détails</label>
    <textarea class="form-control" name="details" rows="3"></textarea>
    </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
  </form>
@endsection