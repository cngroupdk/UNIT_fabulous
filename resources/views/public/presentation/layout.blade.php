<!DOCTYPE html>
<html lang="en">
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
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/select-categories.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
