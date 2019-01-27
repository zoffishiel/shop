@extends('layouts.app')

@section('content')
<header>
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
  <link rel="stylesheet" href="{{ asset('css/footer.css')}}">
    <style media="screen">
        .nobg {
            height: 500px;
            /* background-color: rgba(255, 255, 255, 0); */
        }

        .parallax {
            /* The image used */
            background-image: url("img/ecommerce.jpg");

            /* Set a specific height */
            min-height: 250px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .couter_Card {
            background: rgba(255, 255, 255, .5);
            text-align: center;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;


            font-family: 'Roboto', sans-serif;


        }
        .counter-value{
          font-size: 35px;
        }
        .shadow{

           box-shadow: 2px 6px 15px #888888;
        }
        .number_Center {
            line-height: 200px;
        }

        .carousel-item{
          height: 500px !important;
        }
        .carousel-item img{
          height: 500px !important;
        }


    </style>
</header>

<div class="row m-0 p-0 shadow">
  <div id="sliders" class="carousel slide w-100">
    <ol class="carousel-indicators">
      @for ($i=0; $i < $sliders->count(); $i++)
        @if ($i == 0)
          <li data-target="#sliders" data-slide-to="{{$i}}" class="active"></li>
        @else
          <li data-target="#sliders" data-slide-to="{{$i}}"></li>
        @endif

      @endfor
    </ol>
    <div class="carousel-inner" style="height: 500px !important" data-ride="slider">
      @foreach ($sliders as $index => $slider)

        @if (!$index)
          <div class="carousel-item active">
        @else
          <div class="carousel-item">
        @endif
        <a href="{{ $slider->lien }}">
            <img src="/{{ $slider->image }}" class="d-block  w-100">
            <div class="carousel-caption d-none d-md-block">
              <h4><b>{{ $slider->titre }}</b></h4>
                <p>{{ $slider->description }}</p>
            </div>
        </div>
        </a>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#sliders" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#sliders" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
  </div>

</div>

<div class="row mt-4 mb-4 justify-content-md-center  m-0 p-0  ">
    <div class="card col-md-3  ">
        <div class="card-body">
            <h5 class="card-title">Lorem ipsum</h5>
            {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="card-link">Lorem</a>

        </div>
    </div>

    <div class="card col-md-3  ml-4">
        <div class="card-body">
          <h5 class="card-title">Lorem ipsum</h5>
          {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="card-link">Lorem</a>
        </div>
    </div>

    <div class="card col-md-3  ml-4">
        <div class="card-body">
          <h5 class="card-title">Lorem ipsum</h5>
          {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="card-link">Lorem</a>
        </div>
    </div>
</div>

<div class="parallax ">
    <div class="row  align-middle m-0 p-0">
        <div class="  col-md-4 couter_Card m-0 p-0">
            {{-- <span class='numscroller' data-min='1' data-max='1000' data-delay='5' data-increment='10'>1000</span> --}}
            <div id="counter">
                <div class="counter-value" data-count="6500">0</div>
                <h4>Ventes</h4>
            </div>

        </div>

        <div class="  col-md-4 couter_Card  m-0 p-0">
            {{-- <span class='numscroller' data-min='1' data-max='1000' data-delay='5' data-increment='10'>1000</span> --}}
            <div id="counter">
                <div class="counter-value" data-count="3000">+0</div>
                <h4>Utilisateurs</h4>
            </div>

        </div>

        <div class="  col-md-4 couter_Card">
            {{-- <span class='numscroller' data-min='1' data-max='1000' data-delay='5' data-increment='10'>1000</span> --}}
            <div id="counter">
                <div class="counter-value" data-count="40000">0</div>
                <h4>Produits</h4>
            </div>

        </div>
    </div>
</div>

<footer id="myFooter" >
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                <h2 class="logo"><a href="#"> SHOP </a></h2>
            </div>
            <div class="col-sm-2">
                <h5>Get started</h5>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sign up</a></li>
                    <li><a href="#">lorem</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>À-propos</h5>
                <ul>
                    <li><a href="#">Cqui officia deserunt</a></li>
                    <li><a href="#">cupidatat non proi</a></li>
                    <li><a href="#">pidatat no</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>i officia dese</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">vi officia dese</a></li>
                    <li><a href="#">i officia dese</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="social-networks">
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fab fa-google-plus"></i></a>
                </div>
                <a role="button" class="btn btn-default" href="{{ route('contact') }}">Contactez nous</a>
            </div>
        </div>
    </div>
    <div class="footer-copyright">

    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}" charset="utf-8"></script>
{{-- <script src="{{ asset('js/numscroller-1.0.js') }}"></script> --}}

<script>
    console.log("OK");
    var a = 0;
    $(window).scroll(function() {

        var oTop = $('#counter').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },

                    {

                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }

                    });
            });
            a = 1;
        }

    });
</script>

<script type="text/javascript">
    $(function() {
        var iframe = $('.main-content iframe')[0],
            menu_links = $('.items li a'),
            selected_link,
            href;

        $(window).on('hashchange', function() {

            if (window.location.hash) {
                href = window.location.hash.substring(1);
                selected_link = $('a[href$="' + href + '"]');
                // Check if the hash is valid - it should exist as one of the menu items.
                if (selected_link.length) {
                    iframe.contentWindow.location.replace(href + '.html');

                    menu_links.removeClass('active');
                    selected_link.addClass('active');
                }
            } else {
                iframe.contentWindow.location.replace('Footer-with-logo.html');
                menu_links.removeClass('active');
                $(menu_links[0]).addClass('active');
            }
        });

        if (window.location.hash) {
            $(window).trigger('hashchange');
        }

        menu_links.on('click', function(e) {
            e.preventDefault();

            window.location.hash = $(this).attr('href');
        });

        $('#template-select').on('change', function(e) {
            e.preventDefault();
            window.location.hash = $(this).find(':selected').data('href');
        });

    });
</script>


@endsection
