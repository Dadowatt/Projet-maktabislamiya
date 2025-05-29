@extends('layouts.user')

@section('content')
<div class="container">
    <h4 class="mb-4">📚 Ma Liste de Lecture</h4>

    @if($lectures->isEmpty())
        <p>Vous n'avez encore aucun livre dans votre liste de lecture.</p>
    @else
        <div class="row">
            @foreach($lectures as $livre)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <img src="{{ $livre->image_couverture ? asset('storage/'.$livre->image_couverture) : asset('default-cover.jpg') }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $livre->titre }}</h5>
                            <p class="card-text">{{ Str::limit($livre->description, 100) }}</p>
                            <a href="{{ route('user.livres.lecture', $livre->id) }}" class="btn btn-outline-success"><i class="fas fa-book-open"></i> Reprendre la lecture</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
