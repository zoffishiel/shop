$(function(){

  $("#del").on('click', function(){
    var ids = $.map($('#utilisateurs').bootstrapTable('getSelections'), (row) =>{
      return row.id;
    });

    $.post('/api/drop/users', {'ids' : ids}, (resp) =>{
      if(resp){
        $("#utilisateurs").bootstrapTable('remove', {
          field : 'id',
          values : ids
        });
      }
    });
  });

  $("#utilisateurs").bootstrapTable({
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
        field : 'nom',
        title : 'Nom',
        sortable : true,
        align : 'center',
      },{
        field : 'email',
        title : 'Email',
        sortable : true,
        align : 'center',
      },{
        field : 'tel',
        title : 'Telephone',
        sortable : true,
        align : 'center',
      },{
        field : 'ville',
        title : 'Ville',
        sortable : true,
        align : 'center',
      },{
        field : 'role',
        title : 'Role',
        sortable : true,
        align : 'center',
      },{
        field : 'bloquer',
        title : 'Bloquer',
        sortable : true,
        align : 'center',
      }
    ],
    url : '/api/users',
    toggle : "table",
    showRefresh : true,
    toolbar : '#toolbar',
    search : true,
    pagination : true,
    pageSize : 5,
    pageList : [5, 10, 25, 50, "ALL"]
  });
});
