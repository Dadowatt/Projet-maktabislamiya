@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h4 class="text-success mb-4">Choisissez vos catégories préférées</h4>
    <form action="{{ route('user.categories.choisir') }}" method="POST">
        @csrf
        <div class="row row-cols-2 row-cols-md-4 g-3">
            @foreach ($categories as $categorie)
                <div class="col">
                    <div class="form-check border rounded p-3 shadow-sm">
                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $categorie->id }}" id="cat{{ $categorie->id }}">
                        <label class="form-check-label" for="cat{{ $categorie->id }}">
                            {{ $categorie->nom }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-success">Enregistrer mes thèmes choisis</button>
        </div>
    </form>
</div>
@endsection
