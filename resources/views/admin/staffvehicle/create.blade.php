@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff_vehicle'),'method'=>'POST','class'=>'form-horizontal','id'=>'myform']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('staff') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Staff  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">

                                        <select id="staff_id" name="staff"   tabindex="2" class="form-control" onchange="getStaffdetail()" required autofocus>
                                        <option value="">Select one...</option>
                                        @foreach($staffs as $type)
                                        <option value='{{$type->id}}'> {{$type->name}} </option>";
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
                            <div class="col-md-6">
                                <div class="{{ $errors->has('ownership') ? ' has-error' : '' }}">
                                    <label for="ownership" class="col-md-6 control-label">Ownership  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">

                                        <select name="ownership"  id="ownership" tabindex="2" class="form-control" onchange=changetype() required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach(config('custom.vehicle_ownerships') as $type=> $index)
                                                <option value='{{$type}}'> {{$index}} </option>";
                                            @endforeach
                                        </select>
                                        @if ($errors->has('ownership'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ownership') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="staff_detail">

                            </div>
                        </div>
                        <div class="row">
                            <div class="personal" style="display: none">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_brand') ? ' has-error' : '' }}">
                                    <label for="vehicle_brand" class="col-md-6 control-label"> Vehicle Brand<span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="vehicle_brand" type="text" tabindex="3" class="form-control " name="vehicle_brand" value="" required autofocus>
                                        @if ($errors->has('vehicle_brand'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('vehicle_brand') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                                    <label for="vehicle_no" class="col-md-6 control-label"> Number  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>

                                    <input id="vehicle_no" type="text" tabindex="3" class="form-control " name="vehicle_no" value="" required autofocus>

                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('mileage') ? ' has-error' : '' }}">
                                        <label for="mileage" class="col-md-8 control-label"> Mileage(Km/L)  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>

                                        <input id="mileage" type="text" tabindex="3" class="form-control " name="mileage" value="" required autofocus>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offical" style=" display: none">
                                <div class="col-md-6">
                                    <div class="{{ $errors->has('ovehicle') ? ' has-error' : '' }}">
                                        <label for="ovehicle" class="col-md-6 control-label">Vehicle  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        <div class="col-md-12">
                                            <select name="vehicle_id"   id="vehicle_id" tabindex="2" class="form-control" onchange=getVehicleinfo() required autofocus>
                                                <option value="">Select one...</option>
                                                @foreach($vehicle as $type)
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
                        </div>
                        <div class="row">
                            <div class="ajax">
                                @foreach($services as $service)
                                    <div class="col-md-6">
                                        <div >
                                            <label for="driver" class="col-md-6 control-label">{{$service->name}} @if($service->id == 3) [litre/ 4 - month] @else [litre/month] @endif</label>
                                            <div class="col-md-12">
                                                <input  type="float" tabindex="3" class="form-control " name="{{$service->id}}" value="" >
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">





                        </div>

                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{url('admin/staff_vehicle')}}" tabindex="9" class="btn btn-warning reset">
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
@section('script')
    <script>
        function changetype() {
            var type = $('#ownership').val()
            if(type == '1')
            {
                $('.offical').hide();
                $('.personal').show();
                $('#vehicle_brand').attr('required','true');
                $('#vehicle_no').attr('required','true');
                $('#mileage').attr('required','true');
                $('#ovehicle').removeAttr('required');

            }
            else{
                $('.personal').hide();
                $('.offical').show();
                $('#ovehicle').attr('required','true');
                $('#vehicle_brand').removeAttr('required');
                $('#vehicle_no').removeAttr('required');
                $('#mileage').removeAttr('required');

            }
        }



    </script>



@endsection