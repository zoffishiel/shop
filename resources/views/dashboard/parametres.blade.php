@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
@endsection

@section('content')
<div class="card mt-3 p-3">
    <h4 class="mb-4 mt-3 text-center">Parametres</h4>
    <div class="card mx-auto mb-3" style="width:95%;" id="SlideImg">
        <div class="card-body">
            <h5 class="card-title">Changer Slider</h5>
            <h6 class="card-subtitle mb-2 text-muted">Slide Images</h6>
            <p class="card-text">changer les diapositives les changera dans la vue d'accueil, Uploader des images que vous aimez afficher</p>
            <a href="#" class="card-link" data-toggle="modal" data-target="#SelectImg" >images sélectionnées</a>
            <a href="#" class="card-link" id="AddImg">ajouter des images</a>
        </div>
    </div>
    <div class="card mb-3 d-none" id="UploadImg">
        <div class="card-content">
            <h5 class="text-center mt-4">Ajouter les Slides</h5>
        </div>

        <div class="col-md-12 mt-3 mb-3 card-body">
            <form action="/file-upload" class="dropzone " id="dropzone"></form>
            <button type="button" class="btn btn-success btn-lg float-right mt-4 mr-3" id="Img_Save">Save</button>
        </div>

    </div>
    <div class="row d-flex justify-content-center">

        <div class="col-md-5  col-md-offset-5 mr-3">

            <div class="card" style="width: 22rem;" >
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            {{-- <div class="card-body">

                <div class="card-content">
                    <h5 class="mb-4 mt-3 text-center">Reset</h5>
                </div>
                {{-- <div class="switch">
                    <input id="cmn-toggle-4" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                    <label for="cmn-toggle-4"></label>
                </div> --}}
            {{-- </div> --}}
        </div>
        <div class="col-md-5  col-md-offset-5  ml-3">

          <div class="card" style="width: 22rem;">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
              </div>
          </div
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
                                <img src="https://www.plantronics.com/content/dam/plantronics/products/backbeat/backbeat-500-dark-grey-straight-on.png.transform/hero-image/img.png" class="img-fluid col-xs-4 col-sm-4 col-md-12 col-lg-12" alt=".....">


                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="product-chooser-item">
                                <img src="https://www.plantronics.com/content/dam/plantronics/products/backbeat/backbeat-500-dark-grey-straight-on.png.transform/hero-image/img.png" class="img-fluid col-xs-4 col-sm-4 col-md-12 col-lg-12" alt=".....">


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
@endsection
@section('js')
<script src="{{ asset('node_modules/jquery-filepond/filepond.jquery.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/dropzone.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function() {


        $('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function() {
            $(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
            $(this).addClass('selected');
            $(this).find('input[type="radio"]').prop("checked", true);

        });

        $('#AddImg').click(function(){
          $('#SlideImg').addClass('animated fadeOut').delay(200);
          $('#UploadImg').addClass('animated fadeIn');
          $('#UploadImg').removeClass('d-none');
          $('#SlideImg').addClass('d-none');

        });

        $('#Img_Save').click(function(){
          $('#UploadImg').addClass('animated fadeOut').delay(200);
          $('#SlideImg').addClass('animated fadeIn');
          $('#SlideImg').removeClass(' animated fadeOut d-none');
          $('#UploadImg').addClass('d-none');
        })

    });
</script>
@endsection
