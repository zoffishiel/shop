@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@endsection
@section('content')
  <div class="card my-4 p-3">
    <h4 class="text-center my-5">Articles</h4>
    <div id="toolbar" class="btn-group">
      <button class="btn btn-danger" type="button" name="button"><i class="fas fa-trash"></i> </button>
    </div>
    <table id="articles" class="table hover stripped">
      <thead>

      </thead>
    </table>
  </div>

@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      function publierFormatter(value, row, index){
        return [
          '<div class="switch col-md-6 centered">',
          '<input class="cmn-toggle cmn-toggle-round-flat" type="checkbox">',
          '</div>'
        ].join("");
      }
      $("#articles").bootstrapTable({
        url : '/api/articles',
        columns : [
          {
            checkbox : true,
            align : "center"
          },{
            field : "titre",
            title : "Titre",
            align : "center",
          },{
            field : "date",
            title : "Date",
            align : "center",
          },{
            field : "publier",
            title : "Publier",
            align : "center",
            formatter : publierFormatter
          }
        ],
        search : true,
        showRefresh : true,
        toolbar : "#toolbar"
      });
    });
  </script>
@endsection
