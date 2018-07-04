@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff_vehicle/'.$staff_veh->id),'method'=>'PUT','class'=>'form-horizontal','id'=>'myform']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('staff') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Staff  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select  id="staff_id" name="staff"   tabindex="2" class="form-control" onchange="getStaffdetail()" required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach($staff as $type)
                                                <option value='{{$type->id}}' @if($type->id == $staff_veh->staff_id)selected @endif> {{$type->name}} </option>";
                                            @endforeach
                                        </select>
                                        @if ($errors->has('staff'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('staff') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="{{ $errors->has('ownership') ? ' has-error' : '' }}">
                                    <label for="ownership" class="col-md-6 control-label">Ownership  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select name="ownership"  id="ownership" tabindex="2" class="form-control" onchange="ownershipChanged()" required autofocus>
                                            <option value="">Select one...</option>
                                            <option value="1"  @if(1 == $staff_veh->ownership) selected @endif>Official</option>
                                            <option value="0"  @if(0 == $staff_veh->ownership) selected @endif>Personal</option>
                                        </select>
                                        @if ($errors->has('ownership'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ownership') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="staff_detail">

                            </div>
                        </div>

                        <div class="row" id="vehicle_container">
                            <div class="offical_vehicle" >
                                <div class="col-md-6">
                                    <div class="{{ $errors->has('ovehicle') ? ' has-error' : '' }}">
                                        <label for="ovehicle" class="col-md-6 control-label">Vehicle  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        <div class="col-md-12">
                                            <select name="vehicle_id"   id="vehicle_id" tabindex="2" class="form-control" onchange=getVehicleinfo() required autofocus>
                                                <option value="">Select one...</option>
                                                @foreach($vehicles as $type)
                                                    <option @if($staff_veh->vehicle_id == $type->id)  selected @endif value='{{$type->id}}'> {{config('custom.vehicle_types')[$type->type]}}__{{$type->brand}}__{{$type->vehicle_no}} </option>";
                                                @endforeach
                                            </select>
                                            @if ($errors->has('staff'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('staff') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ajax">
                                <div class="col-md-12 " >
                                    <?php $vehicle = $staff_veh->vehicle; ?>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="panel panel-default">
                                                <div class="panel-heading ">
                                                    <div class="panel-body">
                                                        <div class="alert alert-info">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                                                        <label for="date" class="col-md-6 control-label">Type  :   </label>
                                                                        <div class="col-md-4 control-label">
                                                                            {{ config('custom.vehicle_types')[$vehicle->type]}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="{{ $errors->has('position') ? ' has-error' : '' }}">
                                                                        <label for="position" class="col-md-6 control-label">Brand    </label>
                                                                        <div class="col-md-4 control-label">
                                                                            {{$vehicle->brand}}
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                                                        <label for="start_date" class="col-md-6 control-label">Mileage  </label>
                                                                        <div class="col-md-4 control-label">
                                                                            {{$vehicle->mileage}}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="{{ $errors->has('vehicle_ownership') ? ' has-error' : '' }} ui-widget">
                                                                        <label for="document_type_id" class="col-md-6 control-label">Vehicle No: </label>
                                                                        <div class="col-md-4 control-label">
                                                                            {{$vehicle->vehicle_no}}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="{{ $errors->has('vehicle_number') ? ' has-error' : '' }}">
                                                                        <label for="vehicle_number" class="col-md-6 control-label">Engine No:</label>
                                                                        <div class="col-md-4 control-label">
                                                                            {{$vehicle->engine_no}}
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="{{ $errors->has('vehicle_type') ? ' has-error' : '' }} ">
                                                                        <label for="document_type_id" class="col-md-6 control-label">Chassis No : </label>
                                                                        <div class="col-md-4 control-label">
                                                                            {{$vehicle->chassis_no}}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="{{ $errors->has('montly_mileage') ? ' has-error' : '' }}">
                                                                        <label for="montly_mileage" class="col-md-8 control-label">Register Date:  </label>
                                                                        <div class="col-md-4 control-label">
                                                                            {{$vehicle->registered_date}}
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <br>

                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="{{ $errors->has('current_km') ? ' has-error' : '' }} ui-widget">
                                            <label for="mileage" class="col-md-8 control-label">Current Km <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                            <div class="col-md-12">
                                                <input id="current_km" type="number" tabindex="3" min="{{$vehicle->current_meter}}" class="form-control " name="current_km" value="{{$staff_veh->current_meter}}" required autofocus>
                                                @if ($errors->has('current_km'))
                                                    <span class="help-block">
                        <strong>{{ $errors->first('current_km') }}</strong>
                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="{{ $errors->has('previous_km') ? ' has-error' : '' }} ui-widget">
                                            <label for="previous_km" class="col-md-8 control-label">Previous Km <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                            <div class="col-md-12">
                                                <input id="previous_km" type="number" tabindex="3" class="form-control " name="previous_km" value="{{$staff_veh->previous_meter}}" disabled >
                                                @if ($errors->has('previous_km'))
                                                    <span class="help-block">
                        <strong>{{ $errors->first('previous_km') }}</strong>
                     </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="{{ $errors->has('driver') ? ' has-error' : '' }}">
                                            <label for="driver" class="col-md-6 control-label">Driver  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                            <div class="col-md-12">

                                                <select name="driver"   tabindex="2" class="form-control" required autofocus>
                                                    <option value=""  >Select one...</option>
                                                    <option value="0" @if(!($staff_veh->driver_id > 0)) selected @endif>Self</option>

                                                    @foreach($drivers as $type)
                                                        <option value='{{$type->id}}' @if($type->id == $staff_veh->driver_id) selected @endif> {{$type->name}} </option>";
                                                    @endforeach
                                                </select>
                                                </select>
                                                @if ($errors->has('staff'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('staff') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($services as $service)
                                        <div class="col-md-6">
                                            <div >
                                                <label for="driver" class="col-md-6 control-label">{{$service->name}} @if( ($service->id == 3) && ($vehicle->type == 1)  ) [litre/ 4 month] @else [litre/month] @endif</label>
                                                <div class="col-md-12">
                                                    <input  type="float" tabindex="3" class="form-control " name="services[{{$service->id}}]" value="{{$service->quotaByStaffVehicleId($staff_veh->id)}}" >
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Updated
                                </button>
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
        $(document).ready(function () {
            getStaffdetail();
            // getVehicleinfo();
        });
    </script>
@endsection