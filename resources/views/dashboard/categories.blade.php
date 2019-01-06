@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection
@section('content')
  <div class="mt-3 text-center">
    <h3 class="mb-5">Catégories</h3>
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
      $("#categories").bootstrapTable({});
    });
  </script>
@endsection
