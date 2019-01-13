@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">

@endsection

@section('content')

<div class="container">

    <div class="mt-3 card p-3">
      <form class="" action="{{ route('addClient') }}" method="post">
        <div class="row">
            <div class="col-md-9 offset-3">
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="titre" class=" ml-3 float-left ">Nom :</label>
                        <input type="text" class="form-control" name="nom" id="Nom">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="Tel" class=" ml-3 float-left ">Tel :</label>
                        <input type="tel" class="form-control"name="tel" id="Tel">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="Ville" class=" ml-3 float-left ">Ville :</label>
                        <input type="text" class="form-control" name="ville" id="Ville">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="Adresse" class=" ml-3 float-left ">Adresse :</label>
                        <textarea class="form-control" name="adresse" rows="6" cols="80"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg float-right my-4">Ajouter</button>
            </div>
        </div>
      </form>
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
