@if(Auth::user()->role == "admin")
  @extends('layouts.admin')
@elseif (Auth::user()->role == "vendeur")
  @extends('layouts.vendeur')
@else
  @extends('layouts.livreur')
@endif

@section('js')

@endsection
