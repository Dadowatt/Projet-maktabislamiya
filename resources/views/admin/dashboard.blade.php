@extends('layouts.admin')

@section('content')
    <div class="container">
         <div class="row">

                        <!-- livre disponible -->
                        <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
            Livres disponibles
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">120</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-book fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
                        <!-- categorie de livre -->
                        <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            Catégories
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-layer-group fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
                        <!-- utilisateur inscrit -->
                        <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
            Utilisateurs inscrits
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


                        <!-- consultatiion de livre -->
                        <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
            Consultations
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">530</div>
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

                        <!-- Area Chart -->
                        <div class="col-lg-7">
    <div class="card shadow mb-4">
        <!-- En-tête -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Localisation des utilisateurs</h6>
        </div>
        <!-- Carte Google -->
        <div class="card-body p-0">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62020.71227984912!2d-17.5037093!3d14.6927784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec172987f032e2f%3A0x885bbba859de12c3!2sDakar!5e0!3m2!1sfr!2ssn!4v1685455251671!5m2!1sfr!2ssn" 
                width="100%" 
                height="350" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</div>
                        <!-- Pie Chart -->
                       <div class="col-lg-5">
                       <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Top 5 des auteurs les plus suivis</h6>
    </div>
    <div class="card-body">

        <h4 class="small font-weight-bold">Ibn Qayyim <span class="float-right">120 suivis</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <h4 class="small font-weight-bold">Al-Badr <span class="float-right">95 suivis</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 80%"
                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <h4 class="small font-weight-bold">Mujahid <span class="float-right">87 suivis</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-info" role="progressbar" style="width: 72%"
                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <h4 class="small font-weight-bold">Al-Qurtubi <span class="float-right">60 suivis</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <h4 class="small font-weight-bold">Ibn Kathir <span class="float-right">48 suivis</span></h4>
        <div class="progress mb-3">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

    </div>
</div>
                       </div>
                    </div>
    </div>
@endsection