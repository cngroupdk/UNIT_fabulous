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
                <li class="wow fadeInDown" data-wow-delay=".2s">
                    <a href="#testimonials">{{trans('menu.testimonials')}}</a>
                </li>
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