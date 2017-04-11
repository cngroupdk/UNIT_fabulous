@extends('public.presentation.layout')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {{trans('feedback.title')}}
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{trans('feedback.favorite')}}</th>
                                <th>{{trans('feedback.email')}}</th>
                                <th>{{trans('feedback.text')}}</th>

                                @foreach($box->categories as $category)
                                    <th>{{$category->name}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td>jozko@mrkvicka.com</td>
                                <td>...</td>
                                <td>:D</td>
                                <td>:)</td>
                                <td>:/</td>
                                <td>:(</td>
                            </tr>
                            @foreach($feedbacks as $feedback)
                                <tr>
                                    <td><i class="fa fa-{{$feedback->favorite ? 'check-circle':'times-circle'}}"></i></td>
                                    <td>{{$feedback->user->email}}</td>
                                    <td>{{$feedback->comment}}</td>
                                    @foreach($box->categories as $category)
                                        <td>{{$feedback->ratings()->where('category_id',$category->id)->first()->rating}}</td>
                                    @endforeach
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