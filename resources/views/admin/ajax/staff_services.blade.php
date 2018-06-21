@foreach($staff->staff_vehicles()->first()->vehicle_services as $service)
    <div class="col-md-6">
        <div >
            <label for="driver" class="col-md-8 control-label">{{$service->service->name}} [litre/month] max- {{$service->quota}}</label>
            <div class="col-md-12">
                <input name="service[{{$service->id}}]"  type="float"  class="form-control "  value="" >


            </div>
        </div>
    </div>
@endforeach