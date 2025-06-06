@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Demandes de livres</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Détails</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes as $demande)
                <tr>
                    <td>{{ $demande->titre_livre }}</td>
                    <td>{{ $demande->nom_auteur ?? '—' }}</td>
                    <td>{{ $demande->user_name }}</td>
                    <td>{{ $demande->email }}</td>
                    <td>{{ $demande->details }}</td>
                    <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                <a href="{{ route('admin.demande_livre.show', $demande->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></a>
                <form action="{{ route('admin.demande_livre.destroy', $demande->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
