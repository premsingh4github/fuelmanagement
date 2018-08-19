@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('includes.error')
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::model($fuel,['url'=>url('nonofficialfuels/'.$fuel->id),'method'=>'PUT','class'=>'form-horizontal','id'=>'myform']) !!}
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
                                        <input id="nepalidate_today"  type="text" tabindex="1" class="form-control " name="date" value="{{$fuel->date}}" required autofocus disabled="disabled">
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
                                        <input  type="text" tabindex="1" class="form-control " name="name"  value="{{$fuel->name}}" required autofocus >
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
                                        {!! Form::text('organization',null,['class'=>'form-control','required'=>true]) !!}
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
                                        {!! Form::text('vehicle_no',null,['class'=>'form-control','required'=>true]) !!}
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
                                                <option @if($type == $fuel->month_id) selected @endif value='{{$type}}'> {{$item}} </option>";

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
                                        <input type="radio" @if('coupon' == $fuel->mode) checked @endif name="mode" value="coupon" onclick="hideamount()" checked /> Coupon

                                        <input type="radio" @if('cash' == $fuel->mode) checked @endif name="mode" value="cash" onclick="getamount()"> Cash
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
                            <div class="col-md-6" @if('cash' == $fuel->mode) style="display: none" @endif  id="coupon_container" >
                                <div class="amountt"  >
                                    <div class="{{ $errors->has('coupon') ? ' has-error' : '' }} ui-widget">
                                        <label for="coupon" class="col-md-8 control-label">Coupon Number <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="coupon" type="text" class="form-control " name="coupon" value="{{$fuel->coupon}}" >

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" @if('coupon' == $fuel->mode) style="display: none" @endif  id="amount_container" >
                                <div class="amountt"  >
                                    <div class="{{ $errors->has('amount') ? ' has-error' : '' }} ui-widget">
                                        <label for="amount" class="col-md-8 control-label">Amount <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="amount" type="number" class="form-control " name="amount" value="{{$fuel->amount}}" >

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
                                                <option @if($type->id == $fuel->petrolpump_id) selected @endif value='{{$type->id}}'> {{$type->name}} </option>";
                                            @endforeach
                                        </select>
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
                                            <input id="petrol" type="number" class="form-control " name="petrol" value="{{$fuel->petrol}}" >

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"  >
                                <div class="amountt"  >
                                    <div class="{{ $errors->has('engine_oil') ? ' has-error' : '' }} ui-widget">
                                        <label for="engine_oil" class="col-md-8 control-label">Engine Oil <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                        <div class="col-md-12">
                                            <input id="engine_oil" type="number" class="form-control " name="engine_oil" value="{{$fuel->engine_oil}}" >

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6"  >
                                <div class="amountt"  >
                                    <div class="{{ $errors->has('receiver_name') ? ' has-error' : '' }} ui-widget">
                                        <label for="receiver_name" class="col-md-8 control-label">Receiver Name <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="receiver_name" type="text" class="form-control " name="receiver_name" value="{{$fuel->receiver_name}}" >

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
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" tabindex="9" class="btn btn-warning reset">
                                    Reset
                                </button>
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
            getStaffdetailforfuel();
        });

        function getamount_edit() {
         var  mode_id = $('#mode').val();
         debugger;

            var  mode_id = $('#mode').val();
              if(mode_id=='Cash'){
                  $('#amount_container').slideDown();
              }
                $('#amount_container').slideDown();
                $('#amount').attr('required','true')

        }

        function  checkQuantity() {
            var staff_id = $('#staff_name').val();
            var month_id = $('#month').val();
            var quantity = $('#quantity').val();
            if( (staff_id > 0) && (month_id > 0) && (quantity > 0) ){
                $.ajax({
                    type: "GET",
                    url: window.Laravel.base_url+'/checkquantity',
                    data: {staff_id: staff_id,month_id: month_id, quantity: quantity},
                    success:function (data) {
                        $('#message').html(data);
                    },
                    error:function (error) {
                        debugger
                    }
                });
            }
        }
        function getStaffdetailforfuel() {
            getStaffdetail();
            //updateService();
            getCurrentMeters();
        }


    </script>



@endsection