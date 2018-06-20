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
                                    {{$staff->name}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label for="position" class="col-md-6 control-label">Position    </label>
                                    {{$staff->position}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                    <label for="start_date" class="col-md-6 control-label">Start Date  </label>
                                    {{$staff->start_date}}
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_ownership') ? ' has-error' : '' }} ui-widget">
                                    <label for="document_type_id" class="col-md-6 control-label">Vehicle OwnerShip: </label>
                                    {{ config('custom.vehicle_ownership')[$staff->vehicle_ownership]}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_number') ? ' has-error' : '' }}">
                                    <label for="vehicle_number" class="col-md-6 control-label">Vehicle Number:</label>
                                    {{$staff->vehicle_no}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_type') ? ' has-error' : '' }} ">
                                    <label for="document_type_id" class="col-md-6 control-label">Vehicle Type : </label>
                                    {{config('custom.vehicle_type')[$staff->vehicle_type]}}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('montly_mileage') ? ' has-error' : '' }}">
                                    <label for="montly_mileage" class="col-md-6 control-label">Monthly Quota:  </label>
                                    {{$staff->capacity}}
                                </div>
                            </div>
                            @if($staff->vehicle_type !='1')
                                <div class="notbike"   >
                                    <div class="col-md-4">
                                        <div class="{{ $errors->has('driver_name') ? ' has-error' : '' }}">
                                            <label for="driver_name" class="col-md-6 control-label">Driver Name  </label>
                                            {{($staff->driver)?$staff->driver->driver_name: ''}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="{{ $errors->has('vehicle_mileage') ? ' has-error' : '' }}">
                                            <label for="vehicle_mileage" class="col-md-6 control-label">Vehicle Mileage  </label>
                                            {{ ($staff->driver )?$staff->driver->vehicle_mileage: '' }}
                                        </div>

                                    </div>

                                </div>
                            @endif
                            <div class="col-md-4">
                                <div >
                                    <label for="montly_mileage" class="col-md-6 control-label">ID Number:  </label>
                                    {{$staff->id_number}}
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
