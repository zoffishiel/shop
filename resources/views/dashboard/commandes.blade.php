@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Commandes (0)</h4>
    <div id="toolbar" class="btn-group">
      <a href="{{ route('dashboard.add_commande') }}" class="btn btn-success" name="button"><i class="fa fa-plus"></i> Ajouter</a>
    </div>
    <table id="commandes" class="table hover striped">
      <thead>

      </thead>
    </table>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#commandes").bootstrapTable({
        columns : [
          {
            field : 'serie',
            title : 'Tracking',
            align : 'center',
          },
          {
            field : 'nom_client',
            title : 'Client',
            align : 'center',
          },
          {
            field : 'tel',
            title : 'Telephone',
            align : 'center',
          },
          {
            field : 'ville',
            title : 'Ville',
            align : 'center',
          },
          {
            field : 'adresse',
            title : 'Adresse',
            align : 'center',
          },
          {
            field : 'statut',
            title : 'Statut',
            align : 'center',
          }
        ],
        url : '/api/commandes',
        search : true,
        showRefresh : true,
        toolbar : '#toolbar',
      });
    });
  </script>
@endsection
