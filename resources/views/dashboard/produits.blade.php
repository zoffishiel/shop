@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Produits</h4>

    <div id="toolbar" class="btn-group">
      <button type="button" id="del" class="btn btn-danger" name="button"><i class="fa fa-trash"></i> </button>
      <a type="button" id="add" class="btn btn-primary" name="button" href="{{ route('dashboard.addproduits') }}"><i class="fa fa-plus"></i> </a>
    </div>
    <table id="Produits" class="table hover striped">
      <thead>

      </thead>
    </table>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>

  <script type="text/javascript">
  $("#Produits").bootstrapTable({
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
        field : 'titre',
        title : 'titre',
        sortable : true,
        align : 'center',
      },{
        field : 'description',
        title : 'description',
        sortable : true,
        align : 'center',
      },{
        field : 'prix_general',
        title : 'Prix General',
        sortable : true,
        align : 'center',
      },{
        field : 'prix_vente',
        title : 'Prix de Vente',
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
