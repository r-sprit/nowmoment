@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Health facility for chronic disease
                    </h1>
                    <div id="results"></div>
                    <div class="ibox-content">

                    <div class="table-responsive text-left">
                    <table id="dataTables-example"
                           class="table table-striped table-bordered table-hover" width="98%">
                        <thead>
                        <tr>
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
                        { "mDataProp": "FACLT_NM" },
                        { "mDataProp": "FACLT_DIV_NM" },
                        { "mDataProp": "REFINE_ROADNM_ADDR" },
                        { "mDataProp": "DOCTER_CNT" },
                        { "mDataProp": "NURSE_CNT" }
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
            url = "http://openapi.gg.go.kr/HEALTHENHNCCENTER?key=050f8fa7263748229e91ddf9dfe5f0e5&type=json";
            $.get( url, function( data ) {
                $( "#results" ).html( data );
                console.log(data);
                outdata = data.HEALTHENHNCCENTER[1].row;
                console.log(data.HEALTHENHNCCENTER[1]);
                createDataTable(outdata);
            }, "json" );


            //
        });
    </script>
@endsection
