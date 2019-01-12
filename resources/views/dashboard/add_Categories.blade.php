@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')

<div class="container">

    <div class="mt-3 card p-3">
        <div class="row">
            <div class="col-md-3 ImageUpload h-100">
                <input type="text" name="" value="">
            </div>
            <div class="col-md-9">
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class=" ml-3 float-left ">Name :</label>
                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class=" ml-3 float-left ">Name </label>
                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>

                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class=" ml-3 float-left ">Name :</label>
                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>

                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class=" ml-3 float-left ">Name :</label>
                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
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
