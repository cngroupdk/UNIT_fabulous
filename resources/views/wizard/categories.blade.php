@extends('wizard.layout')

@section('step')

    <div class="row">

        <div class="col-md-6 col-md-push-3 wizard-wrapper">
            <h2 class="text-center">Categories</h2>

            <select multiple="multiple" style="width:100%"
                    placeholder="{{trans('auctions.filter.placeholder')}}">
                    <option>jedna</option>
                    <option>dve</option>
            </select>
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


@stop