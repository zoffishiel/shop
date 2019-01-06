@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
  <style media="screen">
    #activities{
      height: 100px;
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-9 offset-md-1">
      <div class="row">
        <div class="col-md-3 offset-md-1 card">
          <div class="card-body text-center">
            <h5 class="card-title">Solde Garentie</h5>
            <p>0 DH</p>
          </div>
        </div>
        <div class="col-md-3 offset-md-1 card">
          <div class="card-body text-center">
            <h5 class="card-title">Solde Actuel</h5>
            <p>0 DH</p>
          </div>
        </div>
        <div class="col-md-3 offset-md-1 card">
          <div class="card-body text-center">
            <h5 class="card-title">Solde Total</h5>
            <p>0 DH</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="mt-5">
  <div class="card text-center">
    <h4 class="card-title mt-3">Commandes</h4>
    <div class="card-body">
      <table id="commandes" class="border hover striped">
        <thead>
          <th>Track</th>
          <th>Client</th>
          <th>Adresse</th>
          <th>Ville</th>
          <th>Produits</th>
          <th>Statut</th>
        </thead>
      </table>
    </div>

  </div>

</div>

@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#commandes").bootstrapTable({});
    });
  </script>
@endsection
