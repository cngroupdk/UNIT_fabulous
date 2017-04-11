@extends('public.presentation.layout')


@section('navbar')
    @include('public.presentation.navbar')
@endsection


@section('navbar-left')
    <li class="wow fadeInDown" data-wow-delay="0s">
        <a href="#features">{{trans('menu.features')}}</a>
    </li>
    <li class="wow fadeInDown" data-wow-delay=".2s">
        <a href="#testimonials">{{trans('menu.testimonials')}}</a>
    </li>

    <li class="wow fadeInDown" data-wow-delay=".2s">
        <a href="#contact">{{trans('menu.contact')}}</a>
    </li>
@stop

@section('banner')
    <div class="banner parallax-window" data-speed=".3" data-parallax="scroll"
         data-image-src="{{asset('img/presentation/bg1.jpg')}}">
        <div class="banner-cover"></div>
        <div class="banner-content">
            <div class="banner-text">
                <p class="banner-heading wow fadeInDown"
                   data-wow-delay="0s">{{trans('presentation.banner-heading')}}</p>

                <p class="banner-subheading wow fadeInUp"
                   data-wow-delay=".2s">{{trans('presentation.banner-subheading')}}</p>

                @include('public.presentation.errors')

                <div class="row">
                    <div class="col-md-6">
                        <form class="form-inline" action="{{action('HomeController@search')}}" method="POST">
                            {!! csrf_field() !!}
                            <div class="input-group">
                                <input type="text" class="form-control banner-form-control form-control-banner-more"
                                       name="code"
                                       placeholder="{{trans('presentation.banner-search-text')}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary btn-banner-more"
                                            type="submit">{{trans('presentation.banner-search-btn')}}</button>
                                  </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @if (Auth::check())
                            <a href="{{ action('WizardController@showGeneral') }}"
                               class="btn btn-banner-more btn-wizard"
                               tabindex="3">{{trans('presentation.banner-btn')}}</a>
                        @else
                            <a href="{{ action('Auth\RegisterController@showRegistrationForm') }}"
                               class="btn btn-banner-more btn-wizard"
                               tabindex="3">{{trans('presentation.banner-btn')}}</a>
                        @endif
                    </div>
                </div>

                {{--<a href="{{action('Builder\DemoController@create')}}"--}}
                {{--class="btn btn-banner-start wow fadeInLeft" data-wow-delay=".4s">{{trans('presentation.banner.start')}}</a>--}}
                {{--<a href="#features-grid" class="btn btn-banner-more">{{trans('presentation.banner.more')}}</a>--}}
            </div>
        </div>
    </div>
@endsection

@section('features')
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="feature-item">
                        <h2 class="wow fadeInLeft" data-wow-offset="150">{!!trans('presentation.features-grid-heading') !!}</h2>
                        <ul>{!! trans('presentation.features-grid-text2') !!}

                        </ul>

                        {{--<a href="{{action('Builder\DemoController@create')}}" class="btn btn-more btn-shadow wow fadeInUp" data-wow-offset="150"--}}
                        {{--data-wow-delay="1s">{{trans('presentation.features.grid.button')}}</a>--}}
                        <a href="#" class="btn btn-nobg wow fadeInUp" data-wow-offset="150"
                           data-wow-delay="1s">{{trans('presentation.features-grid-button-more')}}</a>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <img src="{{asset('img/presentation/grid-avatar.jpg')}}" class="img-responsive wow fadeInRight" data-wow-offset="150" data-wow-delay="1s"
                         alt="{{trans('presentation.features.grid.alt')}}">
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="homepage-section-b">

        <div class="container ">
            <h2>What do our users say</h2>

            <div class="row homepage-users-recommendations">

                <div class="col-md-6 homepage-user-feedback homepage-user-feedback-1">
                    <div class="col-md-3 col-xs-4">
                        <img src="{{ asset('img/homepage-feedback-face/home-feedback-face-1.jpg') }}"
                             alt="Our client's photo-sport center owner"
                             class="img-circle img-responsive">
                    </div>
                    <div class="col-md-9 col-xs-8">
                        <h3>Name XY, Athlete</h3>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 homepage-user-feedback homepage-user-feedback-1">
                    <div class="col-md-3 col-xs-4">
                        <img src="{{ asset('img/homepage-feedback-face/home-feedback-face-2.jpg') }}"
                             alt="Our client's photo-sport center owner"
                             class="img-circle img-responsive">
                    </div>
                    <div class="col-md-9 col-xs-8">
                        <h3>Name XY, Sport Center Owner</h3>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12 homepage-user-feedback homepage-user-feedback-2">
                    <div class="col-md-9 col-md-push-0 col-xs-8 col-xs-push-4">
                        <h3>Name XY, Instructor</h3>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="col-md-3 col-md-pull-0 col-xs-4 col-xs-pull-8">
                        <img src="{{ asset('img/homepage-feedback-face/home-feedback-face-3.jpg') }}"
                             alt="Our client's photo-team organiser"
                             class="img-circle img-responsive">
                    </div>
                </div>

                <div class="col-md-6 col-xs-12 homepage-user-feedback homepage-user-feedback-2">
                    <div class="col-md-9 col-md-push-0 col-xs-8 col-xs-push-4">
                        <h3>Name XY, Organiser</h3>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="col-md-3 col-md-pull-0 col-xs-4 col-xs-pull-8">
                        <img src="{{ asset('img/homepage-feedback-face/home-feedback-face-4.jpg') }}"
                             alt="Our client's photo-team organiser"
                             class="img-circle img-responsive">
                    </div>
                </div>


            </div>
        </div>


    </section>

@endsection