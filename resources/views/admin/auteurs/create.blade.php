@extends('layouts.admin')
@section('content')
<form class="form-control mt-5 mx-auto w-75 bg-light" action="{{ route('admin.auteurs.store') }}" method="POST" enctype="multipart/form-data">
    <h3>Ajouter un auteur</h3>
    @csrf
    <div class="mb-3">
        <label for="nom" class="form-label">Nom de l'auteur</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo (optionnelle)</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection