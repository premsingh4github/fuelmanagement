@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/vehicle'),'method'=>'POST','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-6 control-label">Type  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                       {{ config('custom.vehicle_type')[$vehicle->type]}}
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('brand') ? ' has-error' : '' }}">
                                    <label for="brand" class="col-md-6 control-label">Brand  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                       {{$vehicle->brand}}
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
                                        {{$vehicle->mileage}}
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
                                        {{$vehicle->engine_no}}
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
                                        {{$vehicle->chassis_no}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('registered_date') ? ' has-error' : '' }} ui-widget">
                                    <label for="registered_date" class="col-md-8 control-label">Registered Date <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
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
                                        <div class="col-md-12">
                                            {{$vehicle->vehicle_no}}
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
                                            {{$vehicle->current_km}}
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
