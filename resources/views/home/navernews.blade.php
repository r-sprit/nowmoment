@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <form id="news_cities_form" method="post" action="{{Request::fullUrl()}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <select name="news_city_name" id="news_city_name">
            @foreach($cities_list as $city)

                    <option value="{{$city->english_name}}">{{$city->english_name}}</option>

            @endforeach
            </select>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>{{$city_name}}</h2>
                <div class="text-center m-t-lg">
                    @foreach($news_data as $news)
                    <h1 class="text-left">
                        <a href="{{$news['link']}}"> {{$news["title"]}} </a>
                    </h1>
                    <p>{{$news["description"]}}t</p>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function() {

        $("#news_city_name").change(function() {
            // Check input( $( this ).val() ) for validity here
            $( "#news_cities_form" ).submit();
        });
        $("#news_city_name").val("{{$city_name}}");

    });
    </script>


@endsection



