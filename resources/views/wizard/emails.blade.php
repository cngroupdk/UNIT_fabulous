@extends('wizard.layout')

@section('step')

    <div class="row">

        <div class="col-md-3 col-xs-6 wizard-side">
            <div class="wizard-btn-wrapper">
                <a href="{{action('WizardController@showCategories')}}" class="btn btn-primary btn-lg">{{trans('pagination.previous')}}</a>
            </div>
        </div>

        <form method="post" action="{{action('WizardController@storeEmails')}}">
            {!! csrf_field() !!}

            <div class="col-md-6 wizard-wrapper">
                <h2 class="text-center">Invitations</h2>

                <div class="form-group{{$errors->has('emails[]') ? ' has-error': ''}}">
                    <label for="wizard-name">Emails</label>
                    <select name="emails[]" multiple="multiple" style="width:100%">
                        @if($emailsData != null)
                            @foreach($emailsData->categories as $email)
                                <option selected>{{$email}}</option>
                            @endforeach
                        @endif
                    </select>

                    @if($errors->has('emails[]'))
                        <span class="help-block">{{$errors->first('emails[]')}}</span>
                    @endif
                </div>


                <div class="form-group">
                    <label for="wizzard-message">Message</label>
                    <textarea id="wizzard-message" name="text" class="form-control"
                              rows="3">{{$emailsData != null ? $emailsData['text'] : ''}}</textarea>
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