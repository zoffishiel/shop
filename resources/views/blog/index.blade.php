@extends('layouts.app')

@section('content')
  <!DOCTYPE html>
  <html lang="en">

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">

      <title> Blog </title>

      <!-- Bootstrap core CSS -->


      <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

      <!-- Custom fonts for this template -->
      <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

      <!-- Custom styles for this template -->

    </head>

    <body>



      <!-- Page Header -->
      <header class="masthead" style="background-image: url('img/blog2.jpg')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="site-heading">
                <h1>Blog</h1>
                <span class="subheading">Chaque jour un article</span>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content -->
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
              <a href="{{ route('blog.post') }}">
                <h2 class="post-title">
                Tite Example
                </h2>
                <h3 class="post-subtitle">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna al
                </h3>
              </a>
              <p class="post-meta">Posted by
                <a href="#">User2</a>
                on September 24, 2018</p>
            </div>
            <hr>
            <div class="post-preview">
              <a href="{{ route('blog.post') }}">
                <h2 class="post-title">
                  I believe every human
                </h2>
              </a>
              <p class="post-meta">Posted by
                <a href="#">User1</a>
                on September 18, 2018</p>
            </div>
            <hr>
            <div class="post-preview">
              <a href="{{ route('blog.post') }}">
                <h2 class="post-title">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                </h2>
                <h3 class="post-subtitle">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </h3>
              </a>
              <p class="post-meta">Posted by
                <a href="#">User</a>
                on August 24, 2018</p>
            </div>
            <hr>
            <div class="post-preview">
              <a href="{{ route('blog.post') }}">
                <h2 class="post-title">
                  Lorem ipsum dolor sit amet
                </h2>

              </a>
              <p class="post-meta">Posted by
                <a href="#">Admin</a>
                on July 8, 2018</p>
            </div>
            <hr>
            <!-- Pager -->
            <div class="clearfix">
              <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <!-- Footer -->
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <ul class="list-inline text-center">
                <li class="list-inline-item">
                  <a href="#">
                    <span class="fa-stack fa-lg">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <span class="fa-stack fa-lg">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <span class="fa-stack fa-lg">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-instagram  fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </footer>

      <!-- Bootstrap core JavaScript -->


      <!-- Custom scripts for this template -->
      <script src="js/blog.js"></script>
          <script src="{{ asset('js/app.js') }}" defer></script>

    </body>

  </html>

@endsection
