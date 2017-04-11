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
        .content{
            margin-top: 80px;
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

            </ul>
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())
                    <li class="wow fadeInDown" data-wow-delay=".8s">
                        <a href="{{action('BoxController@index')}}">{{trans('presentation.menu.admin')}}</a>
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
                <p>{!! trans('presentation.partials-footer-company') !!}</p>
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


{{--$.ajax({--}}
{{--url: $link.attr('href')--}}
{{--}).done(function (data) {--}}
{{--var $modal = $(data);--}}

{{--$('body').append($modal);--}}
{{--$modal.modal();--}}

{{--$modal.on('hidden.bs.modal', function (e) {--}}
{{--$modal.remove();--}}
{{--$('.modal-backdrop').remove();--}}
{{--})--}}
{{--}).error(function () {--}}

{{--});--}}
{{--})--}}


{{--</script>--}}
{{--<script>--}}

{{--var $grid = $('.grid').masonry({--}}
{{--// set itemSelector so .grid-sizer is not used in layout--}}
{{--itemSelector: '.grid-item',--}}
{{--// use element for option--}}
{{--columnWidth: '.grid-sizer',--}}
{{--percentPosition: true--}}
{{--})--}}


	var docHeight = $(window).height();
	var footerHeight = $('footer').outerHeight();
	var footerTop = $('footer').position().top + footerHeight;


	if (footerTop < docHeight) {
		$('footer').css('margin-top', (docHeight - footerTop) + 'px');
	}

{{--// layout Masonry after each image loads--}}
{{--$grid.imagesLoaded().progress(function () {--}}
{{--$grid.masonry('layout');--}}
{{--});--}}
</script>

<script src="{{asset('js/select-categories.js')}}"></script>
<script>
    $('select').select2({
        tags: true
    });
</script>


<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
<script>
	$('select').select2({
		tags: true
	});
</script>
<script src="{{asset('js/wow.js')}}"></script>
<script>
	new WOW().init();
</script>

<script>
    $('.rating').click(function(){
        $(this).siblings('.rating').removeClass('active');
        $(this).addClass('active');

        var value = $(this).prevAll('.rating').length - 1;
        $(this).closest('li').find('inpu').val(value);

        console.log(value);

    })
</script>
</body>
</html>
