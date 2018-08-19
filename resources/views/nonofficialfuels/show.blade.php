@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                        <label for="date" class="col-md-6 "> Non-Officail Fuel Detail:  </label>


                    <div class="panel-body">
                        {!! Form::open(['url'=>url('nonofficialfuels'),'method'=>'POST','class'=>'form-horizontal']) !!}


                        <div class="alert alert-info" >

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
                                        <label for="date" class="col-md-6 ">Name:  </label>
                                        <div class="col-md-9">
                                            {{$fuel->name}}
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
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-6 ">Mode:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->mode}}
                                        </div>
                                    </div>
                                </div>
                                @if($fuel->mode == 'coupon')
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-6 ">Coupon No.:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->coupon}}
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="col-md-4">
                                        <div >
                                            <label for="date" class="col-md-6 ">Amount:  </label>
                                            {{--<label>Name:</label>--}}
                                            <div class="col-md-9">
                                                {{$fuel->amount}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-8 ">Petrolpump Name:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->petrolpump->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-8 ">Petrol[Litre] :  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->petrol}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-8 ">Engine Oil :  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->engine_oil}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div >
                                        <label for="date" class="col-md-8 ">Receiver Name:  </label>
                                        {{--<label>Name:</label>--}}
                                        <div class="col-md-9">
                                            {{$fuel->receiver_name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

                                <a href="{{url('nonofficialfuels')}}" class="btn btn-warning reset">

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
