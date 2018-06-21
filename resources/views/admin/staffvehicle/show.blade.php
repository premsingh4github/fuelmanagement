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
                                    <label for="date" class="col-md-6 "> Staff Name:  </label>
                                    <div class="col-md-9">
                                        {{$staff_veh->staff->name}}
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
                                    <label for="designation" class="col-md-6 ">Owner Ship:   </label>
                                    <div class="col-md-12">
                                        @if ($staff_veh->ownership == '1')
                                            <div>Personal</div>
                                        @else
                                            <div>Official</div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('joining_date') ? ' has-error' : '' }}">
                                    <label for="joining_date" class="col-md-6 ">Driver : </label>
                                    <div class="col-md-12">
                                        {{$staff_veh->driver->name}}
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
                            @if($staff_veh->ownership == '1')
                            <div class="col-md-4">
                                <div class="{{ $errors->has('licence_no') ? ' has-error' : '' }}">
                                    <label for="licence_no" class="col-md-6 ">Vehicle Brand   </label>
                                    <div class="col-md-12">
                                            {{$staff_veh->Person_veh->vehicle_brand}}
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
                                    <label for="licence_no" class="col-md-6 ">Vehicle No   </label>
                                    <div class="col-md-12">
                                        {{$staff_veh->Person_veh->vehicle_no}}
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
                                    <label for="licence_no" class="col-md-6 ">Meilage   </label>
                                    <div class="col-md-12">
                                        {{$staff_veh->Person_veh->mileage}}
                                        @if ($errors->has('licence_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('licence_no') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif


                        </div>


                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

                                <a href="{{url('/admin/staff_vehicle')}}" class="btn btn-warning reset">

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