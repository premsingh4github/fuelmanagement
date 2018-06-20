@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/fuel'),'method'=>'POST','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Date  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="date" type="text" tabindex="1" class="form-control nepali-calender" name="date" value="" required autofocus>
                                        @if ($errors->has('date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-md-6">
                                <div class="{{ $errors->has('staff_name') ? ' has-error' : '' }}">
                                    <label for="staff_name" class="col-md-6 control-label">Staff Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select name="staff_name" id="staff_name"  tabindex="2" class="form-control" required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach($staff as $type)
                                                <option value='{{$type->id}}'> {{$type->name}} </option>";
                                            @endforeach
                                        </select> @if ($errors->has('staff_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('staff_name') }}</strong>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('mode') ? ' has-error' : '' }}">
                                    <label for="mode" class="col-md-6 control-label">Mode <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input type="radio" name="mode" value="Cash" onclick=getamount()> Cash<br>
                                        <input type="radio" name="mode" value="Copon" onclick=hideamount()> Copon<br> @if ($errors->has('mode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mode') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none"id="amount" >
                                <div class="amountt"  >
                                    <div class="{{ $errors->has('amount') ? ' has-error' : '' }} ui-widget">
                                        <label for="amount" class="col-md-8 control-label">Amount <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="amount" type="number" tabindex="1" class="form-control " name="amount" value="" required autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('petrolpump_name') ? ' has-error' : '' }} ui-widget">
                                    <label for="petrolpump_name" class="col-md-8 control-label">PetrolPump Name <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                    <div class="col-md-12">
                                        <select name="petrolpump_name" id ='petrolpump_name'   onchange= change() tabindex="6" class="form-control"  required autofocus>
                                            <option value="">Select one...</option>
                                            @Foreach(config('custom.petrolpumps') as $type => $item)
                                                <option value='{{$type}}'> {{$item}} </option>";
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="other_petrolpump" style="display: none-*">
                                    <div class="{{ $errors->has('other') ? ' has-error' : '' }}">
                                        <label for="office_vehicle" class="col-md-6 control-label">Other  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="personal_vehicle">
                                    <div class="{{ $errors->has('quantity') ? ' has-error' : '' }} ui-widget">
                                        <label for="vehicle_brand" class="col-md-8 control-label">Quantity <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="quantity" type="text"  onchange=checkQuantity() tabindex="3" class="form-control " name="quantity" value="" required autofocus>
                                            @if ($errors->has('quantity'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                                     </span>
                                            @endif

                                        </div>
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
                                    <label for="reciver_name" class="col-md-8 control-label">Reciver_name <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
                                    <div class="col-md-12">
                                        <input id="reciver_name" type="text" tabindex="3" class="form-control " name="reciver_name" value="" required autofocus>
                                        @if ($errors->has('reciver_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('reciver_name') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
        function change() {
            debugger;
            var type = $('#petrolpump_name').val()


            debugger;
            $('.other_petrolpump').hide();
            if(type == '1')
            {
            debugger
                $('.other_petrolpump').show();
                $('#other').attr('required','true');
            }
            else{
                debugger
                $('.other_petrolpump').hide();
                $('#other').removeAttr('required');
            }
        }
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

        function getamount() {
            debugger
            $('#amount').show()
            $('#amount').attr('required','true')

        }
        function hideamount() {
            debugger
            $('#amount').hide()
            $('#amount').removeAttr('required');
        }
    </script>



@endsection