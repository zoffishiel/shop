@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Contactez Nous</title>
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">


</head>

<body>
    <div class="container-fluid m-0 p-0 ">
        <div class="row m-0 p-0  ">
            <div class="col-md-12 m-0 p-0 wow animated fadeIn " data-wow-delay=".6s">
                <iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.013086441365!2d-5.6641971!3d32.9506639!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda22a0a8041df63%3A0xdc53f8d79a8a7742!2sCaf%C3%A9+Anytime!5e0!3m2!1sfr!2sma!4v1548191977101"
                  allowfullscreen></iframe>
            </div>
        </div>
        <div class="row justify-content-md-center m-0 ">
            <div class="col-md-10 m-0 p-0 wow animated fadeInLeft " data-wow-delay=".2s" >
                <section class=" card Material-contact-section section-padding section-dark">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                                <h1 class="section-title">Nous aimons avoir de vos nouvelles</h1>
                            </div>
                        </div>
                        <div class="row mt-3">

                            <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                                <div class="find-widget">
                                    Company: <a href="#" class="ml-2">Shop</a>
                                </div>
                                <div class="find-widget">
                                    Address: <a href="#" class="ml-2">ctetur aconsectetur dipisicing elit,</a>
                                </div>
                                <div class="find-widget">
                                    Phone: <a href="#"  class="ml-2">+212 611223344</a>
                                </div>

                                <div class="find-widget">
                                    Website: <a href="#"  class="ml-2">www.shop.com</a>
                                </div>
                                <div class="find-widget">
                                    Program: <a href="#"  class="ml-2">Lun-Sam: 09:30 AM - 10.30 PM</a>

                                </div>
                            </div>
                            <!-- contact form -->
                            <div class="col-md-6 wow animated fadeInRight mt-3" data-wow-delay=".2s">
                                <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                                    <!-- Name -->
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="name">Nom</label>
                                        <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <!-- email -->
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <!-- Subject -->
                                    <div class="form-group label-floating">
                                        <label class="control-label">Sujet</label>
                                        <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <!-- Message -->
                                    <div class="form-group label-floating">
                                        <label for="message" class="control-label">Message</label>
                                        <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <!-- Form Submit -->
                                    <div class="form-submit mt-5">
                                        <button class="btn btn-outline-secondary" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Envoyer</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
