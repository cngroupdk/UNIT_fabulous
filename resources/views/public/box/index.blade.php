@extends('public.presentation.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
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

@endsection