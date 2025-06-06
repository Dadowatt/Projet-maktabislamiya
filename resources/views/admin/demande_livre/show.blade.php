@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Détails de la demande</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Titre du livre :</strong> {{ $demande->titre_livre }}</li>
        <li class="list-group-item"><strong>Auteur :</strong> {{ $demande->nom_auteur ?? 'Non renseigné' }}</li>
        <li class="list-group-item"><strong>Nom utilisateur :</strong> {{ $demande->user_name }}</li>
        <li class="list-group-item"><strong>Email :</strong> {{ $demande->email }}</li>
        <li class="list-group-item"><strong>Détails :</strong> {{ $demande->details ?? 'Aucun détail' }}</li>
        <li class="list-group-item"><strong>Envoyé le :</strong> {{ $demande->created_at->format('d/m/Y H:i') }}</li>
    </ul>

    <a href="{{ route('admin.demande_livre.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
