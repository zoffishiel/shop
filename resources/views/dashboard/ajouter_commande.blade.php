@if(Auth::user()->role === "admin")
  @php ($theme = "layouts.admin")
@elseif (Auth::user()->role === "vendeur")
  @php ($theme = "layouts.vendeur")
@elseif(Auth::user()->role === "livreur")
  @php ($theme = "layouts.livreur")
@endif
@extends($theme)
@section('css')
  <style media="screen">

    #products-modal .card{
      box-shadow: none;
    }
    .shadow{
      box-shadow: 0px 4px 8px gray;
    }
    .list-group-item:hover{
      cursor : pointer;
    }
    .nav-link{
      color : black;
    }
    #products-modal .modal{
      margin-top: 100px;
      margin-left: 200px;
    }
    #products-modal .modal, .modal-dialog, .modal-content{
      width: 1000px;
    }
    #products-modal .modal-dialog{
      margin: 0px;
    }

    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        height: 400px;
        overflow-y: auto;
    }
  </style>

@endsection
@section('content')
  <div class="container card">
    <h4 class="text-center mt-3 mb-5">Ajouter Commande</h4>
    <div class="card-content row">
      <div id="commande" class="col-md-6">
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Tracking : </label>
            <input class="form-control col-md-6" type="text" name="serie" value="">
          </div>
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Nom Client : </label>
            <input class="form-control col-md-6" type="text" name="nom_client" value="">
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
            <label class="col-md-4" for="">Date de Livraison : </label>
            <input class="form-control col-md-6" type="date" name="date" value="">
          </div>
          <div class="form-inline mb-3">
            <label class="col-md-4" for="">Service Livraison : </label>
            <select class="form-control col-md-6" name="service">
              <option value="1">AMANA</option>
              <option value="2">DHL</option>
              <option value="3">GRATUIT</option>
            </select>
          </div>
          <div class="form-inline mb-3">
            <label class="col-md-4">Commentaire : </label>
            <textarea name="commentaire" class="form-control col-md-6" rows="4" cols="80"></textarea>
          </div>
          <div class="form-inline">
            <button id="ajouter" type="submit" class="btn btn-success offset-4 my-4">Ajouter</button>
          </div>
      </div>
      <div class="col-md-6">
        <button type="button" data-toggle="modal" data-target="#products" class="btn btn-success" name="button"><i class="fa fa-plus"></i> Ajouter Produit</button>
        <ul class="list-group mt-4 w-75" style="margin-left: 100px;" id="addProducts">

        </ul>
        <div class="mt-3">
          <p class="text-center">Votres Revenus : <b id="revenus">0DH</b> </p>
        </div>
      </div>

      {{-- CHOISIR UN CLIENT MODAL --}}
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
      {{-- END CHOISIR UN CLIENT MODAL --}}

      {{-- AJOUTER PRODUITS MODAL --}}
      <div id="products-modal">
        <div class="modal fade" tabindex="-1" role="dialog" id="products">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ajouter Produits :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <ul class="nav nav-tabs" id="produits" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="collection-tab" data-toggle="tab" href="#col" role="tab" aria-controls="collection" aria-selected="true">Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="produits-tab" data-toggle="tab" href="#prod" role="tab" aria-controls="produits" aria-selected="false">Produits</a>
                    </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="col" role="tabpanel" aria-labelledby="collection-tab">
                    @if ($collections->count() == 0)
                      <p class="mt-4">Aucun Produit dans votre collection</p>
                    @else
                      <div class="row mt-3 container-fluid">
                        @foreach ($collections as $item)
                          <div class="card col-md-4 mr-1" product="product{{ $item->product->id }}" productId="{{$item->product->id}}">
                            <img height="200" src="/{{ $item->product->image }}" alt="">
                            <div class="card-body">
                              <h5 class="card-title">{{ $item->product->titre }}</h5>
                              <div class="card-text">
                                <p class="float-left">Prix General : <b class="prixG">{{ $item->product->prix_general }}</b>DH</p>
                                <div class="form-inline float-left mb-2">
                                  <label style="width: 100px">Prix de Vente : </label>
                                  <input type="number" class="form-control" style="width:100px" name="prix_vente" value="{{ $item->product->prix_vente }}">
                                </div>
                                <div class="form-inline float-left mb-2">
                                  <label style="width: 100px">Quantité : </label>
                                  <input type="number" class="form-control" min="1" max="{{ $item->product->qte }}" style="width:100px" name="qte" value="1">
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    @endif
                  </div>
                  <div class="tab-pane fade" id="prod" role="tabpanel" aria-labelledby="produits-tab">
                    @if ($produits->count() == 0)
                      <p class="mt-4">Aucun Produit pour ce moment</p>
                    @else
                      <div class="row mt-3 container-fluid">
                        @foreach ($produits as $produit)
                          <div class="card col-md-4 mr-1" product="product{{ $produit->id }}" productId="{{$produit->id}}">
                            <img height="200" src="/{{ $produit->image }}" alt="">
                            <div class="card-body">
                              <h5 class="card-title">{{ $produit->titre }}</h5>
                              <div class="card-text">
                                <p class="float-left">Prix General : <b class="prixG">{{ $produit->prix_general }}</b>DH</p>
                                <div class="form-inline float-left mb-2">
                                  <label style="width: 100px">Prix de Vente : </label>
                                  <input type="number" class="form-control" style="width:100px" name="prix_vente" value="{{ $produit->prix_vente }}">
                                </div>
                                <div class="form-inline float-left mb-2">
                                  <label style="width: 100px">Quantité : </label>
                                  <input type="number" class="form-control" min="1" max="{{ $produit->qte }}" style="width:100px" name="qte" value="1">
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>

                    @endif
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="close" data-dismiss="modal" class="btn btn-outline-secondary" name="button">Fermer</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- END AJOUTER PRODUITS MODAL --}}
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/commande.js') }}" charset="utf-8"></script>

@endsection
