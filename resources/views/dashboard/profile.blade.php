@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
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
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{ asset('/img/user.jpeg') }}" alt="" />

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5 id="name">
                                dianne pierce
                            </h5><br>
                            <div class="row">
                                <div class="col-4 solde" >
                                    <div class="card" style="width: 10rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Garantie </h5>
                                            <p class="card-text"> 500dh</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 solde">

                                  <div class="card" style="width: 10rem;" >
                                      <div class="card-body">
                                          <h5 class="card-title">Actuel </h5>
                                          <p class="card-text"> 500dh</p>
                                      </div>
                                  </div>

                                </div>
                                <div class="col-4 solde">
                                  <div class="card" style="width: 10rem;" >
                                      <div class="card-body">
                                          <h5 class="card-title">Total</h5>
                                          <p class="card-text"> 500dh</p>
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
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
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
                            <p>SKILLS</p>
                            <hr size="30">

                            <a href="">Communication</a><br />
                            <a href="">Collaboration</a><br />
                            <a href="">E-commerce</a><br />
                            <a href="">Designer</a><br />
                            <a href="">Programmer</a><br />
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
                                    <input type="text" class="form-control" id="FbLink" placeholder="https://www.facebook.com/.....">
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
                                    <div class="col-md-4">
                                        <p>dianne pierce</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p>dianne.pierce69
                                            @example.com</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Téléphone</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p>(212)-234-1498</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Rôle</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ Auth::user()->role }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Banque</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p>CIH</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>RIB</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p>1234567</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Numéro Compte</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p>23686013125136</p>
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
        $(function() {

        });
    </script>
    @endsection
