@if(Auth::user()->role === "admin")
  @php ($theme = "layouts.admin")
@elseif (Auth::user()->role === "vendeur")
  @php ($theme = "layouts.vendeur")
@elseif(Auth::user()->role === "livreur")
  @php ($theme = "layouts.livreur")
@endif
@extends($theme)

@section('js')

@endsection
