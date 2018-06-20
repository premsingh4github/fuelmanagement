@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/vehicle/'.$vehicle->id),'method'=>'PUT','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-6 control-label">Type  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select name="vehicle_type" id ='vehicle_type'   tabindex="6" class="form-control"  required autofocus>
                                            <option value="">Select one...</option>
                                            @Foreach(config('custom.vehicle_type') as $type => $item)
                                                <option value='{{$type}}' @if($type == $vehicle->type) selected @endif> {{$item}} </option>;
                                            @endforeach
                                        </select>  @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('brand') ? ' has-error' : '' }}">
                                    <label for="brand" class="col-md-6 control-label">Brand  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="brand" type="text" tabindex="3" class="form-control  " name="brand" value="{{$vehicle->brand}}" required autofocus>

                                        @if ($errors->has('brand'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('brand') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('mileage') ? ' has-error' : '' }}">
                                    <label for="mileage" class="col-md-6 control-label">Mileage(Km/L)  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>

                                    <div class="col-md-12">
                                        <input id="mileage" type="number" tabindex="3" class="form-control  " name="mileage" value="{{$vehicle->mileage}}" required autofocus>
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
                                <div class="{{ $errors->has('engine_no') ? ' has-error' : '' }}">
                                    <label for="engine_no" class="col-md-6 control-label">Engine No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="engine_no" type="text" tabindex="3" class="form-control " name="engine_no" value="{{$vehicle->engine_no}}" required autofocus>
                                        @if ($errors->has('engine_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('engine_no') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('chasis_no') ? ' has-error' : '' }} ui-widget">
                                    <label for="chasis_no" class="col-md-8 control-label">Chasis No <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <input id="chasis_no" type="text" tabindex="3" class="form-control " name="chasis_no" value="{{$vehicle->chassis_no}}" required autofocus>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('registered_date') ? ' has-error' : '' }} ui-widget">
                                    <label for="registered_date" class="col-md-8 control-label">Registered Date <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <input id="registered_date" type="date" tabindex="3" class="form-control calendar " name="registered_date" value="{{$vehicle->registered_date}}" required autofocus>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="official">
                                    <div class="{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                                        <label for="vehicle_no" class="col-md-6 control-label">Vehicle No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        <div class="col-md-12">
                                            <input id="vehicle_no" type="text" tabindex="3" class="form-control  " name="vehicle_no" value="{{$vehicle->vehicle_no}}" required autofocus>

                                            @if ($errors->has('vehicle_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('vehicle_no') }}</strong>
                                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="personal_vehicle">
                                    <div class="{{ $errors->has('current_km') ? ' has-error' : '' }} ui-widget">
                                        <label for="current_km" class="col-md-8 control-label">Current KM <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="current_km" type="number" tabindex="3" class="form-control " name="current_km" value="{{$vehicle->current_km}}" required autofocus>
                                            @if ($errors->has('current_km'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('current_km') }}</strong>
                                                     </span>
                                            @endif

                                        </div>
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
