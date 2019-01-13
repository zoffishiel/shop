@extends('layouts.dashboard')

@section('content')
  <div class="container card">
    <h4 class="text-center mt-3 mb-5">Ajouter Commande</h4>
    <div class="card-content">
      <form class="" action="#" method="post">
        <div class="form-inline mb-3">
          <label class="col-md-2" for="">Nom Client : </label>
          <input class="form-control col-md-4" type="text" name="nom" value="">
        </div>
        <div class="form-inline mb-3">
          <label class="col-md-2" for="">Telephone : </label>
          <input class="form-control col-md-4" type="text" name="nom" value="">
        </div>
        <div class="form-inline mb-3">
          <label class="col-md-2" for="">Ville : </label>
          <input class="form-control col-md-4" type="text" name="nom" value="">
        </div>
        <div class="form-inline mb-3">
          <label class="col-md-2" for="">Adresse : </label>
          <input class="form-control col-md-4" type="text" name="nom" value="">
        </div>
        <div class="form-inline mb-3">
          <label class="col-md-2" for="">Service Livraison : </label>
          <input class="form-control col-md-4" type="text" name="nom" value="">
        </div>
      </form>

          <button type="button" class="btn btn-success btn-lg float-right mr-4 mb-4">Ajouter</button>

    </div>
  </div>
@endsection

@section('js')
  <script>

  </script>

@endsection
