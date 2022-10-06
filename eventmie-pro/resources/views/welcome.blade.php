@extends('eventmie::layouts.app')

@section('title') @lang('eventmie-pro::em.home') @endsection

@section('content')

<!--Banner slider start-->
<section>
    <div class="lgx-slider welcome-slider">
        <div class="lgx-banner-style">
            <div class="lgx-inner">
                <div id="lgx-main-slider" class="owl-carousel lgx-slider-navbottom">
                    <!--Vue slider-->
                    @guest
                    <banner-slider
                        :banners="{{ json_encode($banners, JSON_HEX_APOS) }}"
                        :is_logged="{{ 0 }}"
                        :is_customer="{{ 0 }}"
                        :is_organiser="{{ 0 }}"
                        :is_admin="{{ 0 }}"
                        :is_multi_vendor="{{ setting('multi-vendor.multi_vendor') ? 1 : 0 }}"
                        :demo_mode="{{ config('voyager.demo_mode') }}"
                        :check_session="{{ json_encode(session('verify'), JSON_HEX_TAG) }}"
                        :s_host="{{ json_encode($_SERVER['REMOTE_ADDR'], JSON_HEX_TAG) }}"
                    ></banner-slider>
                    @else
                    <banner-slider
                        :banners="{{ json_encode($banners, JSON_HEX_APOS) }}"
                        :is_logged="{{ 1 }}"
                        :is_customer="{{ Auth::user()->hasRole('customer') ? 1 : 0 }}"
                        :is_organiser="{{ Auth::user()->hasRole('organiser') ? 1 : 0 }}"
                        :is_admin="{{ Auth::user()->hasRole('admin') ? 1 : 0 }}"
                        :is_multi_vendor="{{ setting('multi-vendor.multi_vendor') ? 1 : 0 }}"
                        :demo_mode="{{ config('voyager.demo_mode') }}"
                        :check_session="{{ json_encode(session('verify'), JSON_HEX_TAG) }}"
                        :s_host="{{ json_encode($_SERVER['REMOTE_ADDR'], JSON_HEX_TAG) }}"
                    ></banner-slider>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner slider end-->

<!--Event Search start-->
<section class="main-search-container">
    <div >
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-search">
                            <form class="form-inline" type="GET" action="{{route('eventmie.events_index')}}">
                                <div class="form-group input-group event-search">
                                    <span class="input-group-addon"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control" name="search" placeholder="@lang('eventmie-pro::em.search_event_by')">
                                </div>
                                <!--<button type="submit" class="lgx-btn lgx-btn-black"><i class="fas fa-search"></i> @lang('eventmie-pro::em.search_event')</button>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Event Search end-->
<!--Categories-->
@if(!empty($categories))
<section>
    <div id="lgx-schedule" class="lgx-travelinfo-white">
        <div class="">
            <div class="container">
                <div class="row">
                     <div class="col-12">
                         <div class="lgx-heading .lgx-heading-dark">
                            <h2 class="heading"><i class="fas fa-bolt"></i> Available Categories</h2>
                        </div>
                        <div class="mainCat0">
                            <ul class="ulList list-inline">

                            @foreach($categories as $key => $item)
{{--                            <div class="catInner">--}}
                                    <li class="txtList cat_item">
                                     <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">
                                    <!--<article class="articStyle">-->
                                    <!--    <div class="myImg">                                         <img src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}" class="myCustImg"/>-->
                                    <!--    </div>-->
                                        <div class="txtClass">
                                              <span class="single-name">{{ $item['name'] }}</span>
                                    <!--<span class="single-name">{{ $item['slug'] }}</span>-->
                                        </div>

                                    <!--</article>-->

                                </a>
                                </li>

