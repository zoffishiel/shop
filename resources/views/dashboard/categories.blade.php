@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
  <div class="mt-3 card p-3">
    <h3 class="mb-4 text-center mt-3">Catégories</h3>

    <div id="toolbar" class="btn-group row ml-2">
      <button type="button" class="btn btn-danger col-md-6" name="button" onclick="{{ route('dashboard.index') }}"><i class="fa fa-trash"></i></button>
      <button type="button" class="btn btn-primary col-md-6" name="button"><i class="fa fa-plus"></i></button>
    </div>

    <table id="categories" class="hover striped border">
      <thead>
        <th>Id</th>
        <th>Nom</th>
        <th>Nbr Produits</th>
        <th>Action</th>
      </thead>
    </table>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#categories").bootstrapTable({
        url : '/api/categories',
        showRefresh: true,
        search: true,
        sorting:true,
        toolbar : '#toolbar',
      });
    });
  </script>
@endsection
