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
                                <th>{{trans('views.box.index.name')}}</th>
                                <th>{{trans('views.box.index.answers')}}</th>
                                <th>{{trans('views.box.index.private')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($boxes as $box)
                                <tr>
                                    <td>{{$box->name}}</td>
                                    <td>{{count($box->feedbacks)}}</td>
                                    @if ($box->private)
                                        <td><i class="fa fa-check"></i></td>
                                    @else
                                        <td><i class="fa fa-times"></i></td>
                                    @endif
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