{{--                            </div>--}}
                            @endforeach
                            </ul>

                        </div>
                    </div>
 <!--                   <div class="col-lg-12 col-md-12">-->

 <!--<h2 class="heading">@lang('eventmie-pro::em.event_categories')</h2>-->
                        <!--<ul class="list-inline">-->
                        <!--    <li class="list-inline-item">-->
                        <!--        <a href="#all" class="btn">All</a></li>-->
                        <!--    <li class="list-inline-item">-->
                        <!--        <a href="#party" class="btn">Party</a></li>-->
                        <!--    <li class="list-inline-item">-->
                        <!--        <a href="#sports" class="btn">Sports</a></li>-->
                        <!--    <li class="list-inline-item">-->
                        <!--        <a href="#concert" class="btn">Concert</a></li>-->
                        <!--    <li class="list-inline-item">-->
                        <!--        <a href="#games" class="btn">Games</a></li>-->
                        <!--</ul>-->
 <!--                   </div>-->
                </div>
                <!--<div class="row">-->
                <!--    <div class="col-12">-->
                <!--        <div class="lgx-travelinfo-single">-->

                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--//main row-->
                    <!--<div class="container">-->

                    <!--    <div class="row justify-content-around">-->
                    <!--        @foreach($categories as $key => $item)-->
                    <!--            @if (str_contains($item['name'] , 'All') !== false)-->

                    <!--        <div class="col-lg-3 col-md-3 col-sm-12 px-2" id="all">-->
                    <!--            <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">-->

                    <!--            <img class="card-img-top" src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}" style="width: 18rem;">-->
                    <!--            <div class="card-body">-->
                    <!--                <span class="card-title">{{ $item['name'] }}</span>-->

                    <!--            </div>-->
                    <!--            </a>-->
                    <!--        </div>-->

                    <!--            @elseif (str_contains($item['name'] , 'Party') !== false)-->

                    <!--        <div class="col-lg-3 col-md-3 col-sm-12 px-2" id="party" >-->
                    <!--            <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">-->

                    <!--            <img class="card-img-top" src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}" style="width: 18rem;">-->
                    <!--            <div class="">-->
                    <!--                <span class="card-title">{{ $item['name'] }}</span>-->
                    <!--                {{--                                        <span class="single-name">{{ $item['date'] }}</span>--}}-->

                    <!--            </div>-->
                    <!--            </a>-->
                    <!--        </div>-->
                    <!--            @elseif (str_contains($item['name'] , 'Concert') !== false)-->

                    <!--        <div class="col-lg-3 col-md-3 col-sm-12 px-2" id="concert"  >-->
                    <!--            <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">-->

                    <!--            <img class="card-img-top" src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}" style="width: 18rem;">-->
                    <!--            <div class="">-->
                    <!--                <span class="card-title">{{ $item['name'] }}</span>-->

                    <!--            </div>-->
                    <!--            </a>-->
                    <!--        </div>-->
                    <!--            @elseif (str_contains($item['name'] , 'Sports') !== false)-->

                    <!--                <div class="col-lg-3 col-md-3 col-sm-12 px-2" id="sports" >-->
                    <!--                    <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">-->

                    <!--                    <img class="card-img-top" src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}" style="width: 18rem;">-->
                    <!--                    <div class="">-->
                    <!--                        <span class="card-title">{{ $item['name'] }}</span>-->

                    <!--                    </div>-->
                    <!--                    </a>-->
                    <!--                </div>-->

                    <!--            @elseif (str_contains($item['name'] , 'Games') !== false)-->

                    <!--                <div class="col-lg-3 col-md-3 col-sm-12 px-2" id="games" >-->
                    <!--                    <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">-->

                    <!--                        <img class="card-img-top" src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}" style="width: 18rem;">-->
                    <!--                        <div class="">-->
                    <!--                            <span class="card-title">{{ $item['name'] }}</span>-->

                    <!--                        </div>-->
                    <!--                    </a>-->
                    <!--                </div>-->
                    <!--        @else-->
                    <!--                <div class="col-lg-3 col-md-3 col-sm-12  px-2" style="width: 18rem;" >-->
                    <!--                    <a href="{{route('eventmie.events_index', ['category' => urlencode($item['name'])])}}">-->

                    <!--                    <img class="card-img-top" src="/storage/{{ $item['thumb'] }}" alt="{{ $item['slug'] }}" style="width: 18rem;">-->
                    <!--                    <div class="">-->
                    <!--                        <span class="card-title">{{ $item['name'] }}</span>-->

                    <!--                    </div>-->

                    <!--                    </a>-->
                    <!--            </div>-->
                    <!--        @endif-->
                    <!--        @endforeach-->

                    <!--    </div>-->

                    <!--</div>-->

            </div>
                    <!--//col-->
                </div>
            </div>
            <!--//container-->

