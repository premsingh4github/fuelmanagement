@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/users/'.$user->id),'method'=>'PUT','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="name" type="text" tabindex="1" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Email <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" tabindex="1" class="form-control" name="email" value="{{$user->email}}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Password  </label>
                                    <div class="col-md-12">
                                        <input id="password" type="password" tabindex="1" class="form-control" name="password" value="" >
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-8 control-label">Confirm-Password </label>
                                    <div class="col-md-12">
                                        <input id="password_confirmation" type="password" tabindex="1" class="form-control" name="password_confirmation" value="" >
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{url('/admin/staff')}}" class="btn btn-warning reset">

                                    Back

                                </a>
                            </div>
                        </div>

                        {!! form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>
        // $(function() {
        //     $('#vehicle_type').change(function(){
        //         $(this).val()
        //         if(this.value == "1") {
        //             $('.notbike').hide();
        //
        //         } else {
        //             $('.notbike').show();
        //         }
        //     });
        // });

        function change() {
            debugger;
            var type = $('#vehicle_ownership').val()


            debugger;
            if(type == '1')
            {
                $('.official').hide();
                $('.personal_vehicle').show();
                $('#personal_vehicle').attr('required','true');
                $('#official').removeAttr('required');

            }
            else{
                $('.personal_vehicle').hide();
                $('.official').show();
                $('#official').attr('required','true');
                $('#personal_vehicle').removeAttr('required');

            }
        }

    </script>



@endsection