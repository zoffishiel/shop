@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">

@endsection

@section('content')

<div class="container">

    <div class="mt-3 card p-3">
        <div class="row">
            <div class="col-md-3 ImageUpload h-100">
                {{-- <input type="text" name="" value=""> --}}
                <button type="button" name="button" class="btn btn-primary " data-toggle="modal" data-target="#addImg"> Add</button>

            </div>
            <div class="col-md-9">
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="titre" class=" ml-3 float-left ">Vendeur :</label>
                        <input type="text" class="form-control " id="Vendeur">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="titre" class=" ml-3 float-left ">Nom :</label>
                        <input type="text" class="form-control " id="Nom">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="Ville" class=" ml-3 float-left ">Ville :</label>
                        <input type="text" class="form-control " id="Ville">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="Adresse" class=" ml-3 float-left ">Adresse :</label>
                        <textarea class="form-control" name="Adresse" rows="6" cols="80"></textarea>
                    </div>
                </div>

                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="Tel" class=" ml-3 float-left ">Tel :</label>
                        <input type="text" class="form-control " id="Tel">
                    </div>
                </div>

                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="qte" class=" ml-3 float-left ">Quantite :</label>
                        <input type="text" class="form-control " id="qte">
                    </div>
                </div>

                <a type="button" class="btn btn-success btn-lg float-right mt-4 mr-4 mb-4" href="{{ route('dashboard.clients') }}" >Add</a>

            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="addImg">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Une  Images :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form action="/file-upload" class="dropzone " id="dropzone"></form>
                        {{-- <input type="file" name="images" value="" multiple> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="savebtn" data-toggle="modal" data-target="#SelectImg">Save</button>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection


@section('js')
<script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
<script src="{{ asset('node_modules/jquery-filepond/filepond.jquery.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/dropzone.js') }}" charset="utf-8"></script>

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
<script type="text/javascript">
    $(document).ready(function() {
        $("#savebtn").click(function() {
            // alert('hello');
        });

    });
</script>

@endsection
