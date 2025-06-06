@extends('layouts.user')
@section('content')

<form class="form-control bg-light mx-auto w-75" method="post" action="{{ route('user.demande_livre.store') }}">
    @csrf
  <div class="mb-3">
    <label for="titre_livre" class="form-label">Titre du livre</label>
    <input type="text" class="form-control" name="titre_livre" required>
  </div>
  <div class="mb-3">
    <label for="nom_auteur" class="form-label">Auteur (optionnel)</label>
    <input type="text" class="form-control" name="nom_auteur">
  </div>
  <div class="mb-3">
    <label for="user_name" class="form-label">Nom ou Pseudo</label>
    <input type="text" class="form-control" name="user_name" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
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