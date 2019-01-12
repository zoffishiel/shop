@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Commandes (0)</h4>
    <div id="toolbar" class="btn-group">
      <button type="button" class="btn btn-danger" name="button"><i class="fa fa-trash"></i></button>
      <button type="button" class="btn btn-primary" name="button"><i class="fa fa-plus"></i></button>
    </div>
    <table id="commandes" class="table hover striped">
      <thead>
        <th>Tracking</th>
        <th>Client</th>
        <th>Telephone</th>
        <th>Ville</th>
        <th>Adresse</th>
      </thead>
    </table>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#commandes").bootstrapTable({
        url : '/api/commandes',
        search : true,
        showRefresh : true,
        toolbar : '#toolbar',
        refresh : true,
      });
    });
  </script>
@endsection
