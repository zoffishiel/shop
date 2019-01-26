@if(Auth::user()->role === "admin")
  @php ($theme = "layouts.admin")
@elseif (Auth::user()->role === "vendeur")
  @php ($theme = "layouts.vendeur")
@elseif(Auth::user()->role === "livreur")
  @php ($theme = "layouts.livreur")
@endif
@extends($theme)

@section('css')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
  <div class="card mt-3 p-3">
    <div class="row mt-4">
      <div class="col-md-4">
        <img id="main_image" width="330" src="/{{ $product->image }}" alt="">
        @if ($product->images()->count() > 0)
          <ul class="list-inline">
            <li class="list-inline-item"><img class="sec" width="50" height="50" src="/{{ $product->image }}" alt=""> </li>
            @foreach ($product->images()->get() as $image)
              <li class="list-inline-item"><img class="sec" width="50" height="50" src="/{{ $image->path }}" alt=""> </li>
            @endforeach
          </ul>
        @endif
      </div>
      <div class="col-md-7 text-left">
        <h3 class="mb-5">{{ $product->titre }}</h3>
        <p>{{ $product->description }}</p>
        <p>Prix général : {{ $product->prix_general }}DH</p>
        <p>Prix de vente : {{ $product->prix_vente }}DH</p>
        <p>Quantité Disponible : {{ $product->qte }}</p>
        <a role="button" class="offset-3" href="#">Ajouter a votre collection</a>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    $(function(){
      $(".sec").on('click', (e)=>{
        var img = $(e.target).attr('src');
        $("#main_image").attr('src', img);
      });
    });
  </script>
@endsection
