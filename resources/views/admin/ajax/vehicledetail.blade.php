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
                                        <label for="montly_mileage" class="col-md-6 control-label">Register Date:  </label>
                                        <div class="col-md-6 control-label">
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
@if($vehicle->type != 1)
<div class="col-md-6">
    <div >
        <label for="driver" class="col-md-6 control-label">Driver  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
        <div class="col-md-12">

            <select name="driver"   tabindex="2" class="form-control" required autofocus>
                    <option value="">Select one...</option>
                    @foreach($drivers as $type)

                        <option value='{{$type->id}}'> {{$type->name}} </option>"
                    @endforeach
            </select>
        </div>
    </div>
</div>
@foreach($services as $service)
    <div class="col-md-6">
        <div >
            <label for="driver" class="col-md-6 control-label">{{$service->name}} [litre/month]</label>
            <div class="col-md-12">
                <input  type="float" tabindex="3" class="form-control " name="{{$service->id}}" value="" >
            </div>
        </div>
    </div>
@endforeach
@else
    @foreach($services as $service)
        @if($service->id != 2)
        <div class="col-md-6">
            <div >
                <label for="driver" class="col-md-6 control-label">{{$service->name}} [litre/month]</label>
                <div class="col-md-12">
                    <input  type="float" tabindex="3" class="form-control " name="{{$service->id}}" value="" >
                </div>
            </div>
        </div>
        @endif
    @endforeach
@endif