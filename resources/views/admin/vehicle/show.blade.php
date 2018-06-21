@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/vehicle'),'method'=>'POST','class'=>'']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-6 control-label">Type : </label>
                                    <div class="col-md-6">
                                        {{ config('custom.vehicle_type')[$vehicle->type]}}

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('brand') ? ' has-error' : '' }}">
                                    <label for="brand" class="col-md-6 control-label">Brand  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    {{$vehicle->brand}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('mileage') ? ' has-error' : '' }}">
                                    <label for="mileage" class="col-md-8 control-label">Mileage(Km/L)  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>

                                    {{$vehicle->mileage}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('engine_no') ? ' has-error' : '' }}">
                                    <label for="engine_no" class="col-md-6 control-label">Engine No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    {{$vehicle->engine_no}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('chasis_no') ? ' has-error' : '' }} ui-widget">
                                    <label for="chasis_no" class="col-md-8 control-label">Chasis No <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    {{$vehicle->chassis_no}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('registered_date') ? ' has-error' : '' }} ui-widget">
                                    <label for="registered_date" class="col-md-8 control-label">Registered Date <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    {{$vehicle->registered_date}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="official">
                                    <div class="{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                                        <label for="vehicle_no" class="col-md-6 control-label">Vehicle No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        {{$vehicle->vehicle_no}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="personal_vehicle">
                                    <div class="{{ $errors->has('current_km') ? ' has-error' : '' }} ui-widget">
                                        <label for="current_km" class="col-md-8 control-label">Current KM <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        {{$vehicle->current_km}}
                                    </div>
                                </div>
                            </div>


                        </div>

                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a href="{{url('/admin/vehicle')}}" class="btn btn-warning reset">

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
