<div class="col-md-12 " >
    <div class="row">
        <div class="col-md-12 ">

            <div class="panel panel-default">


                <div class="panel-heading ">
                    <div class="panel-body">
                        @if(request('current_km') < $staff->previous_km())
                        <div class="alert alert-danger">
                            <p>Invalide Current Meter</p>
                        </div>
                        @else
                            <h2>Fuel in Engine</h2>
                            <div class="alert alert-info">

                                <div class="row">
                                    @foreach($staff->staff_vehicles()->first()->vehicle_services()->where('quota','>',0)->get() as $service)
                                        @if($service->service->id != 3)
                                        <div class="col-md-6">
                                            <div >
                                                <label for="driver" class="col-md-6 control-label">{{$service->service->name}} :</label>
                                                <div class="col-md-6  control-label">
{{$vehicle->current_fuel($service->service->id) - ((request('current_km') - $staff->previous_km())/$staff->vehicles()->first()->mileage) }} Litre
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <br>
                                <br>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

