@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <!-- Livres disponibles -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body mx-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Livres disponibles
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $livres }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Catégories -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body mx-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Catégories
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Utilisateurs inscrits -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body mx-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Utilisateurs inscrits
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $utilisateurs }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- consultations de livres -->
    <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body mx-2">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
            Consultations
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $consultations }}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-eye fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Carte Google -->
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Localisation des utilisateurs</h6>
                </div>
                <div class="card-body p-0">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62020.71227984912!2d-17.5037093!3d14.6927784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec172987f032e2f%3A0x885bbba859de12c3!2sDakar!5e0!3m2!1sfr!2ssn!4v1685455251671!5m2!1sfr!2ssn" 
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Top 5 auteurs -->
        <div class="col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top 5 des auteurs les plus suivis</h6>
                </div>
                <div class="card-body">

                    @foreach ($topAuteurs as $auteur)
                        @php
                            $max = $topAuteurs->first()->followers_count;
                            $pourcentage = $max > 0 ? ($auteur->followers_count / $max) * 100 : 0;

                            $colors = ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger'];
                            $color = $colors[$loop->index % count($colors)];
                        @endphp

                        <h4 class="small font-weight-bold">
                            {{ $auteur->nom }}
                            <span class="float-right">{{ $auteur->followers_count }} suivis</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $pourcentage }}%"
                                aria-valuenow="{{ $pourcentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
