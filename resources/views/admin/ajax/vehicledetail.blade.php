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
                                        {{ config('custom.vehicle_type')[$vehicle->type]}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('position') ? ' has-error' : '' }}">
                                        <label for="position" class="col-md-6 control-label">Brand    </label>
                                        {{$vehicle->brand}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label for="start_date" class="col-md-6 control-label">Mileage  </label>
                                        {{$vehicle->mileage}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="{{ $errors->has('vehicle_ownership') ? ' has-error' : '' }} ui-widget">
                                        <label for="document_type_id" class="col-md-6 control-label">Vehicle No: </label>
                                        {{$vehicle->vehicle_no}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('vehicle_number') ? ' has-error' : '' }}">
                                        <label for="vehicle_number" class="col-md-6 control-label">Engine No:</label>
                                        {{$vehicle->engine_no}}

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('vehicle_type') ? ' has-error' : '' }} ">
                                        <label for="document_type_id" class="col-md-6 control-label">Chassis No : </label>
                                        {{$vehicle->chassis_no}}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('montly_mileage') ? ' has-error' : '' }}">
                                        <label for="montly_mileage" class="col-md-6 control-label">Register Date:  </label>
                                        {{$vehicle->registered_date}}
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
