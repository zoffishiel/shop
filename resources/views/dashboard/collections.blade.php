@if(Auth::user()->role === "admin")
  @php ($theme = "layouts.admin")
@elseif (Auth::user()->role === "vendeur")
  @php ($theme = "layouts.vendeur")
@elseif(Auth::user()->role === "livreur")
  @php ($theme = "layouts.livreur")
@endif
@extends($theme)

@section('content')
  <div class=" container row mt-4">
    @if($collection->count() == 0)
      <h4 class="text-center">Aucun Produit Dans Votre Collection</h4>
    @else

      @foreach ($collection as $item)
        <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" height="160" src="/{{ $item->product->image }}" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $item->product->titre }}</h5>
              <div class="card-text">
                <p class="text-left">Prix Général : {{$item->product->prix_general}}DH</p>
                <p class="text-left">Prix de Vente : {{$item->product->prix_vente}}DH</p>
                <p class="text-left">Quantité disponible : {{$item->product->qte}}</p>
                <a href="/dashboard/details/produit/{{$item->product->id}}">Détails</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif

  </div>

@endsection
@section('js')

@endsection
