@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('tinymce/skins/lightgray/skin.min.css') }}">

@endsection
@section('content')
    <form action="{{ route('addArticle') }}" method="post" enctype="multipart/form-data">
      <div class="card my-4 p-3">
        <div class="form-inline mb-4">
          <label class="col-md-2">Titre : </label>
          <input type="text" name="titre" class="form-control col-md-4" value="">
        </div>
        <div class="row">
          <p class="col-md-2">Image :</p>
          <div class="custom-file mb-4 col-md-4">
            <label class="custom-file-label" for="customFile">Image</label>
            <input type="file" name="image" class="custom-file-input" id="customFile">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-2">
            <p>Publier :</p>
          </div>
          <div class="switch col-md-6 centered">
              <input id="publier" name="publier" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" value="NON">
              <label for="publier"></label>
          </div>
        </div>
        <textarea name="body" rows="8" cols="80"></textarea>
        <button type="submit" class="btn btn-success col-md-2 mt-4">Ajouter</button>
    </div>
<<<<<<< HEAD
    <div class="custom-file mb-4 col-md-4 offset-2">
      <label class="custom-file-label" for="customFile">Image</label>
      <input type="file" name="image" class="custom-file-input" id="customFile">
    </div>
    <textarea name="name" rows="8" cols="80"></textarea>
    <div class="col-md-12">
  <button type="button" class="btn btn-success mt-4  float-right">Save</button>
    </div>

  </div>

=======
    </form>
>>>>>>> c6663697bc281d7b51283cf207eec058147be9a6
@endsection

@section('js')
  <script src="{{ asset('tinymce/tinymce.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $("#publier").on("change", (e)=>{
        if(e.target.checked){
          $(e.target).val("OUI");
        }else{
          $(e.target).val("NON");
        }
      });
      tinymce.init({
        selector : 'textarea',
        height : 300,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor textcolor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table contextmenu paste code help wordcount'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      });
    });
  </script>
@endsection
