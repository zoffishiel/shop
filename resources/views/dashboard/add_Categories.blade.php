@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <p>hello</p>
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
