@if(Auth::user()->role === "admin")
  @php ($theme = "layouts.admin")
@elseif (Auth::user()->role === "vendeur")
  @php ($theme = "layouts.vendeur")
@elseif(Auth::user()->role === "livreur")
  @php ($theme = "layouts.livreur")
@endif
@extends($theme)

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
@endsection
@section('content')

<body>
    <div id="Data">
        <div class="container emp-profile">
          <h3 class="mb-5 text-center">Profile</h3>
            <form method="post" action="{{ route('updateProfile') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="@if (empty(Auth::user()->img))
                              {{ asset('img/user.jpeg') }}
                            @else
                              {{ Auth::user()->img }}
                            @endif" alt="" />

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <div class="row mt-5">
                                <div class="col-4 solde">
                                    <div class="card" style="width: 10rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Garantie </h5>
                                            <p class="card-text"> {{ Auth::user()->garantie }} DH</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 solde">

                                    <div class="card " style="width: 10rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Actuel </h5>
                                            <p class="card-text"> {{ Auth::user()->actuel }} DH</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-4 solde">
                                    <div class="card" style="width: 10rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Total</h5>
                                            <p class="card-text"> {{ Auth::user()->total }} DH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="display:inline">


                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Infos Personnel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Banque</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mx-auto" id='vlidate'>
                        {{-- <input type="submit" class="" name="btnAddMore" value="Edit Profile" /> --}}
                        <button type="button" name="button" class="profile-edit-btn" value="">Edit Profile</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>LIENS</p>
                            <hr size="30">
                            <a href="#" data-toggle="modal" data-target="#site"><i class="fa fa-link"></i>Site Web</a><br />
                            <a href="#" data-toggle="modal" data-target="#Facebook"><i class="fab fa-facebook-square"></i>Facebook</a><br />
                            <a href="#" data-toggle="modal" data-target="#instagram"><i class="fab fa-instagram"></i>Instagram</a>
                        </div>
                    </div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="site">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-link mr-1"></i>Site Web :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="siteLink">Link :</label>
                                    <input type="text" name="site" class="form-control" id="siteLink" placeholder="https://www.example.com/">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="Facebook">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fab fa-facebook-square"></i>Facebook :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="FbLink">Link :</label>
                                    <input type="text" name="facebook" class="form-control" id="FbLink" placeholder="https://www.facebook.com/...">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                  </div>

                    <div class="modal fade" tabindex="-1" role="dialog" id="instagram">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fab fa-instagram"></i>Instagram :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="instagramlink">Link :</label>
                                    <input type="text" name="instagram" class="form-control" id="instagram">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nom</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p name="nom">{{ Auth::user()->nom }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" >
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p name="email">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Téléphone</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p name="tel">{{ Auth::user()->tel }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Rôle</label>
                                    </div>
                                    <div class="col-md-4 profile_mod" id="Role">
                                        <p>{{ Auth::user()->role }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Banque</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p name="banque">{{ Auth::user()->banque ?? "vide" }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>RIB</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p name="rib">{{ Auth::user()->rib ?? "vide" }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Numéro Compte</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p name="num_cpt">{{ Auth::user()->num_cpt ?? "vide" }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection

    @section('js')
    <script type="text/javascript">

        $(document).ready(function() {
            $(".profile-edit-btn").click(function() {
              $("#vlidate profile-edit-btn").hide();
                $.map($('.profile_mod p'), function(row){
                  $(row).html('<input type="text" name="'+$(row).attr("name")+'" class="form-control" placeholder="" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;text-align:center;" value="'+$(row).text()+'">').addClass('animated fadeInUp');
                });
                $("#vlidate").html('<button type="submit" class="profile-edit-btn btn-success profile_save pl-5 pr-5 pt-2 pb-2"><i class="fa fa-save"></i></button>').addClass('animated fadeIn');
                $("#Role").html('<select class="form-control"'+
                ' name="role" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;text-align:center;">'+
                '<option value="livreur" @if(Auth::user()->role == "livreur") selected @endif>Livreur</option>'+
                '<option value="vendeur" @if(Auth::user()->role == "vendeur") selected @endif>Vendeur</option>'+
                @if (Auth::user()->role == "admin")
                  '<option value="admin" selected>Admin</option>'+
                @endif
                '</select>');

            });

            $(".profile_save").click(function() {
                  $('p').hide();

            });
        });
    </script>




    @endsection
