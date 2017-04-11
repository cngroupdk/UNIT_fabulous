@extends('wizard.layout')

@section('step')

    <form method="post" action="{{action('WizardController@storeGeneral')}}">
        {!! csrf_field() !!}


        <div class="row">

            <div class="col-md-6 col-md-push-3 wizard-wrapper">
                <h2 class="text-center">General information</h2>

                <div class="form-group{{$errors->has('name') ? ' has-error': ''}}">
                    <label for="wizard-name">Name</label>
                    <input id="wizard-name" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="tellMeBox name"
                           value="{{$generalData != null ? $generalData->name : ''}}">
                    @if($errors->has('name'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group{{$errors->has('description') ? ' has-error': ''}}">
                    <label for="wizard-description">Name</label>
                    <textarea id="wizard-description" name="description" class="form-control" rows="3">
                        {{$generalData != null ? $generalData->description : ''}}
                    </textarea>

                    @if($errors->has('description'))
                        <span class="help-block">{{$errors->first('description')}}</span>
                    @endif
                </div>

                <div class="checkbox">
                    <label>
                        <input name="private"
                               type="checkbox" {{$generalData != null && $generalData->private ? 'checked' : ''}}>
                        Make this box private!
                    </label>
                </div>

            </div>

            <div class="col-md-3 col-md-pull-6 col-xs-6 wizard-side">

            </div>
            <div class="col-md-3 col-xs-6 wizard-side">
                <div class="wizard-btn-wrapper">
                    <button type="submit" class="btn btn-primary btn-lg">next</button>
                </div>
            </div>
        </div>
    </form>

@stop