@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Your Password
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">{{ Session::get('success_message') }}</div>
                        @endif
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
                        @endif
                        {!! Form::open(['url' => 'change_password', 'method' => 'POST','class' => 'form-horizontal', 'files' => true]) !!}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="txt">Old Password<span class='glyphicon-asterisk'></span></label>
                            <div class="col-sm-9">
                                <input required class="form-control" type="password" name="old_password" id="old_password" value="">
                                @if ($errors->has('old_password')) <p style="color:red" class="help-block">{{ $errors->first('old_password') }}</p> @endif
                                @if (Session::has('omessage'))
                                    <div class="alert alert-danger">{{ Session::get('omessage') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="txt">New Password<span class='glyphicon-asterisk'></span></label>
                            <div class="col-sm-9 @if($errors->has('password')) has-error @endif">
                                <input required class="form-control" type="password" name="password" id="password">
                                @if ($errors->has('password')) <p style="color:red" class="help-block">{{ $errors->first('password') }}</p> @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="txt">Confirm new Password<span class='glyphicon-asterisk'></span></label>
                            <div class="col-sm-9">
                                <input required class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                                @if ($errors->has('password_confirmation')) <p style="color:red" class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                                @if (Session::has('cmessage'))
                                    <div class="alert alert-danger">{{ Session::get('cmessage') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" class="btn btn-primary"  value="Change">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
