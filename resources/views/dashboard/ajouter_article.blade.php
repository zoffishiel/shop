@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('tinymce/skins/lightgray/skin.min.css') }}">

@endsection
@section('content')
  <div class="card my-4 p-3">
    <div class="form-inline mb-4">
      <label class="col-md-2">Titre : </label>
      <input type="text" class="form-control col-md-4" name="" value="">
    </div>
    <div class="custom-file mb-4 col-md-4 offset-2">
      <label class="custom-file-label" for="customFile">Image</label>
      <input type="file" name="image" class="custom-file-input" id="customFile">
    </div>
    <textarea name="name" rows="8" cols="80"></textarea>
  </div>

@endsection

@section('js')
  <script src="{{ asset('tinymce/tinymce.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
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
