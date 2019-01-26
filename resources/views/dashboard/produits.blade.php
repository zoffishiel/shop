@if(Auth::user()->role === "admin")
  @php ($theme = "layouts.admin")
@elseif (Auth::user()->role === "vendeur")
  @php ($theme = "layouts.vendeur")
@elseif(Auth::user()->role === "livreur")
  @php ($theme = "layouts.livreur")
@endif
@extends($theme)

@section('css')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-table/bootstrap-table.min.css') }}">
  <style media="screen">
    #Produits{
      table-layout: fixed;
    }
    #Produits .id{
      width: 60px;
    }
    #Produits .desc{
      overflow: hidden !important;
      width: 200px !important;
    }
    .fa-eye:hover , .fa-wrench:hover{
      cursor: pointer;
    }
  </style>
@endsection

@section('content')
  @if(Auth::user()->role == "admin")
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Produits</h4>

    <div id="toolbar" class="btn-group">
      <button type="button" id="del" class="btn btn-danger" name="button"><i class="fa fa-trash"></i> </button>
      <a role="button" id="add" class="btn btn-primary" href="{{ route('dashboard.addproduits') }}"><i class="fa fa-plus"></i> </a>
    </div>
    <table id="Produits" class="table hover striped">
      <thead>

      </thead>
    </table>
  </div>
  @else
  <div class=" container row mt-4">
    @foreach ($products as $product)
      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top" height="160" src="/{{ $product->image }}" alt="">
          <div class="card-body">
            <h5 class="card-title">{{ $product->titre }}</h5>
            <div class="card-text">
              <p class="text-left">Prix Général : {{$product->prix_general}}DH</p>
              <p class="text-left">Prix de Vente : {{$product->prix_vente}}DH</p>
              <p class="text-left">Quantité disponible : {{$product->qte}}</p>
              <a href="/dashboard/details/produit/{{$product->id}}">Détails</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  @endif
@endsection


@section('js')
  @if (Auth::user()->role == "admin")
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/produits.js') }}" charset="utf-8"></script>
  @endif
@endsection
