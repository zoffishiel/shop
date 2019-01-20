@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
@endsection

@section('content')
<header>
    <style media="screen">
        .nobg {
      height: 500px;
    /* background-color: rgba(255, 255, 255, .4); */
    }

.parallax {
  /* The image used */
  background-image: url("https://www.richestsoft.com/blog/wp-content/uploads/2018/10/ecommerce-promotion.jpg");

  /* Set a specific height */
  min-height: 300px;

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
    </style>
</header>



<div class="row m-0 p-0">
    <div id="carouselExampleIndicators" class="carousel slide w-100  " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 600px !important;">
            <div class="carousel-item active ">
                <img src="https://loremflickr.com/g/1200/1200/paris" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="https://loremflickr.com/g/1200/1200/paris" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://loremflickr.com/g/1200/1200/paris" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>

<div class="row mt-4 mb-4 justify-content-md-center  m-0 p-0 ">
    <div class="card col-md-3  ">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>

    <div class="card col-md-3  ml-4">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>

    <div class="card col-md-3  ml-4">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
</div>

<div class="parallax">
    <div class="row  align-middle m-0 p-0">
        <div class=" card col-md-4">
            {{-- <span class='numscroller' data-min='1' data-max='1000' data-delay='5' data-increment='10'>1000</span> --}}
            <div id="counter">
                <div class="counter-value" data-count="1500">200</div>
            </div>
            <h5>Sels</h5>
        </div>
    </div>
</div>

<div class="nobg">

</div>


@endsection

@section('js')
{{-- numscroller-1.0.js --}}
{{-- <script src="{{ asset('node_modules/jquery-filepond/filepond.jquery.js') }}" charset="utf-8"></script> --}}
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
@endsection
