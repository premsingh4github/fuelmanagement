<div class="row">
    <div class="form-group col-sm-6 col-sm-offset-2">
        <a href="{{url('admin/fuel')}}" class=" btn btn-sm  btn-warning" >Back</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="{{ $errors->has('date') ? ' has-error' : '' }}">
            <label for="date" class="col-md-6 control-label">Date  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <input  type="text" tabindex="1" class="form-control " name="date" value="{{$today_nepali}}" required autofocus disabled="disabled">
                @if ($errors->has('date'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="{{ $errors->has('date') ? ' has-error' : '' }}">
            <label for="date" class="col-md-6 control-label">Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <input  type="text" tabindex="1" class="form-control " name="name"  value="{{old('name')}}" required autofocus >
                @if ($errors->has('date'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="{{ $errors->has('organization') ? ' has-error' : '' }}">
            <label for="organization" class="col-md-6 control-label">Organization Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <input  type="text" tabindex="1" class="form-control " name="organization"  value="{{old('organization')}}" required autofocus >
                @if ($errors->has('organization'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('organization') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
            <label for="vehicle_no" class="col-md-6 control-label">Vehicle No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <input  type="text" tabindex="1" class="form-control " name="vehicle_no" value="{{old('vehicle_no')}}" required autofocus >
                @if ($errors->has('vehicle_no'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('vehicle_no') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="{{ $errors->has('month') ? ' has-error' : '' }}">
            <label for="month" class="col-md-6 control-label">Month <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <select name="month_id" id="month"   tabindex="4" class="form-control"   required autofocus>
                    <option value="">Select one...</option>
                    @Foreach(config('custom.nepali_months') as $type => $item)
                        <option value='{{$type}}'> {{$item}} </option>";

                    @endforeach
                </select>
                @if ($errors->has('month'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('month') }}</strong>
                                                     </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="{{ $errors->has('mode') ? ' has-error' : '' }}">
            <label for="mode" class="col-md-6 control-label">Mode <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <input type="radio"  name="mode" value="coupon" onclick="hideamount()" checked /> Coupon

                <input type="radio" name="mode" value="cash" onclick="getamount()"> Cash
                <br>
                @if ($errors->has('mode'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('mode') }}</strong>
                                                     </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-md-6" id="coupon_container" >
        <div class="amountt"  >
            <div class="{{ $errors->has('coupon') ? ' has-error' : '' }} ui-widget">
                <label for="coupon" class="col-md-8 control-label">Coupon Number <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                <div class="col-md-12">
                    <input id="coupon" type="text" class="form-control " name="coupon" value="" >

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="display: none"id="amount_container" >
        <div class="amountt"  >
            <div class="{{ $errors->has('amount') ? ' has-error' : '' }} ui-widget">
                <label for="amount" class="col-md-8 control-label">Amount <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                <div class="col-md-12">
                    <input id="amount" type="number" class="form-control " name="amount" value="" >

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="{{ $errors->has('petrolpump_name') ? ' has-error' : '' }} ui-widget">
            <label for="petrolpump_name" class="col-md-8 control-label">PetrolPump Name <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
            <div class="col-md-12">
                <select name="petrolpump_name" id ='petrolpump_name'   onchange="petrolpumpChange()" tabindex="6" class="form-control"  required autofocus>
                    <option value="">Select one...</option>
                    {{--<option value='0'> OTHERS </option>";--}}

                    @foreach($pump as $type)
                        <option value='{{$type->id}}'> {{$type->name}} </option>";
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6 other_petrolpump" style="display: none">
        <div class="{{ $errors->has('other') ? ' has-error' : '' }}">
            <label for="office_vehicle" class="col-md-6 control-label">Other PetrolPump Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
            <div class="col-md-12">
                <input id="other" type="text" tabindex="1" class="form-control " name="other" value="" required autofocus>

                @if ($errors->has('other'))
                    <span class="help-block">
                                                    <strong>{{ $errors->first('other') }}</strong>
                                                 </span>
                @endif
            </div>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-md-6"  >
        <div class="amountt"  >
            <div class="{{ $errors->has('petrol') ? ' has-error' : '' }} ui-widget">
                <label for="petrol" class="col-md-8 control-label">Petrol[Litre] <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                <div class="col-md-12">
                    <input id="petrol" type="number" class="form-control " name="petrol" value="0" >

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"  >
        <div class="amountt"  >
            <div class="{{ $errors->has('engine_oil') ? ' has-error' : '' }} ui-widget">
                <label for="engine_oil" class="col-md-8 control-label">Engine Oil <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                <div class="col-md-12">
                    <input id="engine_oil" type="number" class="form-control " name="engine_oil" value="0" >

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6"  >
        <div class="amountt"  >
            <div class="{{ $errors->has('receiver_name') ? ' has-error' : '' }} ui-widget">
                <label for="receiver_name" class="col-md-8 control-label">Receiver Name <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                <div class="col-md-12">
                    <input id="receiver_name" type="text" class="form-control " name="receiver_name" value="" >

                </div>
            </div>
        </div>
    </div>


</div>
<div class="row" id="meters_detail">

</div>
<div class="ajax">

</div>
<div id="old_fuel">

</div>
<div class="row" id="services">

</div>
<br>
<br>