@if(Auth::user()->role == "admin")
  @extends('layouts.admin')
@elseif (Auth::user()->role == "vendeur")
  @extends('layouts.vendeur')
@else
  @extends('layouts.livreur')
@endif

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<style media="screen">
  #dropzone{
    height: 300px;
  }
  #dropzone:hover{
    cursor: pointer;
  }
  .dropzone:hover{
    cursor: pointer;
  }
  .dropzone{
    border: 2px dashed gray;
    border-radius: 10px;
  }
</style>
@endsection

@section('content')

<div class="container">

    <div class="mt-3 card p-3">
      <h4 class="text-center my-4">Ajouter Produit</h4>
        <form class="" action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-9">
                  <div class="col-md-9 mt-3">
                      <div class="form-group">
                          <label for="titre" class=" ml-3 float-left ">Catégorie :</label>
                          <select class="form-control" name="cid">
                              @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->nom }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-md-9 mt-3">
                      <div class="form-group">
                          <label for="titre" class=" ml-3 float-left ">titre :</label>
                          <input type="text" name="titre" class="form-control " id="titre">
                      </div>
                  </div>
                  <div class="col-md-9 mt-3">
                      <div class="form-group">
                          <label for="description" class=" ml-3 float-left ">description :</label>
                          <textarea class="form-control" name="description" rows="6" cols="80"></textarea>
                      </div>
                  </div>
                  <div class="row col-md-9">
                      <div class="col-md-4 mt-3">
                          <div class="form-group">
                              <label for="prix_general" class=" ml-3 float-left">prix général :</label>
                              <input type="number" min="0" name="prix_general" class="form-control" id="prix_general">
                          </div>
                      </div>
                      <div class="col-md-4 mt-3">
                          <div class="form-group">
                              <label for="prix_vente" class=" ml-3 float-left">prix vente :</label>
                              <input type="number" min="0" name="prix_vente" class="form-control" id="prix_vente">
                          </div>
                      </div>
                      <div class="col-md-4 mt-3">
                          <div class="form-group">
                              <label for="qte" class=" ml-3 float-left">Quantité :</label>
                              <input type="number" min="1" name="qte" class="form-control" id="qte">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-9 mt-4">
                    <div id="dropImages" class="dropzone" ondrop="multiDrop(event)" ondragover="return false">
                      <p class="text-center my-5">Ajouter des images</p>
                    </div>
                    <input type="file" id="images" class="d-none" name="images[]" value="" multiple>
                  </div>
                  <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-lg btn-success my-4">Ajouter</button>
                  </div>
              </div>
              <div class="col-md-3 mt-5">
                <div id="dropzone" ondrop="drop(event)" ondragover="return false">
                  <p class="text-center mt-5">Ajouter l'image principale</p>
                </div>
                <input type="file" id="file" name="main_image" class="form-control d-none" value="">
              </div>
          </div>
        </form>
    </div>
</div>

@endsection


@section('js')
<script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>

<script type="text/javascript">
  $(function(){
    $("#dropzone").on("click", ()=>{
      $("#file").click();
      $("#file").on("change", (e)=>{
        temp(e.target.files[0]);
      });
    });
    $("#dropImages").on("click", ()=>{
      $("#images").click();
      $("#images").on("change", (e)=>{
        $("#dropImages").html("<p class='my-5'>Vous avez ajouter "+ e.target.files.length + " images</p>");
      });
    });
  });
    function temp(image){
      var data = new FormData();
      data.append('image', image);
      $.ajaxSetup({
        processData : false,
        cache : false,
        contentType : false,
        enctype : 'multipart/form-data'
      });
      $.post('/api/image/temp', data, function(resp){
        $("#dropzone").html("<img style='width: 200px; height: 300px;' src='/"+resp+"'>");
      });
    }

    function drop(event){
      event.preventDefault();
      var file_list = document.getElementById("file");
      file_list.files = event.dataTransfer.files[0];
      temp(event.dataTransfer.files[0]);
    }

    function multiDrop(event){
      event.preventDefault();
      var file_list = document.getElementById("images");
      file_list.files = event.dataTransfer.files;
      $("#dropImages").html("<p class='my-5'>Vous avez ajouter "+ event.dataTransfer.files.length + " images</p>");
    }
</script>
@endsection
