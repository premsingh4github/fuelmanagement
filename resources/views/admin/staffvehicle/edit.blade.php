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

                                        <select name="ownership"  id="ownership" tabindex="2" class="form-control" onchange="ownershipChanged()" required autofocus>
                                            <option value="">Select one...</option>
                                            <option value="1"  @if(1 == $staff_veh->ownership) selected @endif>Official</option>
                                            <option value="0"  @if(0 == $staff_veh->ownership) selected @endif>Personal</option>
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
                        <div class="row" id="vehicle_container">
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