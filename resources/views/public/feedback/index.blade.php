@extends('public.presentation.layout')

@section('content')
    <form action="{{action('FeedbackController@store',$box->code)}}" method="POST">
        {!! csrf_field() !!}
        <div class="main-container container">
            @include('public.presentation.errors')

            <div class="row">

                <div class="col-md-6 col-md-push-3 box-wrapper">
                    <h1 class="text-center">{{$box->name}}</h1>

                    <input type="hidden" name="box_code" value="{{$box->code}}">

                    <p class="text-center">{{$box->description}}</p>

                    @if(count($box->categories) > 0)
                        <ul class="category-list">
                            @foreach($box->categories as $category)
                                <li>
                                    <input type="hidden" name="category_{{$category->id}}" value="0">
                                    <label>{{$category->name}}</label>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-3x fa-frown-o rating"></i>
                                        <i class="fa fa-fw fa-3x fa-meh-o rating active"></i>
                                        <i class="fa fa-fw fa-3x fa-smile-o rating"></i>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif


                    <div class="form-group">
                        <label for="comment">{{trans('feedback.form.comment')}}</label>
                        <textarea name="comment" id="comment" class="form-control" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="email">{{trans('feedback.form.email')}}</label>
                        <input name="email" id="email" class="form-control">
                    </div>


                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success">{{trans('feedback.form.submit')}}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

@endsection