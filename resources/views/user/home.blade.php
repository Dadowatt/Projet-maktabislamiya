@extends('layouts.admin')  {{-- ton layout SB Admin --}}
@section('content')
  <h1>Tableau de bord Admin</h1>
  <p>Bienvenue {{ auth()->user()->nom }} ({{ auth()->user()->role }})</p>
@endsection
