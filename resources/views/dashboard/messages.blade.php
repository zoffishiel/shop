@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection
@section('content')
  <div class="mt-3 p-3 card">
    <h4 class="my-4 text-center">Messages</h4>
    <div class="btn-group" id="toolbar">
      <button type="button" class="btn btn-danger" name="button"><i class="fa fa-trash"></i> </button>
    </div>
    <table id="messages" class="table striped hover">

    </table>
  </div>

@endsection
@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#messages").bootstrapTable({
        columns : [
          {
            field : 'sujet',
            title : 'Sujet',
            align : 'center',
          },{
            field : 'commentaire',
            title : 'Commentaire',
            align : 'center',
          },{
            field : 'ville',
            title : 'Ville',
            align : 'center',
          },{
            field : 'adresse',
            title : 'Adresse',
            align : 'center',
          },{
            field : 'date',
            title : 'Date',
            align : 'center',
          }
        ],
        url : '/api/messages',
        toolbar : '#toolbar',
        search : true,
        showRefresh : true,
      });
    });
  </script>
@endsection
