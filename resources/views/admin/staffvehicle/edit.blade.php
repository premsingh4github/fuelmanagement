@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff_vehicle/'.$staff_veh->id),'method'=>'PUT','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('staff') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Staff  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">


                                        <select name="staff"   tabindex="2" class="form-control" required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach($staff as $type)
                                                <option value='{{$type->id}}' @if($type->id == $staff_veh->staff_id)selected @endif> {{$type->name}} </option>";
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
                                                <option value='{{$type}}' @if($type == $staff_veh->ownership) selected @endif> {{$index}} </option>";
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
                            @if($staff_veh->ownership == '1')
                            {{--@if($staff_veh->Person_veh)--}}
                            <div class="personal" >
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('vehicle_brand') ? ' has-error' : '' }}">
                                        <label for="vehicle_brand" class="col-md-6 control-label"> Vehicle Brand<span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        <div class="col-md-12">
                                            <input id="vehicle_brand" type="text" tabindex="3" class="form-control " name="vehicle_brand" value="  {{$staff_veh->person_veh?$staff_veh->person_veh->vehicle_brand:''}}" required autofocus>
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

                                        <input id="vehicle_no" type="text" tabindex="3" class="form-control " name="vehicle_no" value="  {{$staff_veh->Person_veh?$staff_veh->Person_veh->vehicle_no:''}}" required autofocus>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('mileage') ? ' has-error' : '' }}">
                                        <label for="mileage" class="col-md-8 control-label"> Mileage(Km/L)  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>

                                        <input id="mileage" type="text" tabindex="3" class="form-control " name="mileage" value="  {{$staff_veh->Person_veh?$staff_veh->Person_veh->mileage:''}}" required autofocus>

                                    </div>
                                </div>
                            </div>
                                @else
                                <div class="offical" >
                                    <div class="col-md-6">
                                        <div class="{{ $errors->has('ovehicle') ? ' has-error' : '' }}">
                                            <label for="ovehicle" class="col-md-6 control-label">Vehicle  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                            <div class="col-md-12">
                                                <select name="ovehicle"   id="ovehicle" tabindex="2" class="form-control" onchange=getinfo() required autofocus>
                                                    <option value="">Select one...</option>
                                                    @foreach($vehicle as $type)
                                                        <option value='{{$type->id}}' @if($type->id == $staff_veh->vehicle_id) selected @endif > {{config('custom.vehicle_type')[$type->type]}}__{{$type->brand}}__{{$type->vehicle_no}} </option>";
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
                                @endif
                        </div>
                        <div class="row">
                            {{--@if($staff_veh->vehicle_id)--}}

                                {{--@endif--}}
                        </div>
                        <div class="row">
                            <div class="ajax">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('driver') ? ' has-error' : '' }}">
                                    <label for="driver" class="col-md-6 control-label">Driver  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">

                                        <select name="driver"   tabindex="2" class="form-control" required autofocus>
                                            <option value="">Select one...</option>
                                            <option value="0" @if('0' == $staff_veh->driver_id) selected @endif>Self</option>

                                            @foreach($drivers as $type)
                                                <option value='{{$type->id}}'@if($type->id == $staff_veh->driver_id) selected @endif> {{$type->name}} </option>";
                                            @endforeach
                                        </select>
                                        </select>
                                        @if ($errors->has('staff'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('staff') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @foreach($services as $service)
                                <div class="col-md-6">
                                    <div >
                                        <label for="driver" class="col-md-6 control-label">{{$service->name}} [litre/month]</label>
                                        <div class="col-md-12">
                                            <input  type="float" tabindex="3" class="form-control " name="services[{{$service->id}}]" value="{{$service->quotaByStaffVehicleId($staff_veh->id)}}" >
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>


                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Updated
                                </button>
                                <a href="{{url('/admin/staff_vehicle')}}" class="btn btn-warning reset">

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
            debugger;
            var type = $('#ownership').val()
            debugger;
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

        function getinfo() {
            var vehicle_id = $('#ovehicle').val()
            debugger
            if (vehicle_id >0 ){
                debugger
                $.ajax({
                    type:"GET",
                    url:window.Laravel.base_url+'/admin/staff_vehicle/getvehicledetail',
                    data:{vehicle_id: vehicle_id},
                    success:function (data) {
                        $('.ajax').html(data);
                        debugger
                    },
                    error:function (error) {
                        debugger

                    }
                });
            }
            else {
                $(".staffdetail").html("");

            }

        }

    </script>



@endsection