</section>

@endif
<!--Categories END-->

<!--Custom Event Featured Start-->


@section('hide_featured')
<div class="container">
    <h5 class="heading"><i class="fas fa-star"></i> @lang('eventmie-pro::em.featured_events')</h5>

    <div id="FeaturesCarousel" class="carousel slide" data-ride="carousel">
        <!--<ol class="carousel-indicators">-->
        <!--    <li data-target="#FeaturesCarousel" data-slide-to="0" class="active"></li>-->
        <!--    <li data-target="#FeaturesCarousel" data-slide-to="1"></li>-->
        <!--    <li data-target="#FeaturesCarousel" data-slide-to="2"></li>-->
        <!--</ol>-->
        <div class="carousel-inner">
            @foreach($featured_events as $key => $item)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <a href="{{route('eventmie.events_show',($item['slug']))}}">

                <img class="d-block w-100" src="/storage/{{ $item['poster'] }}" alt="{{ $item['slug'] }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $item['title'] }}</h5>




                </div>
                </a>

            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#FeaturesCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#FeaturesCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
@endsection

<!--Custom Event Featured End-->












<!--Event Upcoming Start-->
@if(!empty($upcomming_events))
<section class="mix_bg">
    <div>
        <div class="lgx-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">

                            <h2 class="heading"><i class="fas fa-hourglass-half"></i> @lang('eventmie-pro::em.upcoming_events')</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10">
                        <event-listing
                            :events="{{ json_encode($upcomming_events, JSON_HEX_APOS) }}"
                            :currency="{{ json_encode($currency, JSON_HEX_APOS) }}"
                            :date_format="{{ json_encode([
                                'vue_date_format' => format_js_date(),
                                'vue_time_format' => format_js_time()
                            ], JSON_HEX_APOS) }}"
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="{{ route('eventmie.events_index') }}"><i class="fas fa-calendar-day"></i> @lang('eventmie-pro::em.view_all_events')</a>
                </div>

            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
@endif
<!--Event Upcoming END-->


<!--Event Top-selling Start  style="background-image: url({{ eventmie_asset('img/bg-pattern.png') }});"-->
@if(!empty($top_selling_events))
<section>
    <div id="lgx-schedule" class="">
        <div class="lgx-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading .lgx-heading-dark">
                            <h2 class="heading"><i class="fas fa-bolt"></i> @lang('eventmie-pro::em.top_selling_events')</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-10 col-lg-offset-1 col-lg-10">
                        <event-listing :events="{{ json_encode($top_selling_events, JSON_HEX_APOS) }}"
                            :currency="{{ json_encode($currency, JSON_HEX_APOS) }}"
                            :date_format="{{ json_encode([
                                'vue_date_format' => format_js_date(),
                                'vue_time_format' => format_js_time()
                            ], JSON_HEX_APOS) }}"
                        >
                        </event-listing>
                    </div>
                </div>

                <div class="section-btn-area">
                    <a class="lgx-btn lgx-btn-red" href="{{ route('eventmie.events_index') }}"><i class="fas fa-calendar-day"></i> @lang('eventmie-pro::em.view_all_events')</a>
                </div>

            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
@endif
<!--Event Top-selling END-->



<!--cities_events-->
@if(!empty($cities_events))
<section class="mix_bg">
    <div id="lgx-schedule" class="lgx-travelinfo">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="lgx-heading">
                            <h2 class="heading">@lang('eventmie-pro::em.cities_events')</h2>
                        </div>
                    </div>
                </div>
                <!--//main row-->
                <div class="row">
                    <div class="col-12">
                        <div class="sponsors-area sponsors-area-border sponsors-area-col3">
                            @foreach($cities_events as $key => $item)
                            <div class="single">
                                <a href="{{route('eventmie.events_index', ['search' => urlencode($item->city)])}}">
                                    <img src="/storage/{{ $item->poster }}" alt="{{ $item->city }}"/>
                                    <span class="single-name">{{ $item->city }}</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--//col-->
                </div>
            </div>
            <!--//container-->
        </div>
    </div>
