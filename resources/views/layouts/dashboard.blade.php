<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Store') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style media="screen">
      .nav-link{
        color: #FFFFFF;
      }
    </style>
    @yield('css')
  </head>
  <body>
    <header class="navbar navbar-expand-lg navbar-dark border-bottom">
      <div class="container">
        <a href="{{ route('dashboard.index') }}" class="navbar-brand">LOGO</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mr-5 mt-2">
            <i class="fa fa-bell"></i>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">{{ Auth::user()->nom }}</a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('dashboard.profile') }}" class="dropdown-item"><i class="fa fa-user-circle-o mr-2"></i>Profile</a>
              <a href="/logout" class="dropdown-item"><i class="fa fa-sign-out mr-2"></i>Déconnexion</a>
            </div>
          </li>
        </ul>
      </div>
    </header>

      <div class="row container-fluid" id="body">
        <div class="col-md-2 bg-light" id="sidebar">
          <h5 class="text-center mt-4">STORE</h5>
          <div class="list-group pt-3">
            <a href="{{ route('dashboard.index') }}" class="list-group-item">
              <i class="fa fa-dashboard mr-3"></i>
              Dashboard
            </a>
            <a href="{{ route('dashboard.categories') }}" class="list-group-item">
              <i class="fa fa-archive mr-3"></i>
              Catégories
            </a>
            <a href="{{ route('dashboard.produits') }}" class="list-group-item">
              <i class="fa fa-tag mr-3"></i>
              Produits
            </a>
            <a href="{{ route('dashboard.utilisateurs') }}" class="list-group-item">
              <i class="fa fa-users mr-3"></i>
              Utilisateurs
            </a>

            <a href="{{ route('dashboard.commandes') }}" class="list-group-item">
              <i class="fa fa-shopping-cart mr-3"></i>
              Commandes
            </a>
            <a href="{{ route('dashboard.clients') }}" class="list-group-item">
              <i class="fa fa-user mr-3"></i>
              Clients
            </a>
            <a href="{{ route('dashboard.messages') }}" class="list-group-item">
              <i class="fa fa-envelope mr-3"></i>
              Messages
            </a>
            <a href="{{ route('dashboard.parametres') }}" class="list-group-item">
              <i class="fa fa-cog mr-3"></i>
              Paramètres
            </a>

          </div>
        </div>
        <div class="col-md-10 mt-4">
          @yield('content')
        </div>
      </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
  </body>
</html>
