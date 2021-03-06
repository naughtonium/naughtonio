@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if(session()->has('success'))
            <div class="alert alert-success col-sm-offset-2 col-sm-8" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        {{--<h4 class="text-center">--}}
            {{--This service requires a phone number--}}
        {{--</h4>--}}

        <form
                method="POST"
                action="/account"
                class="form-horizontal col-sm-offset-2 col-sm-8"
        >
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                {!! Form::label('username', null, ['class' => 'col-sm-2 control-label'], false) !!}
                <div class="col-sm-9">
                    {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', null, ['class' => 'col-sm-2 control-label'], false) !!}
                <div class="col-sm-9">
                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                {!! Form::label('current password', null, ['class' => 'col-sm-2 control-label'], false) !!}
                <div class="col-sm-9">
                    {!! Form::password('current_password', ['class' => 'form-control']) !!}
                    @if ($errors->has('current_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current_password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('new password', null, ['class' => 'col-sm-2 control-label'], false) !!}
                <div class="col-sm-9">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {!! Form::label('confirm new password', null, ['class' => 'col-sm-2 control-label'], false) !!}
                <div class="col-sm-9">
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                <div class="col-sm-offset-2 col-sm-3">
                    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
                </div>
            </div>
        </form>
    </div>
@endsection
