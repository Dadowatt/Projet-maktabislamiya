@extends('layouts.user')
@section('content')
<h2>Livres dans la catégorie : {{ $categorie->nom }}</h2>

<ul>
@forelse($livres as $livre)
    <li>{{ $livre->titre }} par {{ $livre->auteur->nom }}</li>
@empty
    <li>Aucun livre dans cette catégorie.</li>
@endforelse
</ul>
@endsection