@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2>Ajouter une catégorie</h2>
        <form class="w-50 bg-light" action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la catégorie</label>
                <input type="text" class="form-control" id="nom" value="{{ old('nom') }}" name="nom" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection