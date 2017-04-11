@extends('wizard.layout')

@section('step')

    <div class="row">

        <div class="col-md-6 col-md-push-3 wizard-wrapper">
            <h2 class="text-center">General information</h2>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Emails</label>
                    <input type="text" class="form-control tt-input" id="">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Message</label>
                    <textarea class="form-control" rows="3">

                    </textarea>
                </div>

            </form>
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