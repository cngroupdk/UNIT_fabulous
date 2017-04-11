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
            background: #5e5e5e;
            padding-bottom: 20px;
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

        .wizard-wrapper, .box-wrapper {
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

        .rating{
            opacity: .4;
        }

        .rating.active{
            opacity: 1;
        }


        .category-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .category-list li {
            position: relative;
            border-bottom: 1px solid #ededed;
        }

        .category-list li:last-of-type{
            border-bottom:none;
        }
        .category-list li label {
            font-size:24px;
            white-space: pre-line;
            word-break: break-all;
            padding: 15px 60px 15px 15px;
            display: inline-block;
            line-height: 1.2;
            font-weight: 200;
            transition: color 0.4s;
        }

        .box-wrapper .form-group{
            border-top: 1px solid #ededed;
            padding: 10px 0;
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

@yield('navbar')

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
