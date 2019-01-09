@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Commandes (0)</h4>
    <table id="commandes" class="table hover striped" data-show-refresh="true">
      <thead>
        <th data-field="nom">Nom</th>
        <th data-field="email">Email</th>
        <th data-field="tel">Telephone</th>
        <th data-field="ville">Ville</th>
        <th data-field="role">Role</th>
      </thead>
    </table>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#commandes").bootstrapTable({
        url : '/api/users',
        search : true,
      });
    });
  </script>
@endsection
