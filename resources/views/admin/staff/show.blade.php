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
                                <div class="{{ $errors->has('vehicle_ownership') ? ' has-error' : '' }} ui-widget">
                                    <label for="document_type_id" class="col-md-8 ">Vehicle OwnerShip: </label>

                                    <div class="col-md-12">
                                        {{ config('custom.vehicle_ownership')[$staff->vehicle_ownership]}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_type') ? ' has-error' : '' }} ui-widget">
                                    <label for="vehicle_type" class="col-md-8 ">Vehicle Type: </label>

                                    <div class="col-md-12">
                                        {{config('custom.vehicle_type')[$staff->vehicle_type]}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="official">
                                    <div class="{{ $errors->has('office_vehicle') ? ' has-error' : '' }}">
                                        <label for="office_vehicle" class="col-md-6 ">Vehicle: </label>

                                        <div class="col-md-12">
                                            {{$staff->office_vehicle}}

                                        @if ($errors->has('office_vehicle'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('office_vehicle') }}</strong>
                                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="personal_vehicle">
                                    <div class="{{ $errors->has('vehicle_brand') ? ' has-error' : '' }} ui-widget">
                                        <label for="vehicle_brand" class="col-md-8 ">Vehicle Brand & No:</label>

                                        <div class="col-md-12">
                                            {{$staff->vehicle_brand}}
                                        @if ($errors->has('vehicle_brand'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('vehicle_brand') }}</strong>
                                                     </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('mileage') ? ' has-error' : '' }} ui-widget">
                                    <label for="mileage" class="col-md-8 ">Mileage: </label>

                                    <div class="col-md-12">
                                        {{$staff->mileage}}
                                        @if ($errors->has('mileage'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mileage') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="{{ $errors->has('monthly_kota') ? ' has-error' : '' }}">
                                    <label for="monthly_kota" class="col-md-6 ">Monthly Kota:   </label>
                                    <div class="col-md-12">
                                        {{$staff->monthly_kota}}
                                    @if ($errors->has('monthly_kota'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('monthly_kota') }}</strong>
                                                         </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="{{ $errors->has('engine_oil') ? ' has-error' : '' }} ui-widget">
                                    <label for="engine_oil" class="col-md-8 ">Engine Oil: </label>

                                    <div class="col-md-12">
                                       {{$staff->engine_oil}}
                                        @if ($errors->has('engine_oil'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('engine_oil') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('driving_person_name') ? ' has-error' : '' }} ui-widget">
                                    <label for="driving_person_name" class="col-md-8 ">Driving Person Name: </label>

                                    <div class="col-md-12">
                                      {{$staff->driving_person_name}}
                                        @if ($errors->has('driving_person_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('driving_person_name') }}</strong>
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