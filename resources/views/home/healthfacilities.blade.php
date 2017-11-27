@extends('layouts.app')

@section('title', 'Health facility in Gyeonggi Province of Kora')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Health facility in Gyeonggi Province of Korea
                    </h1>

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#my_map_googlemap">Map</a></li>
                        <li><a data-toggle="tab" href="#my_dt_datatable">Tabular</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="my_map_googlemap" class="tab-pane fade in active">
                            <div id="main_map" style="width: 100%; height: 400px;"> </div>
                        </div>
                        <div id="my_dt_datatable" class="tab-pane fade">
                            <div class="ibox-content">
                    <div class="table-responsive text-left">
                    <table id="dataTables-example"
                           class="table table-striped table-bordered table-hover" width="98%">
                        <thead>
                        <tr>
                            <th>Distance</th>
                            <th>SIGUN_NM</th>
                            <th>FACLT_NM</th>
                            <th>FACLT_DIV_NM</th>
                            <th>REFINE_ROADNM_ADDR</th>
                            <th>DOCTER_CNT</th>
                            <th>NURSE_CNT</th>
                        </tr>
                        </thead>
                    </table>
                    </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $(document).ready(function() {

            var lat = 37.56826;
            var lng = 126.977829;

            function createDataTable(outdata) {
                console.log(outdata);
                $('#dataTables-example').DataTable({

                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    aaData : outdata,
                    aoColumns : [
                        { "mDataProp": "DIST"},
                        { "mDataProp": "SIGUN_NM" },
                        { "mDataProp": "FACLT_NM" },
                        { "mDataProp": "FACLT_DIV_NM" },
                        { "mDataProp": "REFINE_ROADNM_ADDR" },
                        { "mDataProp": "DOCTER_CNT" },
                        { "mDataProp": "NURSE_CNT" }
                    ],
                    "columnDefs": [
                        { "bVisible": false, "targets": 0 }
                    ],
                    "order": [[ 0, "asc" ]],
                    buttons: [
                        {extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {
                            extend: 'print',
                            customize: function (win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });
            }
            url = "http://openapi.gg.go.kr/HEALTHENHNCCENTER?key=93c8f67b82c9453e92a50dc5d3280ee3&type=json&pSize=1000";
            $.get( url, function( data ) {
                $( "#results" ).html( data );
                console.log(data);
                var outdata = data.HEALTHENHNCCENTER[1].row;
                for(i = 0; i<outdata.length; i++) {
                    outdata[i].DIST = computeDistance(lat, lng,
                        outdata[i].REFINE_WGS84_LAT, outdata[i].REFINE_WGS84_LOGT);
                }
                createDataTable(outdata);
            }, "jsonp" );


            //
        });
    </script>

    <script>
        function initMap() {


            function addInfoWindow(marker, message) {

                var infoWindow = new google.maps.InfoWindow({
                    content: message
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infoWindow.open(map, marker);
                });
            }

            var lat = 37.56826;
            var lng = 126.977829;

            var uluru = {lat: lat, lng: lng};
            var map = new google.maps.Map(document.getElementById('main_map'), {
                zoom: 10,
                center: uluru
            });

            url = "http://openapi.gg.go.kr/HEALTHENHNCCENTER?key=93c8f67b82c9453e92a50dc5d3280ee3&type=json&pSize=1000";

            $.get( url, function( data ) {
                $( "#results" ).html( data );
                console.log(data);
                var outdata = data.HEALTHENHNCCENTER[1].row;

                for(i = 0; i<outdata.length; i++) {
                    var marker = new google.maps.Marker({
                        position: {lat: outdata[i].REFINE_WGS84_LAT,
                            lng: outdata[i].REFINE_WGS84_LOGT},
                        map: map
                    });
                    addInfoWindow(marker, outdata[i].FACLT_NM);
                }
            }, "jsonp" );


        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDHKMP4M6pcQ86PfG-T58HWITNXlGnCjA&callback=initMap">
    </script>
@endsection
