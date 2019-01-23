@if(Auth::user()->role == "admin")
  @extends('layouts.admin')
@elseif (Auth::user()->role == "vendeur")
  @extends('layouts.vendeur')
@else
  @extends('layouts.livreur')
@endif

@section('css')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
  <div class="card mt-3 p-3">
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-7 text-left">
        <h3 class="mb-5">Titre du produit</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
        <p>Prix général : 70DH</p>
        <p>Prix de vente : 130DH</p>
        <p>Quantité Disponible : 30</p>
        <a role="button" class="offset-3" href="#">Ajouter a votre collection</a>
      </div>
    </div>
  </div>
@endsection
