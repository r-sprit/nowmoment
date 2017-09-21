@extends('layouts.app')

@section('title', 'My First App')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                       How are you feeling in current weather?
                        <a href="#"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-frown-o" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-bus" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-bicycle" aria-hidden="true"></i></a>
                    </h1>

					
                </div>
            </div>

        </div>

	</div>
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Hourly</span>
                        <h5>Temperature</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" id = "tmp_avg">Loading</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>10 Hours Average</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Hourly</span>
                        <h5>Humadity</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" id = "hum_avg">Loading</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                        <<small>10 Hours Average</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Hourly</span>
                        <h5>Wind</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" id="wnd_avg">Loading</h1>
                        <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                        <<small>10 Hours Average</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">Hourly</span>
                        <h5>Solar</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" id="sol_avg">Loading</h1>
                        <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                        <small>10 Hours Average</small>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
                    <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Temperature</h5>
                                <div id="sparkline1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Humadity</h5>
                                <div id="sparkline2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Wind</h5>
                                <div id="sparkline3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Solar</h5>
                                <div id="sparkline4"></div>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="row text-right">
            <h2>Last Updated ... <span id="last_updated_time"></span></h2>
        </div>

	</div>
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInDown">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Draggable Events</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id='external-events'>
                            <p>Drag a event and drop into callendar.</p>
                            <div class='external-event navy-bg'>Shpping.</div>
                            <div class='external-event navy-bg'>Walking</div>
                            <div class='external-event navy-bg'>Long Drive</div>
                            <div class='external-event navy-bg'>Outing</div>
                            <div class='external-event navy-bg'>Picnic</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Striped Table </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <style>

        .fc td, .fc th {
            padding: 5px 10px !important;
            vertical-align: top; }
    </style>
    <script>

        $(document).ready(function() {



            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            /* initialize the external events
             -----------------------------------------------------------------*/


            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function( date ) {
                    input_data = {
                        event_date: moment(date).format('YYYY-MM-DD'),
                        event_text: $(this).text(),
                        _token: "{{ csrf_token() }}"
                    };

                    $.ajax({
                        url: '/addevent',
                        type: 'get',
                        data: input_data,
                        success: function (data) {
                            alert(data);
                        }
                    });

                    // is the "remove after drop" checkbox checked?

                },
                height:500,
                dayRender: function(date, cell) {
                    cell.append('<span class="p-3"><i class="fa fa-smile-o fa-lg p-3" aria-hidden="true"></i></span>');
                },
                events: '/getevents' /* ,
                events: [
                    {
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d-5),
                        end: new Date(y, m, d-2)
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d-3, 16, 0),
                        allDay: false
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d+4, 16, 0),
                        allDay: false
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d+1, 19, 0),
                        end: new Date(y, m, d+1, 22, 30),
                        allDay: false
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/'
                    }
                ] */
            });
			
			
			var sparklineCharts = function(tmp_arr, hum_arr, wnd_arr, sol_arr){
                 $("#sparkline1").sparkline(tmp_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: '#1ab394',
                     fillColor: "#ffffff"
                 });

                 $("#sparkline2").sparkline(hum_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: '#1ab394',
                     fillColor: "#ffffff"
                 });

                 $("#sparkline3").sparkline(wnd_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: '#ed5565',
                     fillColor: "#ffffff"
                 });

                 $("#sparkline4").sparkline(sol_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: '#ed5565',
                     fillColor: "#ffffff"
                 });
			};
				 
				 var sparkResize;

				$(window).resize(function(e) {
					clearTimeout(sparkResize);
					sparkResize = setTimeout(sparklineCharts, 500);
				});

                    function update_weather_data() {
                        $.ajax({
                            url: '/liveweather',
                            dataType: 'json',
                            success: function (data) {
                                console.log(data);
                                json_data = data;
                                var tmp_arr = Object.values(json_data.TEMPERATURE.reverse());
                                var hum_arr = Object.values(json_data.HUMADITY.reverse());
                                var wnd_arr = Object.values(json_data.WIND.reverse());
                                var sol_arr = Object.values(json_data.SOLAR.reverse());
                                $("#tmp_avg").html(tmp_arr[0]);
                                $("#hum_avg").html(hum_arr[0]);
                                $("#sol_avg").html(sol_arr[0]);
                                $("#wnd_avg").html(wnd_arr[0]);
                                $("#last_updated_time").html(json_data.RECORD_DATE[0]);
                                sparklineCharts(tmp_arr, hum_arr, wnd_arr, sol_arr);

            $.ajax({
                url: '/liveweather',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    json_data = data;
                    var tmp_arr = Object.values(json_data.TEMPERATURE);
                    var hum_arr = Object.values(json_data.HUMADITY);
                    var wnd_arr = Object.values(json_data.WIND);
                    var sol_arr = Object.values(json_data.SOLAR);
                    console.log(tmp_arr);
                    console.log(Math.max.apply(Math, tmp_arr));
                    $("#tmp_avg").html(tmp_arr[0]);
                    $("#hum_avg").html(hum_arr[0]);
                    $("#sol_avg").html(sol_arr[0]);
                    $("#wnd_avg").html(wnd_arr[0]);
                    $("#last_updated_time").html(json_data.RECORD_DATE[0]);
                    sparklineCharts(tmp_arr, hum_arr, wnd_arr, sol_arr);

                }
            });

                            }

                        });
                    }

            update_weather_data();

            setInterval(update_weather_data, 60000);
				//sparklineCharts();

        });
		

    </script>
@endsection

