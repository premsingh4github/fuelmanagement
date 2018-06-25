<div class="offical_vehicle" >
    <div class="col-md-6">
        <div class="{{ $errors->has('ovehicle') ? ' has-error' : '' }}">
            <label for="ovehicle" class="col-md-6 control-label">Vehicle  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <select name="vehicle_id"   id="vehicle_id" tabindex="2" class="form-control" onchange=getVehicleinfo() required autofocus>
                    <option value="">Select one...</option>
                    @foreach($vehicles as $type)
                        <option value='{{$type->id}}'> {{config('custom.vehicle_types')[$type->type]}}__{{$type->brand}}__{{$type->vehicle_no}} </option>";
                    @endforeach
                </select>
                @if ($errors->has('staff'))
                    <span class="help-block">
                        <strong>{{ $errors->first('staff') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="ajax">

</div>
