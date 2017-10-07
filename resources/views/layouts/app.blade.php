<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSRIT - @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

  <script type="text/javascript">
      $(document).ready(function() {

          $("#search-updater").click(function() {
              $("#navbar-search-form").submit();
          });


          if ("geolocation" in navigator){ //check geolocation available
              //try to get user current location using getCurrentPosition() method
              navigator.geolocation.getCurrentPosition(function(position){
                  console.log("Found your location \nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
              });
          }else{
              console.log("Browser doesn't support geolocation!");
          }

          @if (Request::has("top-search"))

            $("#top-search").val('{{Request::get("top-search")}}');
          @else
          $.getJSON('https://ipinfo.io/geo', function(response) {
              var loc = response.loc.split(',');
              var coords = {
                  latitude: loc[0],
                  longitude: loc[1]
              };
              console.log(response.city);
              $("#top-search").val(response.city);

          });
          @endif

          $.ajaxSetup({
              scriptCharset: "utf-8",
              contentType: "application/json; charset=utf-8"
          });

          $.getJSON('/getcities', function(data){
              console.log(data);
              $("#top-search").typeahead({ source:data });
          },'json');
      });
  </script>

@section('scripts')
@show

</body>
</html>
