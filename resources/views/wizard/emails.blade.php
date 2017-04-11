@extends('wizard.layout')

@section('step')

    <div class="row">

        <div class="col-md-6 col-md-push-3 wizard-wrapper">
            <h2 class="text-center">Invitations</h2>

            <div class="form-group{{$errors->has('categories') ? ' has-error': ''}}">
                <label for="wizard-name">Emails</label>
                <select name="emails" multiple="multiple" style="width:100%">
                    @if($categoriesData != null)
                        @foreach($categoriesData->categories as $category)
                            <option selected>{{$category}}</option>
                        @endforeach
                    @endif
                </select>

                @if($errors->has('emails'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>



            <div class="form-group">
                <label for="wizzard-message">Message</label>
                <textarea id="wizzard-message" name="message" class="form-control" rows="3">
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