<!DOCTYPE html>
<html class="no-js " lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SPH : PHP Assignment</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <meta id="base_url" data-url="{{ url('/') }}"/>
    @stack('style')
    <style>
      footer {
        padding: 45px 25px;
        height: 10em;
      }
    </style>
  </head>
  <body>
    <!-- if lt IE 10p.browserupgrade You are using an strong outdated browser. Please a(href='http://browsehappy.com/') upgrade your browser to improve your experience.
    -->
    
    <div id="overlayer">
      <div class="ball-wrap">
        <div class="bounceball"></div>
      </div>
    </div>
    <div class="wrap fluid-container">
      <main class="main">
        <div class="page-content">
            @yield('content')
        </div>
      </main>
    </div>
    <footer class="fluid-container"> 
      <div class="container">
        <div class="row">
          <div class="col-9 col newspaper-links">
            <div class="copy"><span>Copyright © 2020 Singapore Press Holdings Ltd. Co. Regn. No. 198402868E. All Rights Reserved. <br></span>1000 Toa Payoh North Annexe Level 6, News Centre Singapore 318994</div>
          </div>
        </div>
      </div>
    </footer>
    <div class="helper-box-overlay"> </div>
    <div class="sph-lightbox" id="common">
      <div class="overlay"></div>
      <div class="custom-ligthbox">
        <div class="close-lightbox"> <img src="images/icons/close-cross-white.svg"><span>Close</span></div>
        <div class="lightbox-content">
          <div class="lightbox-body" id="lbody"></div>
          <div id="error"></div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/app.js') }}"> </script>
    <script src="{{ asset('js/checkout.js') }}"> </script>
    <script src="{{ asset('js/moment.js') }}"> </script>
    @stack('scripts')
  </body>
</html>