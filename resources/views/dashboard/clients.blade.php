@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Clients</h4>

    <div id="toolbar" class="btn-group">
      <button type="button" id="del" class="btn btn-danger" name="button"><i class="fa fa-trash"></i> </button>
      <a type="button" id="add" class="btn btn-primary" name="button" href="{{ route('dashboard.addclients') }}"><i class="fa fa-plus"></i> </a>
    </div>
    <table id="Clients" class="table hover striped">
      <thead>

      </thead>
    </table>
  </div>
@endsection

@section('js')

  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>

  <script type="text/javascript">
  $("#Clients").bootstrapTable({
    columns : [
      {
        checkbox : true,
        align : 'center',
      },
      {
        field : 'id',
        title : 'ID',
        sortable : true,
        align : 'center',
      },{
        field : 'vendeur',
        title : 'Vendeur',
        sortable : true,
        align : 'center',
      },{
        field : 'nom',
        title : 'Nom',
        sortable : true,
        align : 'center',
      },{
        field : 'ville',
        title : 'Ville',
        sortable : true,
        align : 'center',
      },{
        field : 'adresse',
        title : 'Adresse',
        sortable : true,
        align : 'center',
      },{
        field : 'tel',
        title : 'Tel',
        sortable : true,
        align : 'center',
      },{
        field : 'qte',
        title : 'Quantite',
        sortable : true,
        align : 'center',
      }
    ],
    url : 'link',
    toggle : "table",
    showRefresh : true,
    toolbar : '#toolbar',
    search : true,
    pagination : true,
    pageSize : 5,
    pageList : [5, 10, 25, 50, "ALL"]
  });
  </script>

@endsection
