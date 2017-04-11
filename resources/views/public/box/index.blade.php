@extends('public.presentation.layout')

@section('navbar')
    @include('public.presentation.static-navbar')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">{{trans('presentation.menu.admin')}}</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Answers</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($boxes as $box)
                                <tr>
                                    <td>{{$box->name}}</td>
                                    <td>{{count($box->feedbacks)}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{action('BoxController@showFeedback', $box->id)}}"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection