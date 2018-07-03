@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                        <label for="date" class="col-md-6 "> Fuel Detail:  </label>


                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff'),'method'=>'POST','class'=>'form-horizontal']) !!}


                        <div class="alert alert-info" >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-6 ">Date:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->date}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-6 ">Staff:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->staff->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-6 ">Month:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{config('custom.nepali_months')[$fuel->month_id]}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-6 ">Mode:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->mode}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-8 ">Petrolpump Name:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{--@if($fuel->petrolpump_id != '1')--}}
                                                {{$fuel->petrolpump->name}}
                                            {{--@else--}}
                                                {{--{{$fuel->other}}--}}
                                            {{--@endif--}}
                                        </div>
                                    </div>
                                </div>
                                @foreach($fuel->fuel_services as $service)
                                    <div class="col-md-4">
                                        <div >
                                            <label for="date" class="col-md-8 ">{{$service->vehicle_service->service->name}}:  </label>
                                            {{--<label>Name:</label>--}}
                                            <div class="col-md-9">
                                                {{$service->quantity}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-8 ">Receiver Name:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->receiver->name}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>


                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

                                <a href="{{url('/admin/fuel')}}" class="btn btn-warning reset">

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
