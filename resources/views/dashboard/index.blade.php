@if(Auth::user()->role == "admin")
  @extends('layouts.admin')
@elseif (Auth::user()->role == "vendeur")
  @extends('layouts.vendeur')
@else
  @extends('layouts.livreur')
@endif

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
  <style media="screen">
    #activities{
      height: 100px;
    }
  </style>
@endsection

@section('content')
  <div class="row mx-auto">
    <div class="col-md-11 offset-1">
      <div class="row">
        <div class="col-md-3 card">
          <div class="card-body text-center">
            <h5 class="card-title">Solde Garentie</h5>
            <p>{{ Auth::user()->garantie }} DH</p>
          </div>
        </div>
        <div class="col-md-3 offset-md-1 card">
          <div class="card-body text-center">
            <h5 class="card-title">Solde Actuel</h5>
            <p>{{ Auth::user()->actuel }} DH</p>
          </div>
        </div>
        <div class="col-md-3 offset-md-1 card">
          <div class="card-body text-center">
            <h5 class="card-title">Solde Total</h5>
            <p>{{ Auth::user()->total }} DH</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4  ">

      <div class="col-md-6 ">
        <div class="card">
          <h5 class="text-center mt-3">Revenus</h5>
          <div class="card-content">
            <canvas id="revenus-canvas"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <h5 class="text-center mt-3">Ventes</h5>
          <div class="card-content">
            <canvas id="Ventes-canvas"></canvas>
          </div>
        </div>
      </div>
  </div>
  <div class="row mt-3">

  </div>

<div class="mt-3 mb-5">
  <div class="card text-center">
    <h4 class="card-title mt-3">Commandes</h4>
    <div class="card-body">
      <div id="toolbar" class="btn-group">
        <a href="{{ route('dashboard.add_commande') }}" id="add" role="button" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
      </div>
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
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/Chart.bundle.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      var mois = ["Jan", "Fev", "Mars", "Avr", "Mai", "Juin", "Juil", "Aout", "Sept", "Oct", "Nov", "Dec"];
      $("#commandes").bootstrapTable({
        url : '/api/commandes',
        toolbar : '#toolbar',
        search: true,
        showRefresh: true,
        pagination : true,
        pageSize : 5,
        pageList : [5, 10, 25, 50, "ALL"]
      });
      var ctx = document.getElementById("revenus-canvas").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: mois,
        datasets: [{
            label: '# des revenues',
            data: [12, 4, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var ctx2 = document.getElementById("Ventes-canvas").getContext('2d');
var myLineChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: mois,
        datasets: [{
            label: '# Nombre des ventes',
            data: [12, 19, 3, 15, 22, 13],
            backgroundColor: [

                'rgba(54, 162, 235, 0.7)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
});
    });
  </script>
@endsection
