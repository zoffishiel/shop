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

<div class="row mt-5">
  <div class="col-md-6">
    <div class="card">
      <h5 class="text-center mt-3">Revenus</h5>
      <div class="card-content">
        <canvas id="revenus-canvas"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/Chart.bundle.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#commandes").bootstrapTable({
        url : '/api/commandes',
        search: true,
        refresh: true,
      });
      var ctx = document.getElementById("revenus-canvas").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
    });
  </script>
@endsection
