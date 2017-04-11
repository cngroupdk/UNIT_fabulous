<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="author" content="">

    <title>{{trans('presentation.title')}}</title>

    <link href="{{asset('css/presentation.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{asset('css/flag-icon.min.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .content {
            padding-top: 80px;
            background: #f5f5f5;
            padding-bottom: 80px;
        }

        ul.wizard-steps {
            position: relative;
            list-style: none;
            padding: 0;
            margin-bottom: 50px;
            margin-top: 15px;
            text-align: center;
        }

        ul.wizard-steps li {
            display: inline-block;
            margin: 30px 15px 0 15px;
        }

        ul.wizard-steps li.active a .wizard-no {
            background: #666;
            color: #fff;
        }

        ul.wizard-steps li a .wizard-no {
            background: rgba(0, 0, 0, 0.05);
            color: #222;
            padding: 17px 19px;
            border-radius: 60px;
            margin-right: 10px;
            font-weight: 800;
            -webkit-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
        }

        .wizard-wrapper {
            min-height: 400px;
            height: auto;

            padding: 50px;
            background: #fff;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 25px 50px 0 rgba(0, 0, 0, 0.1);
        }

        .wizard-side {
            text-align: center;
            height: 400px;
            display: table;
        }

        .wizard-btn-wrapper {
            display: table-cell;
            vertical-align: middle;
        }

        .tags {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .tags li {
            position: relative;
            font-size: 24px;
            border-bottom: 1px solid #ededed;
        }

        .tags li label {
            white-space: pre-line;
            word-break: break-all;
            padding: 15px 60px 15px 15px;
            display: block;
            line-height: 1.2;
            font-weight: 200;
            transition: color 0.4s;
        }

        .tags li .select2-selection__choice__remove {
            display: none;
            position: absolute;
            top: 0;
            right: 10px;
            bottom: 0;
            width: 40px;
            height: 40px;
            margin: auto 0;
            font-size: 30px;
            color: #cc9a9a;
            margin-bottom: 11px;
            transition: color 0.2s ease-out;
        }

        .tags li .select2-selection__choice__remove:after {
            content: '×';
        }

        .tags li:hover .select2-selection__choice__remove {
            display: block;
        }

        .tag {
            padding: 2px 3px;
        }
    </style>
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
                    <a href="#features-grid">{{trans('menu.features')}}</a>
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

                @if(Auth::check())
                    <li class="wow fadeInDown" data-wow-delay=".8s">
                        <a href="#">{{trans('presentation.menu.admin')}}</a>
                    </li>
                    <li class="wow fadeInDown" data-wow-delay=".8s">
                        <a href="{{action('Auth\LoginController@logout')}}">{{trans('presentation.menu.logout')}}</a>
                    </li>

                @else
                    <li class="wow fadeInDown" data-wow-delay=".8s">
                        <a href="{{ action('Auth\LoginController@showLoginForm') }}">{{trans('presentation.menu.login')}}</a>
                    </li>
                    <li class="wow fadeInDown" data-wow-delay=".8s">
                        <a href="{{ action('Auth\RegisterController@showRegistrationForm') }}">{{trans('presentation.menu.register')}}</a>
                    </li>
                @endif


                <li class="dropdown wow fadeInDown" data-wow-delay=".8s">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-{{Session::get('lang') =='en' ? 'gb':Session::get('lang')}}"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{action('HomeController@changeLang','sk')}}"><span class="flag-icon flag-icon-sk"></span></a></li>
                        <li><a href="{{action('HomeController@changeLang','cz')}}"><span class="flag-icon flag-icon-cz"></span></a></li>
                        <li><a href="{{action('HomeController@changeLang','en')}}"><span class="flag-icon flag-icon-gb"></span></a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


@yield('banner')

<div class="content">

    @include('public.flashes.show')

    @yield('content')

</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>{!! trans('presentation.partials.footer.company') !!}</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/select-categories.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script>
	(function ($) {
		$(window).scroll(function () {

			if ($(window).scrollTop() > 50) {
				$('.navbar').addClass('nav-bg');
			}
			else {
				$('.navbar').removeClass('nav-bg');
			}
		});

		$(".navbar-toggle").on("click", function () {
			$(this).toggleClass("active");
		});

		$(".feature-item").on("click", function () {
			$(".feature-item").removeClass('active')
			$(this).addClass("active");

			var animation = $(this).data('animation');

			$(".animation-item").removeClass('active');
			$('.animation-item[data-animation="' + animation + '"]').addClass('active');
		});
	})(jQuery);

	$('select').select2({
		tags: true
	});

	new WOW().init();
</script>
</body>
</html>
