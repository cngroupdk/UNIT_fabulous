@extends('public.presentation.layout')

@section('content')

    <section id="feedback">
        <div class="container">
            @include('public.presentation.errors')

            <form action="{{action('FeedbackController@store',$box->code)}}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="box_code" value="{{$box->code}}">
                <div class="row">

                    <h1>{{$box->name}}</h1>
                    <h4>{{$box->description}}</h4>

                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="email">{{trans('feedback.form.email')}}</label>
                        <input name="email" id="email" class="form-control">
                    </div>
                </div>

                @foreach($box->categories as $category)
                    <div class="row">
                        <div class="col-md-6">{{$category->name}}</div>
                        <div class="col-md-6">
                            <input type="text" name="category_{{$category->id}}">
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <div class="form-group">
                        <label for="comment">{{trans('feedback.form.comment')}}</label>
                        <textarea name="comment" id="comment" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-success">{{trans('feedback.form.submit')}}</button>
                </div>
            </form>
        </div>
    </section>

@endsection