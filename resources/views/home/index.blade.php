@extends('layouts.app')

@section('title', 'My First App')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                       How are you feeling in current weather?
                    </h1>
                    <!--
                    <a href="#"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-frown-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-bus" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-bicycle" aria-hidden="true"></i></a>
                    -->
                    <div class="dark_images">
                    <a href="javascript:AddEmpotion('excited')"><img src="images/excited.png" class="emo_image" id="emo_excited" height="80" width="80" /></a> &nbsp;
                    <a href="javascript:AddEmpotion('happy')"><img src='images/happy.png'  class="emo_image"  id="emo_happy" height="80" width="80"  /></a> &nbsp;
                    <a href="javascript:AddEmpotion('netural')"><img src='images/netural.png' class="emo_image"  id="emo_netural" height="80" width="80"  /></a> &nbsp;
                    <a href="javascript:AddEmpotion('so')"><img src="images/so.png" class="emo_image" id="emo_so" height="80" width="80"  /></a> &nbsp;
                    <a href="javascript:AddEmpotion('sad')"><img src="images/sad.png" class="emo_image" id="emo_sad" height="80" width="80"  /></a> &nbsp;
                    <a href="javascript:AddEmpotion('verysad')"><img src="images/vsad.png" class="emo_image" id="emo_vsad" height="80" width="80"  /></a>
                    </div>
                </div>
            </div>

        </div>

	</div>
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Hourly</span>
                        <h5>Temperature</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" id = "tmp_avg">Loading</h1>
                        <h3 class="stat-percent font-bold" id="tmp_diff"></h3>
                        <small>10 Hours Average</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Hourly</span>
                        <h5>Humadity</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" id = "hum_avg">Loading</h1>
                        <h3 class="stat-percent font-bold" id="hum_diff"></h3>
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
                        <h3 class="stat-percent font-bold" id="wnd_diff"></h3>
                        <<small>10 Hours Average</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Hourly</span>
                        <h5>Pressure</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins" id="sol_avg">Loading</h1>
                        <h3 class="stat-percent font-bold" id="sol_diff"></h3>
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
                                <h5>Pressure</h5>
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
                        <h5>Recommended Events</h5>
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
                        <h5>Everyday Condition Schedule</h5>
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
        .dark_images img {
            -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
            filter: grayscale(100%);
        }
        .dark_images img:hover {
            -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
            filter: none;
        }
        .bright_image {
            -webkit-filter: none !important; /* Safari 6.0 - 9.0 */
            filter: none !important;
        }
    </style>
    <script>

        function AddEmpotion(mode) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/addusermode',
                type: 'POST',
                contentType: 'application/x-www-form-urlencoded',
                data: {'_token' : '{{ csrf_token() }}', 'current_mode' : mode },
                success: function (data) {
                    $(".emo_image").removeClass("bright_image");
                    $("#emo_" + mode).addClass("bright_image");
                }
            });
        }



        $(document).ready(function() {


            $("#emo_{{$user_mode}}").addClass("bright_image");

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
            var today_date_string = moment(date).format('YYYYMMDD');
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $.get("predictmode", function( mode_data ) {

                var monthNames = [
                    "None", "excited", "happy",
                    "netural", "so", "sad", "vsad"
                ];

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'prev,next today'
                        //right: 'month,agendaWeek,agendaDay'
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
                        var date_string = moment(date).format('YYYYMMDD');

                        var today_mod_data = mode_data[date_string];

                        if (date_string == today_date_string) {
                            cell.append('<span class="p-3"><img srcset="images/{{$user_mode}}.png" width="20" height="20" /> </span>');
                            return;
                        }

                        if (typeof today_mod_data == 'undefined') {
                            return;
                        }


                        var file_path = "images/" + monthNames[today_mod_data] + ".png";

                        var randomNumber = Math.floor(Math.random() * 30);

                        cell.append('<span class="p-3"><img srcset="' + file_path + '" width="20" height="20" /> </span>');


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
            });
                /*
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'prev,next today'
                    //right: 'month,agendaWeek,agendaDay'
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
                    console.log(date);
                    var randomNumber = Math.floor(Math.random() * 30);
                    if ((randomNumber % 2) == 0) {
                        cell.append('<span class="p-3"><img srcset="images/netural.png" width="20" height="20" /> </span>');
                    } else {
                        cell.append('<span class="p-3"><img srcset="images/happy.png" width="20" height="20" /> </span>');
                    }

                },

            });
        */
			
			
			var sparklineCharts = function(tmp_arr, hum_arr, wnd_arr, sol_arr){

			    console.log(tmp_arr);
                 $("#sparkline1").sparkline(tmp_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: tmp_arr[23] > tmp_arr[14] ? "#ed5565" : "#1ab394",
                     fillColor: "#ffffff"
                 });

                 $("#sparkline2").sparkline(hum_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: hum_arr[22] > hum_arr[14] ? "#ed5565" : "#1ab394",
                     fillColor: "#ffffff"
                 });

                 $("#sparkline3").sparkline(wnd_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: wnd_arr[22] > wnd_arr[14] ? "#ed5565" : "#1ab394",
                     fillColor: "#ffffff"
                 });

                 $("#sparkline4").sparkline(sol_arr, {
                     type: 'line',
                     width: '100%',
                     height: '60',
                     lineColor: sol_arr[22] > sol_arr[14] ? "#ed5565" : "#1ab394",
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
                            data: {'city': $("#top-search").val()},
                            dataType: 'json',
                            success: function (data) {
                                console.log(data);
                                json_data = data;
                                var tmp_arr = Object.values(json_data.TEMPERATURE);
                                var hum_arr = Object.values(json_data.HUMADITY);
                                var wnd_arr = Object.values(json_data.WIND);
                                var sol_arr = Object.values(json_data.SOLAR);
                                var psr_arr = Object.values(json_data.SPRESSURE);
                                $("#tmp_avg").html(tmp_arr[0]);
                                $("#hum_avg").html(hum_arr[0]);
                                $("#sol_avg").html(sol_arr[0]);
                                $("#wnd_avg").html(wnd_arr[0]);
                                $("#last_updated_time").html(json_data.RECORD_DATE[0]);

                                console.log(tmp_arr);
                                var wnd_diff = Math.round((wnd_arr[0] - wnd_arr[10]) / wnd_arr[10] * 100);
                                var tmp_diff = Math.round((tmp_arr[0] - tmp_arr[10]) / tmp_arr[10] * 100);
                                var hum_diff = Math.round((hum_arr[0] - hum_arr[10]) / hum_arr[10] * 100);
                                var sol_diff = Math.round((psr_arr[0] - psr_arr[10]) / psr_arr[10] * 100);

                                if (tmp_diff >= 0) {
                                    $("#tmp_diff").html(tmp_diff + '% <i class="fa fa-level-up"></i>').addClass("text-danger");
                                } else {
                                    $("#tmp_diff").html(Math.abs(tmp_diff) + '% <i class="fa fa-level-down"></i>').addClass("text-info");
                                }

                                if (hum_diff >=0 ) {
                                    $("#hum_diff").html(hum_diff + '% <i class="fa fa-level-up"></i>').addClass("text-danger");
                                } else {
                                    $("#hum_diff").html(Math.abs(hum_diff) + '% <i class="fa fa-level-down"></i>').addClass("text-info");
                                }

                                if (wnd_diff >= 0) {
                                    $("#wnd_diff").html(wnd_diff + '% <i class="fa fa-level-up"></i>').addClass("text-danger");
                                } else {
                                    $("#wnd_diff").html(Math.abs(wnd_diff) + '% <i class="fa fa-level-down"></i>').addClass("text-info");
                                }

                                if (sol_diff >= 0) {
                                    $("#sol_diff").html(sol_diff + '% <i class="fa fa-level-up"></i>').addClass("text-danger");
                                } else {
                                    $("#sol_diff").html(Math.abs(sol_diff) + '% <i class="fa fa-level-down"></i>').addClass("text-info");
                                }

                                sparklineCharts(tmp_arr.reverse(), hum_arr.reverse(), wnd_arr.reverse(), sol_arr.reverse());
                            }

                        });
                    }

            update_weather_data();

            setInterval(update_weather_data, 60000);
				//sparklineCharts();

        });
		

    </script>
@endsection

