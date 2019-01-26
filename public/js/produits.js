$(function(){

  window.actionEvents = {
    'click .fa-eye' : function(e, value, row, index){
      window.location = '/dashboard/details/produit/'+row.id;
    },
  };
  function actionFormatter(){
    return [
      "<i class='fa fa-eye'></i>",
      "<i class='fa fa-wrench ml-4'></i>"
    ].join('');
  }
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
        class : 'id'
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
        class : 'text-truncate desc',
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
      },{
        title : 'Action',
        formatter : actionFormatter,
        events : actionEvents
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
