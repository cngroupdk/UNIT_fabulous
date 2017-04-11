@extends('wizard.layout')

@section('step')

    <form method="post" action="{{action('WizardController@storeCategories')}}">
        {!! csrf_field() !!}

        <div class="row">

            <div class="col-md-6 col-md-push-3 wizard-wrapper">
                <h2 class="text-center">Categories</h2>
                <div class="form-group{{$errors->has('categories') ? ' has-error': ''}}">
                    <label for="wizard-name">Name</label>
                    <select name="categories" multiple="multiple" style="width:100%">
                        @if($categoriesData != null)
                            @foreach($categoriesData->categories as $category)
                                <option selected>{{$category}}</option>
                            @endforeach
                        @endif

                    </select>
                    @if($errors->has('categories'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
                </div>

            </div>

            <div class="col-md-3 col-md-pull-6 col-xs-6 wizard-side">
                <div class="wizard-btn-wrapper">
                    <button class="btn btn-primary btn-lg">back</button>
                </div>
            </div>
            <div class="col-md-3 col-xs-6 wizard-side">
                <div class="wizard-btn-wrapper">
                    <button class="btn btn-primary btn-lg">next</button>
                </div>
            </div>
        </div>
    </form>


@stop