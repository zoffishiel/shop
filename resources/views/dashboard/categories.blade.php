@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection
@section('content')
  <div class="mt-3 card p-3">
    <h3 class="mb-4 text-center mt-3">Catégories</h3>
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
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#categories").bootstrapTable({
        url : '/api/categories',
        refresh: true,
        search: true,
      });
    });
  </script>
@endsection
