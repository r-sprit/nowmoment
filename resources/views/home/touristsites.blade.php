@extends('layouts.app')

@section('title', 'Tourist Sites Information in Gyeonggi Province of Kora')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Tourist Sites Information in Gyeonggi Province of Kora
                    </h1>
                    <div id="results"></div>
                    <div class="ibox-content">

                    <div class="table-responsive text-left">
                    <table id="dataTables-example"
                           class="table table-striped table-bordered table-hover" width="98%">
                        <thead>
                        <tr>
                            <th>County</th>
                            <th>Site Name</th>
                            <th>Course Time</th>
                            <th>Start Address</th>
                            <th>End Address</th>
                            <th>Phone Number</th>
                            <th>Path Information</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                    </table>
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

            function createDataTable(outdata) {
                console.log(outdata);
                $('#dataTables-example').DataTable({

                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    aaData : outdata,
                    aoColumns : [
                        { "mDataProp": "SIGUN_NM" },
                        { "mDataProp": "STRET_NM_INFO" },
                        { "mDataProp": "TOT_REQURE_TM_INFO" },
                        { "mDataProp": "BEGIN_SPOT_ROADNM_ADDR" },
                        { "mDataProp": "END_SPOT_LOCPLC_ROADNM_ADDR" },
                        { "mDataProp": "MNGINST_TELNO" },
                        { "mDataProp": "COURS_INFO" },
                        { "mDataProp": "DATA_STD_DE" }
                    ],
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
            url = "http://openapi.gg.go.kr/STRETTURSMINFO?key=050f8fa7263748229e91ddf9dfe5f0e5&type=json&pSize=1000";
            $.get( url, function( data ) {
                $( "#results" ).html( data );
                console.log(data);
                outdata = data.STRETTURSMINFO[1].row;
                console.log(data.STRETTURSMINFO[1]);
                createDataTable(outdata);
            }, "json" );


            //
        });
    </script>
@endsection
