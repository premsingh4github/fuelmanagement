<div class="col-md-12 " >
    <div class="row">
        <div class="col-md-12 ">

            <div class="panel panel-default">


                <div class="panel-heading ">
                    <div class="panel-body">
                        <div class="alert alert-info">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Name  :   </label>
                                    <div class="col-md-6 control-label">
                                        {{$staff->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label for="position" class="col-md-6 control-label">Designation : </label>
                                    <div class="col-md-6 control-label">
                                        {{$staff->designation->name}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                    <label for="start_date" class="col-md-6 control-label">Start Date : </label>
                                    <div class="col-md-6 control-label">
                                        {{$staff->joining_date}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div >
                                    <label for="start_date" class="col-md-8 control-label">Driving License :  </label>
                                    <div class="col-md-4 control-label">
                                        {{$staff->licence_no}}
                                    </div>
                                </div>
                            </div>
                            @if($staff->staff_vehicles()->count() > 0)

                                @if( $staff->staff_vehicles()->first()->vehicle)
                                    <?php $vehicle = $staff->staff_vehicles()->first()->vehicle; ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('type') ? ' has-error' : '' }}">
                                                <label for="type" class="col-md-6 control-label">Vehicle Type : </label>
                                                <div class="col-md-6 control-label">
                                                    {{ config('custom.vehicle_types')[$vehicle->type]}}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('brand') ? ' has-error' : '' }}">
                                                <label for="brand" class="col-md-6 control-label">Brand  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                                <div class="col-md-6 control-label">
                                                    {{$vehicle->brand}}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('mileage') ? ' has-error' : '' }}">
                                                <label for="mileage" class="col-md-8 control-label">Mileage(Km/L)  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                                <div class="col-md-4 control-label">
                                                    {{$vehicle->mileage}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('engine_no') ? ' has-error' : '' }}">
                                                <label for="engine_no" class="col-md-6 control-label">Engine No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                                <div class="col-md-6 control-label">
                                                    {{$vehicle->engine_no}}
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('chasis_no') ? ' has-error' : '' }} ui-widget">
                                                <label for="chasis_no" class="col-md-6 control-label">Chasis No <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                                <div class="col-md-6 control-label">
                                                    {{$vehicle->chassis_no}}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('registered_date') ? ' has-error' : '' }} ui-widget">
                                                <label for="registered_date" class="col-md-6 control-label">Registered Date <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                                <div class="col-md-6 control-label">
                                                    {{$vehicle->registered_date}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="official">
                                                <div class="{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                                                    <label for="vehicle_no" class="col-md-6 control-label">Vehicle No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                                    <div class="col-md-6 control-label">
                                                        {{$vehicle->vehicle_no}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="personal_vehicle">
                                                <div class="{{ $errors->has('current_km') ? ' has-error' : '' }} ui-widget">
                                                    <label for="current_km" class="col-md-6 control-label">Previous KM <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                                    <div class="col-md-6 control-label">
                                                        {{$vehicle->previous_km()}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @else
                                    <?php $vehicle = $staff->staff_vehicles()->first()->person_veh; ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('brand') ? ' has-error' : '' }}">
                                                <label for="brand" class="col-md-6 control-label">Brand   </label>
                                                <div class="col-md-4 control-label">
                                                    {{$vehicle->vehicle_brand}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('brand') ? ' has-error' : '' }}">
                                                <label for="brand" class="col-md-6 control-label">Vehicle No.   </label>
                                                <div class="col-md-4 control-label">
                                                    {{$vehicle->vehicle_no}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="{{ $errors->has('mileage') ? ' has-error' : '' }}">
                                                <label for="mileage" class="col-md-8 control-label">Mileage(Km/L)  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                                <div class="col-md-4 control-label">
                                                    {{$vehicle->mileage}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endif
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
                <input id="current_km" type="number" tabindex="3" min="{{$staff->previous_km()}}" class="form-control " name="current_km" value="" required autofocus>
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
                <input id="previous_km" type="number" tabindex="3" class="form-control " name="previous_km" value="{{$staff->previous_km()}}" disabled >
                @if ($errors->has('previous_km'))
                    <span class="help-block">
                        <strong>{{ $errors->first('previous_km') }}</strong>
                     </span>
                @endif

            </div>
        </div>
    </div>
</div>
