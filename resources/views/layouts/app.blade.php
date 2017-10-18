<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta id="token" name="token" content="{{ csrf_token() }}">
    <meta name="referrer" content="no-referrer" />
    <title>R-Spirit - @yield('title') </title>


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


          var lat = 37.56826;
          var lng = 126.977829;


          $("#search-updater").click(function() {
              $("#navbar-search-form").submit();
          });

          /*
          if ("geolocation" in navigator){ //check geolocation available
              //try to get user current location using getCurrentPosition() method
              navigator.geolocation.getCurrentPosition(function(position){
                  console.log("Found your location \nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
              });
          }else{
              console.log("Browser doesn't support geolocation!");
          }
            */
          @if (Request::has("top-search"))

            $("#top-search").val('{{Request::get("top-search")}}');
          @else
          $.getJSON('https://ipinfo.io/geo', function(response) {
              var loc = response.loc.split(',');
              var coords = {
                  latitude: loc[0],
                  longitude: loc[1]
              };
              console.log(response.city.length);

              if (response.city.length == 0) {
                  $("#top-search").val("Seoul");
              } else {
                  $("#top-search").val(response.city);
              }

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

      if (typeof(Number.prototype.toRadians) === "undefined") {
          Number.prototype.toRad = function() {
              return this * Math.PI / 180;
          }
      }

      Math.radians = function(degrees) {
          return degrees * Math.PI / 180;
      };

      // Converts from radians to degrees.
      Math.degrees = function(radians) {
          return radians * 180 / Math.PI;
      };

      function computeDistance(lat1, lon1, lat2, lon2) {
          var R = 6371; // Radius of the earth in km
          var dLat = Math.radians(lat2-lat1);  // deg2rad below
          var dLon = Math.radians(lon2-lon1);
          var a =
              Math.sin(dLat/2) * Math.sin(dLat/2) +
              Math.cos(Math.radians(lat1)) * Math.cos(Math.radians(lat2)) *
              Math.sin(dLon/2) * Math.sin(dLon/2)
          ;
          var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
          return R * c; // Distance in km
      }


  </script>

@section('scripts')
@show

</body>
</html>
