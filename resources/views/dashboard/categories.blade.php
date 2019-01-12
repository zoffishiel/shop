@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('content')
<div class="mt-3 card p-3">
    <h3 class="mb-4 text-center mt-3">Catégories</h3>

    <div id="toolbar" class="btn-group row ml-2">
        <button type="button" class="btn btn-danger col-md-6" name="button"><i class="fa fa-trash"></i></button>
        <button type="button" class="btn btn-primary col-md-6" name="button" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button>
    </div>

    <table id="categories" class="hover striped border ">
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Nbr Produits</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
          <td>1</td>
          <td>Phones</td>
          <td>20</td>
          <td>
            <div class="btn-group row ml-2">
                <button type="button" class="btn btn-danger col-md-6" name="button"><i class="fa fa-trash"></i></button>
                <button type="button" class="btn btn-primary col-md-6" name="button" ><i class="fas fa-edit"></i></button>
            </div>
          </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="add">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus mr-3"></i>Ajouter une catégorie :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class=" mt-3">
                        <div class="form-group">
                            <label for="Nom" class=" ml-3 ">Nom :</label>
                            <input type="text" class="form-control " id="Nom"  >
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="form-group">
                            <label for="nbrprod" class=" ml-3  ">Nbr Produits : </label>
                            <input type="number" class="form-control " id="nbrprod" >
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    $(function() {
        $("#categories").bootstrapTable({
            url: '/api/categories',
            showRefresh: true,
            search: true,
            sorting: true,
            toolbar: '#toolbar',
        });
    });
</script>
@endsection
