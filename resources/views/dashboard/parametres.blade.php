@if(Auth::user()->role == "admin")
  @extends('layouts.admin')
@elseif (Auth::user()->role == "vendeur")
  @extends('layouts.vendeur')
@else
  @extends('layouts.livreur')
@endif

@section('css')
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
@endsection

@section('content')
  <div class="card mt-3 p-3">
    <h3 class="mb-4 mt-3 text-center">Parametres</h3>
    <h4 class="text-center my-3">Sliders</h4>
    @if ($sliders->count() == 0)
      <h5 class="">Aucun Slider est trouver</h5>
    @else
      <div id="sliders" class="carousel slide w-100">
        <ol class="carousel-indicators">
          @for ($i=0; $i < $sliders->count(); $i++)
            @if ($i == 0)
              <li data-target="#sliders" data-slide-to="{{$i}}" class="active"></li>
            @else
              <li data-target="#sliders" data-slide-to="{{$i}}"></li>
            @endif

          @endfor
        </ol>
        <div class="carousel-inner">
          @foreach ($sliders as $index => $slider)
            @if (!$index)
              <div class="carousel-item active">
            @else
              <div class="carousel-item">
            @endif
                <img src="/{{ $slider->image }}" class="d-block  w-100">
                <div class="carousel-caption d-none d-md-block">
                  <button type="button" class="btn btn-danger delete mb-4">Supprimer</button>
                  <h4><b>{{ $slider->titre }}</b></h4>
                    <p>{{ $slider->description }}</p>
                </div>
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#sliders" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#sliders" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    @endif

    <a role="button" class="mt-3" style="font-size: 20px" data-toggle="modal" data-target="#slider" href="#">Ajouter Slider</a>

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
            <form class="" action="{{ route('addSlider') }}" method="post" enctype="multipart/form-data">
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
                <input type="file" name="image" class="custom-file-input" id="customFile">
              </div>

          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="savebackup">Ajouter</button>
          </div>
          </form>
      </div>
  </div>
</div>
{{-- END SLIDER MODAL --}}

@endsection

@section('js')
<script type="text/javascript">
    $(function() {
      $("#sliders").on("click", ".delete", function(e){
        console.log(e.target);
      });
    });
</script>
@endsection
