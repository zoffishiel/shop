@if(Auth::user()->role == "admin")
  @extends('layouts.admin')
@elseif (Auth::user()->role == "vendeur")
  @extends('layouts.vendeur')
@else
  @extends('layouts.livreur')
@endif

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Clients</h4>

    <div id="toolbar" class="btn-group">
      <button type="button" id="del" class="btn btn-danger" name="button"><i class="fa fa-trash"></i> </button>
      <a role="button" id="add" class="btn btn-primary" name="button" href="{{ route('dashboard.addclients') }}"><i class="fa fa-plus"></i> </a>
    </div>
    <table id="clients" class="table hover striped">
      <thead>

      </thead>
    </table>
  </div>
@endsection

@section('js')

  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>

  <script type="text/javascript">
  $(function(){
    $("#clients").bootstrapTable({
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
        }
      ],
      url : '/api/clients',
      toggle : "table",
      showRefresh : true,
      toolbar : '#toolbar',
      search : true,
      pagination : true,
      pageSize : 5,
      pageList : [5, 10, 25, 50, "ALL"]
    });
    $("#del").on('click', function(){
      var ids = $.map($("#clients").bootstrapTable('getSelections') , (row)=>{
        return row.id;
      });
      $.post('/api/drop/clients', {"ids":ids}, (resp)=>{
        if(resp){
          $("#clients").bootstrapTable('remove', {
            field : 'id',
            values : ids,
          });
        }
      });
    });
  });

  </script>

@endsection
