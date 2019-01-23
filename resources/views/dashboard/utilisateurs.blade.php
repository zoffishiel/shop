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
@endsection

@section('content')
  <div class="mt-3 card p-3">
    <h4 class="mb-4 mt-3 text-center">Utilisateurs</h4>
    <div id="toolbar" class="btn-group">
      <button type="button" id="del" class="btn btn-danger" name="button"><i class="fa fa-trash"></i> </button>
    </div>
    <table id="utilisateurs" class="table hover striped">
      <thead>

      </thead>
    </table>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/bootstrap-table/bootstrap-table.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/users.js') }}" charset="utf-8"></script>
@endsection
