@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
@endsection

@section('content')
  <div class="card mt-3 p-3">
    <h4 class="mb-4 mt-3 text-center">Parametres</h4>
    <h5 class="">Aucun Slider est trouver</h5>
    <a role="button" data-toggle="modal" data-target="#slider" href="#">Ajouter Slider</a>

    <div class="row mt-5">
      <div class="col-md-6">
        <h5 class="text-center">Créer Backup</h5>
        <a role="button" href="#" data-toggle="modal" data-target="#Backup">Créer</a>
      </div>
      <div class="col-md-6">
        <h5 class="text-center">Changer Logo</h5>
        @if (is_file('/img/logo.png'))
          <a role="btn"><img src="/img/logo.png" width="60" height="60" alt=""></a>
        @else
          <a role="button" href="#">Ajouter Logo</a>
        @endif
      </div>
    </div>
  </div>
  {{-- BACKUP MODAL --}}
<div class="modal fade" tabindex="-1" role="dialog" id="Backup">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">sélectionner pour sauvegarder :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div cl

ass="col-md-6">
                    <h5 >Base de données :</h5>
                  </div>
                  <div class="switch col-md-6 centered">
                      <input id="Commandes" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                      <label for="Commandes"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <h5>Fichiers :</h5>
                  </div>


                  <div class="switch col-md-6 centered">
                      <input id="Categories" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                      <label for="Categories"></label>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button rol="button" class="btn btn-primary" id="savebackup">Sauvegarder</button>
            </div>
        </div>
    </div>


</div>
<<<<<<< HEAD
{{-- END BACKUP MODAL --}}

{{-- SLIDER MODAL --}}
<div class="modal fade" tabindex="-1" role="dialog" id="slider">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Ajouter Slider :</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form class="" action="" method="post">
              <div class="form-group">
                <label for="">Titre :</label>
                <input type="text" name="titre" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="">Description :</label>
                <textarea name="description" class="form-control" rows="4" cols="80"></textarea>
              </div>
              <div class="form-group">
                <label for="">Lien :</label>
                <input type="text" name="lien" class="form-control" value="">
              </div>
              <div class="custom-file">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="file" class="custom-file-input" id="customFile">
              </div>
            </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="savebackup">Ajouter</button>
          </div>
      </div>
  </div>
=======

<div class="modal fade" tabindex="-1" role="dialog" id="SelectImg">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class

="modal-title">Selectioner Images/Video principale :</h5>
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
>>>>>>> 77d66911185200185bca57a1377d035d9d595e0b
</div>
{{-- END SLIDER MODAL --}}

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
      $("#customFile").on("change", (e)=>{
        $(".custom-file-label").html(e.target.files[0].name);
      });
    });
</script>
@endsection
