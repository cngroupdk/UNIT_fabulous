@extends('wizard.layout')

@section('step')

    <div class="row">

        <div class="col-md-3 col-xs-6 wizard-side">
            <div class="wizard-btn-wrapper">
                <a href="{{ action('WizardController@showGeneral') }}" class="btn btn-primary btn-lg">{{trans('pagination.previous')}}</a>
            </div>
        </div>

        <form method="post" action="{{action('WizardController@storeCategories')}}">
            {!! csrf_field() !!}
            <div class="col-md-6 wizard-wrapper">
                <h2 class="text-center">Categories</h2>
                <div class="form-group{{$errors->has('categories') ? ' has-error': ''}}">
                    <label for="wizard-name">Name</label>
                    <select name="categories[]" multiple="multiple" style="width:100%">
                        @if($categoriesData != null && count($categoriesData['categories']) > 0)
                            @foreach($categoriesData['categories'] as $category)
                                <option selected>{{$category}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('categories'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
                </div>

            </div>

            <div class="col-md-3 col-xs-6 wizard-side">
                <div class="wizard-btn-wrapper">
                    <button class="btn btn-primary btn-lg">{{trans('pagination.next')}}</button>
                </div>
            </div>
        </form>
    </div>


@stop