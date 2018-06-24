@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff'),'method'=>'POST','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 ">Name:  </label>
                                    {{--<label>Name:</label>--}}
                                    <div class="col-md-9">
                                        {{$staff->name}}

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('designation') ? ' has-error' : '' }}">
                                    <label for="designation" class="col-md-6 ">Designation:   </label>
                                    <div class="col-md-12">
                                        {{$staff->designation->name}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('joining_date') ? ' has-error' : '' }}">
                                    <label for="joining_date" class="col-md-6 ">Joining Date: </label>
                                    <div class="col-md-12">
                                        {{$staff->joining_date}}
                                    @if ($errors->has('joining_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('joining_date') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('licence_no') ? ' has-error' : '' }}">
                                    <label for="licence_no" class="col-md-6 ">Licence No:   </label>
                                    <div class="col-md-12">
                                        {{$staff->licence_no}}
                                        @if ($errors->has('licence_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('licence_no') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('licence_no') ? ' has-error' : '' }}">
                                    <label for="licence_no" class="col-md-6 ">Status   </label>
                                    <div class="col-md-12">
                                        {{config('custom.status')[$staff->status]}}
                                        @if ($errors->has('licence_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('licence_no') }}</strong>
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