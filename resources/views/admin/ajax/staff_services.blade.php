@foreach($staff->staff_vehicles()->first()->vehicle_services as $service)
    <div class="col-md-6">
        <div >
            <label for="driver" class="col-md-8 control-label">{{$service->service->name}} [litre/month] max- {{$service->quota}}</label>
            <div class="col-md-12">
                <input name="service[{{$service->id}}]"  type="float"  class="form-control "  value="{{request('service')[$service->id]}}" onchange="updateService()" autofocus >
                @if($service->service->id == '3')
                <input type="radio"  name="servicing" value="1"   /> For Servicing
                <input type="radio"  name="servicing" value="0"  checked /> For Monthly Uses
                @endif
                @if($service->quota < request('service')[$service->id])

                <div class="alert alert-danger" role="alert">
                    Quantity is greater than monthly quota
                </div>
                @endif
            </div>
        </div>
    </div>
@endforeach