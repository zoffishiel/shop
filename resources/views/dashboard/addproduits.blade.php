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
                        <label for="titre" class=" ml-3 float-left ">Categorie :</label>
                        <select class="form-control" name="">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="titre" class=" ml-3 float-left ">titre :</label>
                        <input type="text" class="form-control " id="titre">
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="description" class=" ml-3 float-left ">description :</label>
                        <textarea class="form-control" name="description" rows="6" cols="80"></textarea>
                    </div>
                </div>
                <div class="row col-md-9">
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="prix_general" class=" ml-3 float-left ">prix general :</label>
                            <input type="text" class="form-control " id="prix_general">
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="prix_vente" class=" ml-3 float-left ">prix vente :</label>
                            <input type="t  ext" class="form-control " id="prix_vente">
                        </div>
                    </div>
                </div>

                <div class="col-md-9 mt-3">
                    <div class="form-group">
                        <label for="qte" class=" ml-3 float-left ">Quantite :</label>
                        <input type="text" class="form-control " id="qte">
                    </div>
                </div>

                <a type="button" class="btn btn-success btn-lg float-right mt-4 mr-4 mb-4" href="{{ route('dashboard.produits') }}" >Save</a>

            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="addImg">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter des Images/Video :</h5>
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


    <div class="modal fade" tabindex="-1" role="dialog" id="SelectImg">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Selectioner Images/Video principale :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row  product-chooser">

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="product-chooser-item selected">
                                    <img src="https://www.plantronics.com/content/dam/plantronics/products/backbeat/backbeat-500-dark-grey-straight-on.png.transform/hero-image/img.png" class=" img-fluid col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="....">

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="product-chooser-item">
                                    <img src="https://cdn.shopify.com/s/files/1/0875/3864/products/product_detail_x2_desktop_HD_4_50_AE_BT-sennheiser-05.jpg" class="img-fluid col-xs-4 col-sm-4 col-md-12 col-lg-12" alt=".....">


                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="product-chooser-item">
                                    <img src="https://images-na.ssl-images-amazon.com/images/I/81BcqdPaThL._SX355_.jpg" class="img-fluid col-xs-4 col-sm-4 col-md-12 col-lg-12" alt=".....">


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="savebtn" >Save</button>
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

        $('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function() {
            $(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
            $(this).addClass('selected');
            $(this).find('input[type="radio"]').prop("checked", true);

        });

    });
</script>

@endsection