</section>
@endif
<!--cities_events END-->


<!--Blogs-->
@if(!empty($posts))
<section>
    <div>
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h2 class="heading"><i class="fas fa-blog"></i> @lang('eventmie-pro::em.blogs')</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts as $item)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-news">
                            <figure>
                                <a href="{{route('eventmie.post_view', $item['slug'])}}">
                                    <img src="/storage/{{ $item['image'] }}" alt="">
                                </a>
                            </figure>

                            <div class="single-news-info">
                                <div class="meta-wrapper hidden">
                                    <span>{{\Carbon\Carbon::parse($item['updated_at'])->translatedFormat(format_carbon_date())}}</span>
                                </div>
                                <h3 class="title"><a href="{{route('eventmie.post_view', $item['slug'])}}">{{$item['title']}}</a></h3>
                                <div class="meta-wrapper">
                                    <span>{{ $item['excerpt'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="section-btn-area">
                    <a class="lgx-btn" href="{{route('eventmie.get_posts')}}"><i class="fas fa-blog"></i> @lang('eventmie-pro::em.view_all_blogs')</a>
                </div>
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
@endif
<!--Blogs END-->

<!--Organiser section-->
<section>
    <div id="lgx-schedule" class="lgx-travelinfo">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-travelinfo-single">
                            <h3 class="subheading">@lang('eventmie-pro::em.how_it_works')</h3>
                            <h2 class="heading"><i class="fas fa-person-booth"></i> @lang('eventmie-pro::em.for_event_organisers')</h2>
                        </div>
                    </div>
                    <!--//main COL-->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-travelinfo-content">
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-plus fa-4x"></i>
                                <h3 class="title">1. @lang('eventmie-pro::em.organiser_1')</h3>
                                <p class="info">@lang('eventmie-pro::em.organiser_1_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-check fa-4x"></i>
                                <h3 class="title">2. @lang('eventmie-pro::em.organiser_2')</h3>
                                <p class="info">@lang('eventmie-pro::em.organiser_2_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-money-check-alt fa-4x"></i>
                                <h3 class="title">3. @lang('eventmie-pro::em.organiser_3')</h3>
                                <p class="info">@lang('eventmie-pro::em.organiser_3_info')</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</section>
<!--TRAVEL INFO END-->

<!--TRAVEL INFO-->
<section>
    <div id="lgx-travelinfo" class="lgx-travelinfo">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h3 class="subheading">@lang('eventmie-pro::em.how_it_works')</h3>
                            <h2 class="heading">@lang('eventmie-pro::em.for_customers')</h2>
                        </div>
                    </div>
                    <!--//main COL-->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-travelinfo-content">
                             <div class="lgx-travelinfo-single">
                                <i class="fas fa-calendar-alt fa-4x"></i>
                                <h3 class="title">1. @lang('eventmie-pro::em.customer_1')</h3>
                                <p class="info">@lang('eventmie-pro::em.customer_1_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-ticket-alt fa-4x"></i>
                                <h3 class="title">2. @lang('eventmie-pro::em.customer_2')</h3>
                                <p class="info">@lang('eventmie-pro::em.customer_2_info')</p>
                            </div>
                            <div class="lgx-travelinfo-single">
                                <i class="fas fa-walking fa-4x"></i>
                                <h3 class="title">3. @lang('eventmie-pro::em.customer_3')</h3>
                                <p class="info">@lang('eventmie-pro::em.customer_3_info')</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</section>
<!--TRAVEL INFO END-->


@endsection

@section('javascript')

<script type="text/javascript">
    var google_map_key = {!! json_encode(setting('apps.google_map_key')) !!};
</script>
<script type="text/javascript" src="{{ eventmie_asset('js/welcome_v1.7.js') }}"></script>
@stop
