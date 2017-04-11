@extends('public.presentation.layout')

@section('content')
    <div class="container">
        <div class="col-lg-60">
            <h1 class="text-center">Create TellMeBox</h1>
                <ul class="wizard-steps">
                    <li>
                        start
                    </li>
                    <li class="active">
                        <a href="http://webby.dev/builder/sites/wizard/domains">
                            tellme box
                        </a>
                    </li>
                    <li>
                        <a href="http://webby.dev/builder/sites/wizard/designs">
                            Výběr
                            create categories
                        </a>
                    </li>
                    <li>
                        <a href="http://webby.dev/builder/sites/wizard/designs">
                            Výběr
                            send invitations
                        </a>
                    </li>
                    <li>
                        <a href="http://webby.dev/builder/sites/wizard/designs">
                            Výběr
                            preview
                        </a>
                    </li>
                    <li>
                        create
                    </li>
                </ul>
        </div>

        @yield('step')


    </div>


@stop


