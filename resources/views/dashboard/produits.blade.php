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
    <h4 class="mb-4 mt-3 text-center">Produits</h4>

    <div id="toolbar" class="btn-group">
      <button type="button" id="del" class="btn btn-danger" name="button"><i class="fa fa-trash"></i> </button>
      <a role="button" id="add" class="btn btn-primary" href="{{ route('dashboard.addproduits') }}"><i class="fa fa-plus"></i> </a>
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
  $(function(){
    $("#del").on('click', function(){
      var ids = $.map($("#Produits").bootstrapTable('getSelections'), function(row){
        return row.id;
      });
      $.post('/api/drop/product', {'ids' : ids}, (resp)=>{
        if(resp){
          $("#Produits").bootstrapTable('remove', {
            field : 'id',
            values : ids,
          });
        }
      });
    });
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
          title : 'Prix Général',
          sortable : true,
          align : 'center',
        },{
          field : 'prix_vente',
          title : 'Prix de Vente',
          sortable : true,
          align : 'center',
        },{
          field : 'qte',
          title : 'Quantité',
          sortable : true,
          align : 'center',
        }
      ],
      url : '/api/products',
      toggle : "table",
      showRefresh : true,
      toolbar : '#toolbar',
      search : true,
      pagination : true,
      pageSize : 5,
      pageList : [5, 10, 25, 50, "ALL"]
    });
  });

  </script>
@endsection
