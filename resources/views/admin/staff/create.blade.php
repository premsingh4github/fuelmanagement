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
                                    <label for="date" class="col-md-6 control-label">Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="name" type="text" tabindex="1" class="form-control" name="name" value="" required autofocus>
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
                                    <label for="designation" class="col-md-6 control-label">Designation  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">

                                        <select name="designation"   tabindex="2" class="form-control" required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach($des as $type)
                                            <option value='{{$type->id}}'> {{$type->name}} </option>";
                                            @endforeach
                                        </select> @if ($errors->has('designation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('designation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('joining_date') ? ' has-error' : '' }}">
                                    <label for="joining_date" class="col-md-6 control-label">Joining Date  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="joining_date" type="text" tabindex="3" class="form-control nepali-calender " name="joining_date" value="" required autofocus>
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
                                    <label for="licence_no" class="col-md-6 control-label">Licence No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="licence_no" type="text" tabindex="3" class="form-control " name="licence_no" value="" required autofocus>
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
                                    <label for="document_type_id" class="col-md-8 control-label">Vehicle OwnerShip <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <select name="vehicle_ownership" id="vehicle_ownership"  tabindex="4" class="form-control"  onchange=change() required autofocus>
                                            <option value="">Select one...</option>
                                            @Foreach(config('custom.vehicle_ownership') as $type => $item)
                                                <option value='{{$type}}'> {{$item}} </option>";

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_type') ? ' has-error' : '' }} ui-widget">
                                    <label for="document_type_id" class="col-md-8 control-label">Vehicle Type <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <select name="vehicle_type" id ='vehicle_type'   tabindex="6" class="form-control"  required autofocus>
                                            <option value="">Select one...</option>
                                            @Foreach(config('custom.vehicle_type') as $type => $item)
                                                <option value='{{$type}}'> {{$item}} </option>";
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="official">
                                    <div class="{{ $errors->has('office_vehicle') ? ' has-error' : '' }}">
                                        <label for="office_vehicle" class="col-md-6 control-label">Vehicle  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        <div class="col-md-12">
                                            <select name="office_vehicle" id ='office_vehicle'   tabindex="6" class="form-control"  required autofocus>
                                                <option value="">Select one...</option>

                                                @foreach( $vehicle as $type => $item)
                                                <option value='{{$type}}'> {{config('custom.vehicle_type')[$item->type]}}___{{$item->brand}}__{{$item->vehicle_no}} </option>";
                                                @endforeach
                                            </select>
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
                                            <label for="vehicle_brand" class="col-md-8 control-label">Vehicle Brand & No. <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                            <div class="col-md-12">
                                                <input id="vehicle_brand" type="text" tabindex="3" class="form-control " name="vehicle_brand" value="" required autofocus>
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
                                    <label for="mileage" class="col-md-8 control-label">Mileage <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <input id="mileage" type="number" tabindex="3" class="form-control " name="mileage" value="" required autofocus>
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
                                        <label for="monthly_kota" class="col-md-6 control-label">Monthly Kota  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        <div class="col-md-12">
                                            <input id="monthly_kota" type="number" tabindex="3" class="form-control " name="monthly_kota" value="" required autofocus>


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
                                        <label for="engine_oil" class="col-md-8 control-label">Engine Oil <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="engine_oil" type="number" tabindex="3" class="form-control " name="engine_oil" value="" required autofocus>
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
                                    <label for="driving_person_name" class="col-md-8 control-label">Driving Person Name <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <select name="driving_person_name" id ='driving_person_name'   tabindex="6" class="form-control"  required autofocus>
                                            <option value="">Select one...</option>
                                            <option value="1">Self</option>
                                            {{--@Foreach(config('custom.vehicle_type') as $type => $item)--}}
                                            {{--<option value='{{$type}}'> {{$item}} </option>";--}}
                                            {{--@endforeach--}}
                                        </select>
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
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" tabindex="9" class="btn btn-warning reset">
                                    Reset
                                </button>
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
        function change() {
            debugger;
           var type = $('#vehicle_ownership').val()


            debugger;
            if(type == '1')
            {
                $('.official').hide();
                $('.personal_vehicle').show();
                $('#vehicle_brand').attr('required','true');
                $('#office_vehicle').removeAttr('required');

            }
            else{
               $('.personal_vehicle').hide();
                $('.official').show();
                $('#office_vehicle').attr('required','true');
                $('#vehicle_brand').removeAttr('required');

            }
        }

    </script>



@endsection