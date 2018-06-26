@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff'),'method'=>'POST','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 "> Staff Detail:  </label>
                                    <input type="hidden"  id="staff_id" name="staff" value="{{$staff_veh->staff->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="staff_detail">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('designation') ? ' has-error' : '' }}">
                                    <label for="designation" class="col-md-6 ">Owner Ship:   </label>
                                    <div class="col-md-6">
                                        @if ($staff_veh->ownership == '1')
                                            <div>Official</div>
                                        @else
                                            <div>Personal</div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div >
                                    <label for="designation" class="col-md-6 ">Driver:   </label>
                                    <div class="col-md-12">
                                        {{($staff_veh->driver)?  $staff_veh->driver->name : "Self"}}
                                    </div>
                                </div>
                            </div>
                            @foreach($staff_veh->vehicle_services as $service)
                                <div class="col-md-4">
                                    <label for="licence_no" class="col-md-8 ">{{$service->service->name}} : </label>
                                    <div class="col-md-12">
                                        {{$service->quota}}  @if( ($service->service->id == 3) && ($staff_veh->vehicle->type == 1)  ) [litre/ 4 month] @else [litre/month] @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>





                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

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
        $(document).ready(function () {
            getStaffdetail();
           // getVehicleinfo();
        });
    </script>
@endsection