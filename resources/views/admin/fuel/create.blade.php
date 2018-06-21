@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('includes.error')
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/fuel'),'method'=>'POST','class'=>'form-horizontal','id'=>'myform']) !!}

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
                                <div class="{{ $errors->has('staff_name') ? ' has-error' : '' }}">
                                    <label for="staff_id" class="col-md-6 control-label">Staff Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select onchange="updateService()" name="staff_id" id="staff_id"  tabindex="2" class="form-control" required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach($staff as $type)
                                                <option value='{{$type->id}}'> {{$type->name}} </option>";
                                            @endforeach
                                        </select> @if ($errors->has('staff_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('staff_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="{{ $errors->has('month') ? ' has-error' : '' }}">
                                    <label for="month" class="col-md-6 control-label">Month <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select name="month" id="month"  tabindex="4" class="form-control"   required autofocus>
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
                                        <input type="radio" name="mode" value="Cash" onclick=getamount()> Cash
                                        <input type="radio" name="mode" value="Copon" onclick=hideamount()> Copon<br> @if ($errors->has('mode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mode') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-6" style="display: none"id="amount_container" >
                                <div class="amountt"  >
                                    <div class="{{ $errors->has('amount') ? ' has-error' : '' }} ui-widget">
                                        <label for="amount" class="col-md-8 control-label">Amount <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="amount" type="number" class="form-control " name="amount" value="" required autofocus>

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
                                            @Foreach(config('custom.petrolpumps') as $type => $item)
                                                <option value='{{$type}}'> {{$item}} </option>";
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
                        <div class="ajax">

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('current_km') ? ' has-error' : '' }} ui-widget">
                                    <label for="mileage" class="col-md-8 control-label">Current Km <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <input id="current_km" type="number" tabindex="3" class="form-control " name="current_km" value="" required autofocus>
                                        @if ($errors->has('current_km'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current_km') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="{{ $errors->has('previous_km') ? ' has-error' : '' }} ui-widget">
                                    <label for="previous_km" class="col-md-8 control-label">Previous Km <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                    <div class="col-md-12">
                                        <input id="previous_km" type="number" tabindex="3" class="form-control " name="previous_km" value="" required autofocus>
                                        @if ($errors->has('previous_km'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('previous_km') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('reciver_name') ? ' has-error' : '' }} ui-widget">
                                    <label for="receiver_id" class="col-md-8 control-label">Reciver Name<span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                    <div class="col-md-12">
                                        <select name="receiver_id" id="receiver_id"  class="form-control" required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach($staffs as $type)
                                                <option value='{{$type->id}}'> {{$type->name}} </option>";
                                            @endforeach
                                        </select> @if ($errors->has('receiver_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('receiver_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
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

        function  checkQuantity() {
            debugger
            var staff_id = $('#staff_name').val();
            var month_id = $('#month').val();
            var quantity = $('#quantity').val();
            debugger
            if( (staff_id > 0) && (month_id > 0) && (quantity > 0) ){
                $.ajax({
                    type: "GET",
                    url: window.Laravel.base_url+'/checkquantity',
                    data: {staff_id: staff_id,month_id: month_id, quantity: quantity},
                    success:function (data) {
                        $('#message').html(data);
                        debugger
                    },
                    error:function (error) {
                        debugger
                    }
                });
            }
        }


    </script>



@endsection