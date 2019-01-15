@extends('layouts.dashboard')
@section('css')
  <style media="screen">
    .list-group-item:hover{
      cursor : pointer;
    }
  </style>

@endsection
@section('content')
  <div class="container card">
    <h4 class="text-center mt-3 mb-5">Ajouter Commande</h4>
    <div class="card-content row">
      <div class="col-md-6">
        <form class="" action="#" method="post">
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Nom Client : </label>
            <input class="form-control col-md-6" type="text" name="nom" value="">
            <button type="button" data-toggle="modal" data-target="#clients" class="btn btn-secondary ml-1" name="button">Choisir</button>
          </div>
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Telephone : </label>
            <input class="form-control col-md-6" type="text" name="tel" value="">
          </div>
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Ville : </label>
            <input class="form-control col-md-6" type="text" name="ville" value="">
          </div>
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Adresse : </label>
            <input class="form-control col-md-6" type="text" name="adresse" value="">
          </div>
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Service Livraison : </label>
            <select class="form-control col-md-6" name="">
              <option value="">AMANA</option>
              <option value="">DHL</option>
            </select>
          </div>
          <div class="form-inline">
            <button type="submit" class="btn btn-success offset-4 my-4">Ajouter</button>
          </div>

        </form>
      </div>
      <div class="col-md-6">
        <button type="button" data-toggle="modal" data-target="#produits" class="btn btn-success" name="button"><i class="fa fa-plus"></i> Ajouter Produit</button>
      </div>

      {{-- CHOISIR UN CLIENT --}}
      <div class="modal fade" tabindex="-1" role="dialog" id="clients">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Clients :</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @if (!empty($clients))
                <div class="list-group">
                  @foreach ($clients as $client)
                    <p client="{{ $client->id }}" class="list-group-item align-left border-left-0 border-right-0 border-top-0">Nom : {{ $client->nom }} <br/> ville : {{ $client->ville }}</p>
                  @endforeach
                </div>
              @else
                <h5>Aucun Client</h5>
              @endif
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-outline-secondary" name="button">Fermer</button>
            </div>
          </div>
        </div>
      </div>
      {{-- END --}}
      <div class="modal fade" tabindex="-1" role="dialog" id="produits">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Clients :</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @if (!empty($clients))
                <div class="list-group">
                  @foreach ($clients as $client)
                    <p client="{{ $client->id }}" class="list-group-item align-left border-left-0 border-right-0 border-top-0">Nom : {{ $client->nom }} <br/> ville : {{ $client->ville }}</p>
                  @endforeach
                </div>
              @else
                <h5>Aucun Client</h5>
              @endif
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-outline-secondary" name="button">Fermer</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    $(function(){

      $("#clients").on("click", ".list-group-item", (e)=>{
        var id = e.target.getAttribute("client");
        var data = null;
        $.get('/api/client/'+id, function(resp){
          $.map($(".card-content").find("input"), function(input){
            data = resp[input["name"]];
            if(data != undefined){
              input.value = data;
            }
          });
          $("#clients").modal("toggle");
        });

      });
    });
  </script>

@endsection
