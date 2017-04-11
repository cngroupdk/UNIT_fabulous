@extends('public.presentation.layout')

@section('banner')
    <div class="banner parallax-window" data-speed=".3" data-parallax="scroll"
         data-image-src="{{asset('img/presentation/bg1.jpg')}}">
        <div class="banner-cover"></div>
        <div class="banner-content">
            <div class="banner-text">
                <p class="banner-heading wow fadeInDown" data-wow-delay="0s">{{trans('presentation.banner.heading')}}</p>

                <p class="banner-subheading wow fadeInUp" data-wow-delay=".2s">{{trans('presentation.banner.subheading')}}</p>

                <a href="#" class="btn btn-banner-more">{{trans('presentation.banner-btn')}}</a>
                {{--<a href="{{action('Builder\DemoController@create')}}"--}}
                   {{--class="btn btn-banner-start wow fadeInLeft" data-wow-delay=".4s">{{trans('presentation.banner.start')}}</a>--}}
                {{--<a href="#features-grid" class="btn btn-banner-more">{{trans('presentation.banner.more')}}</a>--}}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section id="features-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="feature-item">
                        <h2 class="wow fadeInLeft" data-wow-offset="150">{!!trans('presentation.features.grid.heading') !!}</h2>
                        <ul>{!! trans('presentation.features.grid.text2') !!}

                        </ul>

                        {{--<a href="{{action('Builder\DemoController@create')}}" class="btn btn-more btn-shadow wow fadeInUp" data-wow-offset="150"--}}
                           {{--data-wow-delay="1s">{{trans('presentation.features.grid.button')}}</a>--}}
                        <a href="#" class="btn btn-nobg wow fadeInUp" data-wow-offset="150"
                           data-wow-delay="1s">{{trans('presentation.features.grid.button-more')}}</a>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <img src="{{asset('img/presentation/grid-avatar.jpg')}}" class="img-responsive wow fadeInRight" data-wow-offset="150" data-wow-delay="1s"
                         alt="{{trans('presentation.features.grid.alt')}}">
                </div>
            </div>
        </div>
    </section>

    <section id="features-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-push-6 col-xs-12">
                    <div class="feature-item">
                        <h2 class="wow fadeInRight" data-wow-offset="150">{!!trans('presentation.features.menu.heading')!!}</h2>



                        {{--<a href="{{action('Builder\DemoController@create')}}" class="btn btn-more btn-shadow wow fadeInUp" data-wow-offset="150"--}}
                           {{--data-wow-delay=".4s">{{trans('presentation.features.menu.button')}}</a>--}}
                        <a href="#" class="btn btn-nobg wow fadeInUp" data-wow-offset="150"
                           data-wow-delay=".4s">{{trans('presentation.features.menu.button-more')}}</a>
                    </div>
                </div>

                <div class="col-lg-6 col-lg-pull-6 col-xs-12">
                    <img src="{{asset('img/presentation/menu-avatar.jpg')}}" class="img-responsive wow fadeInLeft" data-wow-offset="150" data-wow-delay=".4s"
                         alt="{{trans('presentation.features.menu.alt')}}">
                </div>
            </div>
        </div>
    </section>

    <section id="features-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 feature-items">
                    <div class="feature-item feature-grid active wow fadeInUp" data-wow-offset="150" data-wow-delay=".4s" data-animation="stats">
                        <h2>{{trans('presentation.features.stats.heading')}}</h2>

                        <p>{!! trans('presentation.features.stats.text1') !!}</p>
                        {!! trans('presentation.features.stats.text2') !!}
                    </div>

                    <div class="feature-item feature-menu wow fadeInUp" data-wow-offset="150" data-wow-delay=".4s" data-animation="media">
                        <h2>{{trans('presentation.features.media.heading')}}</h2>

                        <p>{!! trans('presentation.features.media.text1') !!}</p>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="feature-animation wow fadeInRight" data-wow-offset="150" data-wow-delay=".8s">
                        <div class="animation-item feature-grid-animation active" data-animation="stats">
                            <img src="{{asset('img/presentation/stats-avatar.jpg')}}" class="img-responsive"
                                 alt="{{trans('presentation.features.stats.alt')}}">
                        </div>

                        <div class="animation-item feature-menu-animation" data-animation="media">
                            <img src="{{asset('img/presentation/media-avatar.jpg')}}" class="img-responsive"
                                 alt="{{trans('presentation.features.media.alt')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<section id="templates">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h1 class="wow fadeInDown" data-wow-offset="150" data-wow-delay="0s">{!! trans('presentation.templates.heading') !!}</h1>--}}

                    {{--<p class="content-subheading wow fadeInUp" data-wow-offset="150" data-wow-delay=".2s">{!!trans('presentation.templates.subheading')!!}</p>--}}

                    {{--<div class="templates-wrap">--}}
                        {{--@for($i = 0; ($i + 1) < count($templates); $i = $i + 2)--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-5 col-md-offset-1">--}}
                                    {{--<div class="template-block wow fadeInUp" data-wow-delay=".2s">--}}
                                        {{--<a href="{{action('Presentation\PresentationController@template',[$domain,$templates[$i]->code,$templates[$i]->colors->first()->name])}}"--}}
                                           {{--class="link-modal">--}}
                                            {{--<div class="template-backdrop"></div>--}}
                                            {{--<img src="{{asset('img/presentation/templates/' . $templates[$i]->code . '.png')}}" alt="">--}}

                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-5">--}}
                                    {{--<div class="template-block wow fadeInUp" data-wow-delay=".2s">--}}
                                        {{--<a href="{{action('Presentation\PresentationController@template',[$domain,$templates[$i + 1]->code,$templates[$i + 1]->colors->first()->name])}}"--}}
                                           {{--class="link-modal">--}}
                                            {{--<div class="template-backdrop"></div>--}}
                                            {{--<img src="{{asset('img/presentation/templates/' . $templates[$i + 1]->code . '.png')}}" alt="">--}}

                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endfor--}}
                    {{--</div>--}}
                    {{--<a href="{{action('Presentation\PresentationController@templates', $domain)}}"--}}
                       {{--class="btn btn-all-templates">{{trans('presentation.templates.button-all')}}</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    <section id="pricelist">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h1>{!! trans('presentation.prices.heading') !!}</h1>

                    <p class="content-subheading"></p>

                    <div class="package-list">
                        {{--@foreach(\App\Models\System\Plan::orderBy('data_from', 'asc')->get() as $plan)--}}
                            {{--<div class="package-price">--}}
                                {{--<h2>{{$plan->name}}</h2>--}}

                                {{--<p class="price">{{$plan->prices()->orderBy('period','asc')->first()->price}}<span class="currency">Kč</span></p>--}}

                                {{--<p class="package-desc">{{$plan->description}}</p>--}}
                                {{--<a href="#" class="btn btn-pricelist">{{trans('presentation.prices.order')}}</a>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                        {{--<div class="package-price">--}}
                        {{--<h2>{{trans('presentation.prices.packages.free.heading')}}</h2>--}}

                        {{--<p class="price">{!! trans('presentation.prices.packages.free.price') !!}</p>--}}

                        {{--<p class="package-desc">{{trans('presentation.prices.packages.free.description')}}</p>--}}
                        {{--<a href="#" class="btn btn-pricelist">{{trans('presentation.prices.order')}}</a>--}}
                        {{--</div>--}}

                        {{--<div class="package-price">--}}
                        {{--<h2>{{trans('presentation.prices.packages.personal.heading')}}</h2>--}}

                        {{--<p class="price">{!! trans('presentation.prices.packages.personal.price') !!}</p>--}}

                        {{--<p class="package-desc">{{trans('presentation.prices.packages.personal.description')}}</p>--}}
                        {{--<a href="#" class="btn btn-pricelist">{{trans('presentation.prices.order')}}</a>--}}
                        {{--</div>--}}

                        {{--<div class="package-price">--}}
                        {{--<h2>{{trans('presentation.prices.packages.pro.heading')}}</h2>--}}

                        {{--<p class="price">{!! trans('presentation.prices.packages.pro.price') !!}</p>--}}

                        {{--<p class="package-desc">{{trans('presentation.prices.packages.pro.description')}}</p>--}}
                        {{--<a href="#" class="btn btn-pricelist">{{trans('presentation.prices.order')}}</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {{--<a href="{{action('Builder\DemoController@create')}}" class="btn btn-prices-start">Začněte--}}
                        {{--ihned!</a>--}}
                </div>
            </div>
        </div>
    </section>
    <section id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>{!! trans('presentation.newsletter.heading') !!}</h1>

                    <p class="content-subheading">{!! trans('presentation.newsletter.subheading') !!}</p>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="post" action="/newsletter">
                                {!! csrf_field() !!}

                                <div class="input-group">
                                    <input type="email" class="form-control" name="newsletter-email"
                                           placeholder="{{ trans('presentation.newsletter.placeholder') }}" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-shadow"
                                                type="submit">{{ trans('presentation.newsletter.button') }}</button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection