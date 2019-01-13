@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
<style media="screen">
    .navbar{
      background-image: none;
      background-color: white;
    }
  .navbar-brand, .nav-link, .nav-item i{
    color: black !important;
  }
  .solde{
    color : orange;
  }
  </style>
@endsection
@section('content')

<body>
    <div id="Data">
        <div class="container emp-profile">
          <h3 class="mb-5 text-center">Profile</h3>
            <form method="post">
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
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Infos Personnel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Banque</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mx-auto" id='vlidate'>
                        {{-- <input type="submit" class="" name="btnAddMore" value="Edit Profile" /> --}}
                        <button type="button" name="button" class="profile-edit-btn" value="" >Edit Profile</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>LIENS</p>
                            <hr size="30">
                            <a href=""><i class="fa fa-link"></i>Site Web</a><br />
                            <a href="" data-toggle="modal" data-target="#Facebook"><i class="fa fa-facebook-square"></i>Facebook</a><br />
                            <a href="" data-toggle="modal" data-target="#instagram"><i class="fa fa-instagram"></i>Instagram</a>
                        </div>
                    </div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="Facebook">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-facebook-square"></i>Facebook :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="FbLink">Link :</label>
                                    <input type="text" class="form-control" id="FbLink" placeholder="https://www.facebook.com/...">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" tabindex="-1" role="dialog" id="whatsapp">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-whatsapp"></i>Whatsapp :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="whatsapplink">Link :</label>
                                    <input type="text" class="form-control" id="whatsapplink">
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
                                    <h5 class="modal-title"><i class="fa fa-instagram"></i>Instagram :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="instagramlink">Link :</label>
                                    <input type="text" class="form-control" id="instagram">
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
                                        <p>{{ Auth::user()->nom }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" >
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p>
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Téléphone</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p>
                                            {{ Auth::user()->tel }}
                                        </p>
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
                                        <p>
                                            {{ Auth::user()->banque }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>RIB</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p>
                                            {{ Auth::user()->rib }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Numéro Compte</label>
                                    </div>
                                    <div class="col-md-4 profile_mod">
                                        <p>
                                            {{ Auth::user()->num_cpt }}
                                        </p>
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
                $("#vlidate").html('<a type="button" class="profile-edit-btn btn-success profile_save pl-5 pr-5 pt-2 pb-2"  href="{{ route("dashboard.profile")}}"><i class="fa fa-save"></i></a>').addClass('animated fadeIn');
                $(".profile_mod p").html('<input type="text" class="form-control" placeholder="" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;text-align:center;">').addClass('animated fadeInUp');
                $("#Role").html(' <select class="form-control" name="" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;text-align:center;"><option value="Non">livreue</option> <option value="Non">Vondeur</option></select>');
            });

            $(".profile_save").click(function() {
                  // location.reload();
                  $('p').hide()

            });



            // $(".card").addClass('animated fadeInUp');
            // $(".emp-profile").addClass('animated fadeIn');

        });
    </script>




    @endsection
