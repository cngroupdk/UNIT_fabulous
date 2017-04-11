@extends('wizard.layout')

@section('step')

    <div class="row">

        <div class="col-md-6 col-md-push-3 wizard-wrapper">
            <h2 class="text-center">General information</h2>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
            <textarea class="form-control" rows="3">

            </textarea>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked> Private
                    </label>
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