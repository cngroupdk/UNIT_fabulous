<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="author" content="E-zone Technologies, s.r.o.">

    <title>{{trans('presentation.title')}}</title>

    <link href="{{asset('css/presentation.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@if($errors->has('newsletter-email'))
    @foreach($errors->get('newsletter-email') as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{$error}}
        </div>
    @endforeach
@elseif(Session::has('newsletter-email'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {!! Session::get('newsletter-email') !!}
    </div>
    <?php Session::forget('newsletter-email'); ?>
@endif

<section id="preloader">
    <div class="site-spinner"></div>
</section>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                tellMe Box!
            </a>
        </div>

        <?php $controllerMethod = str_replace('App\\Http\\Controllers\\', '', substr(Route::currentRouteAction(), (strpos(Route::currentRouteAction(), '@') + 1))); ?>
                <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @yield('navbar-left')
                <li class="wow fadeInDown" data-wow-delay="0s">
                    <a href="#">{{trans('menu.features')}}</a>
                </li>
                <li class="wow fadeInDown" data-wow-delay=".2s">
                    <a href="#">{{trans('menu.pricing')}}</a>
                </li>
                <li class="wow fadeInDown" data-wow-delay=".2s">
                    <a href="#">{{trans('menu.testimonials')}}</a>
                </li>

                <li class="wow fadeInDown" data-wow-delay=".2s">
                    <a href="#">{{trans('menu.contact')}}</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--<li class="wow fadeInDown {{$controllerMethod=='index' ? 'active':''}}" data-wow-delay="0s"><a--}}
                            {{--href="{{action('Presentation\PresentationController@index',$domain)}}">{{trans('presentation.menu.homepage')}}</a>--}}
                {{--</li>--}}
                {{--<li class="wow fadeInDown {{$controllerMethod=='templates' ? 'active':''}}" data-wow-delay=".2s"><a--}}
                            {{--href="{{action('Presentation\PresentationController@templates',$domain)}}">{{trans('presentation.menu.templates')}}</a>--}}
                {{--</li>--}}
                {{--<li class="wow fadeInDown {{$controllerMethod=='prices' ? 'active':''}}" data-wow-delay=".4s"><a--}}
                            {{--href="{{action('Presentation\PresentationController@prices',$domain)}}">{{trans('presentation.menu.prices')}}</a>--}}
                {{--</li>--}}
                {{--<li class="wow fadeInDown {{$controllerMethod=='contact' ? 'active':''}}" data-wow-delay=".6s"><a--}}
                            {{--href="{{action('Presentation\PresentationController@contact',$domain)}}">{{trans('presentation.menu.contact')}}</a>--}}
                {{--</li>--}}

                @if(Auth::check())
                    <li class="wow fadeInDown" data-wow-delay=".8s">
                        <a href="#">{{trans('presentation.menu.admin')}}</a>
                    </li>

                @else
                    <li class="wow fadeInDown" data-wow-delay=".8s">
                        <a href="#">{{trans('menu.login')}}</a>
                    </li>
                @endif

                <li class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

{{--@include('vendor.flash.presentation-messages')--}}

@yield('banner')

<div class="content">


    @yield('content')

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

</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    {{--<li class="{{$controllerMethod=='blog' ? 'active':''}}"><a--}}
                                {{--href="{{action('Presentation\BlogController@index',$domain)}}">{{trans('presentation.menu.blog')}}</a>--}}
                    {{--</li>--}}
                    {{--<li class="{{$controllerMethod=='support' ? 'active':''}}"><a--}}
                                {{--href="{{action('Presentation\PresentationController@tutorials',$domain)}}">{{trans('presentation.menu.support')}}</a>--}}
                    {{--</li>--}}
                    {{--<li class="{{$controllerMethod=='support' ? 'active':''}}"><a--}}
                                {{--href="{{action('Presentation\PresentationController@termsconditions',$domain)}}">{{trans('presentation.menu.tac')}}</a>--}}
                    {{--</li>--}}
                </ul>
                <p>{!! trans('presentation.partials.footer.company') !!}</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('js/presentation.js')}}"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script>
    $('.template-block').mouseenter(function () {
        $('.template-block').removeClass('active');
        $(this).addClass('active');
    });

    $('.template-block').mouseleave(function () {
        $('.template-block').removeClass('active');
    });

    $(document).on('click', '.link-modal', function (e) {
        e.preventDefault();
        e.stopPropagation();

        console.log('klik na link-modal');

        $link = $(e.target).closest('a');

        $.ajax({
            url: $link.attr('href')
        }).done(function (data) {
            var $modal = $(data);

            $('body').append($modal);
            $modal.modal();

            $modal.on('hidden.bs.modal', function (e) {
                $modal.remove();
                $('.modal-backdrop').remove();
            })
        }).error(function () {

        });
    })


</script>

<script>

    var $grid = $('.grid').masonry({
        // set itemSelector so .grid-sizer is not used in layout
        itemSelector: '.grid-item',
        // use element for option
        columnWidth: '.grid-sizer',
        percentPosition: true
    })


    // layout Masonry after each image loads
    $grid.imagesLoaded().progress(function () {
        $grid.masonry('layout');
    });
</script>

<script src="{{asset('js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
