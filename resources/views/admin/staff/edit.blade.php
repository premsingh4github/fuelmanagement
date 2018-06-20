@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff/'.$staff->id),'method'=>'PUT','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="name" type="text" tabindex="1" class="form-control" name="name" value="{{$staff->name}}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('designation') ? ' has-error' : '' }}">
                                    <label for="designation" class="col-md-6 control-label">Designation  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select name="designation"   tabindex="2" class="form-control" required autofocus>
                                            <option value="">Select one...</option>

                                            @foreach($des as $type )
                                                <option value='{{$type}}' @if($type == $staff->designation_id) selected @endif> {{$type->name}} </option>";

                                            @endforeach
                                        </select> @if ($errors->has('designation'))
                                                <strong>{{ $errors->first('designation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('joining_date') ? ' has-error' : '' }}">
                                    <label for="joining_date" class="col-md-6 control-label">Joining Date  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="joining_date" type="text" tabindex="3" class="form-control nepali-calender " name="joining_date" value="{{$staff->joining_date}}" required autofocus>
                                        @if ($errors->has('joining_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('joining_date') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('licence_no') ? ' has-error' : '' }}">
                                    <label for="licence_no" class="col-md-6 control-label">Licence No  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="licence_no" type="text" tabindex="3" class="form-control " name="licence_no" value="{{$staff->licence_no}}" required autofocus>
                                        @if ($errors->has('licence_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('licence_no') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_ownership') ? ' has-error' : '' }} ui-widget">
                                    <label for="document_type_id" class="col-md-8 control-label">Vehicle OwnerShip <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <select name="vehicle_ownership" id="vehicle_ownership"  tabindex="4" class="form-control"  onchange=change() required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach(config('custom.vehicle_ownership') as $type => $item)
                                                <option value='{{$type}}' @if($type == $staff->vehicle_ownership) selected @endif> {{$item}} </option>";

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('vehicle_type') ? ' has-error' : '' }} ui-widget">
                                    <label for="document_type_id" class="col-md-8 control-label">Vehicle Type <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <select name="vehicle_type" id ='vehicle_type'   tabindex="6" class="form-control"  required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach(config('custom.vehicle_type') as $type => $item)
                                                <option value='{{$type}}' @if($type == $staff->vehicle_type)  selected @endif> {{$item}} </option>";
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="official">
                                    <div class="{{ $errors->has('office_vehicle') ? ' has-error' : '' }}">
                                        <label for="office_vehicle" class="col-md-6 control-label">Vehicle  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                        <div class="col-md-12">
                                            <select name="office_vehicle" id ='office_vehicle'   tabindex="6" class="form-control"  required autofocus>
                                                <option value="">Select one...</option>

                                                @foreach( $vehicle as $type => $item)
                                                    <option value='{{$type}}' @if( $type == $staff->office_vehicle)  selected @endif> {{config('custom.vehicle_type')[$item->type]}}___{{$item->brand}}__{{$item->vehicle_no}} </option>";
                                                @endforeach
                                            </select>
                                            @if ($errors->has('office_vehicle'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('office_vehicle') }}</strong>
                                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="personal_vehicle">
                                    <div class="{{ $errors->has('vehicle_brand') ? ' has-error' : '' }} ui-widget">
                                        <label for="vehicle_brand" class="col-md-8 control-label">Vehicle Brand & No. <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                        <div class="col-md-12">
                                            <input id="vehicle_brand" type="text" tabindex="3" class="form-control " name="vehicle_brand" value="{{$staff->vehicle_brand}}" required autofocus>
                                            @if ($errors->has('vehicle_brand'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('vehicle_brand') }}</strong>
                                                     </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('mileage') ? ' has-error' : '' }} ui-widget">
                                    <label for="mileage" class="col-md-8 control-label">Mileage <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <input id="mileage" type="number" tabindex="3" class="form-control " name="mileage" value="{{$staff->mileage}}" required autofocus>
                                        @if ($errors->has('mileage'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mileage') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="{{ $errors->has('monthly_kota') ? ' has-error' : '' }}">
                                    <label for="monthly_kota" class="col-md-6 control-label">Monthly Kota  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="monthly_kota" type="number" tabindex="3" class="form-control " name="monthly_kota" value="{{$staff->monthly_kota}}" required autofocus>


                                        @if ($errors->has('monthly_kota'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('monthly_kota') }}</strong>
                                                         </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="{{ $errors->has('engine_oil') ? ' has-error' : '' }} ui-widget">
                                    <label for="engine_oil" class="col-md-8 control-label">Engine Oil <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <input id="engine_oil" type="number" tabindex="3" class="form-control " name="engine_oil" value="{{$staff->engine_oil}}" required autofocus>
                                        @if ($errors->has('engine_oil'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('engine_oil') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('driving_person_name') ? ' has-error' : '' }} ui-widget">
                                    <label for="driving_person_name" class="col-md-8 control-label">Driving Person Name <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <select name="driving_person_name" id ='driving_person_name'   tabindex="6" class="form-control"  required autofocus>
                                            <option value="">Select one...</option>
                                            <option value="1">Self</option>
                                            {{--@Foreach(config('custom.vehicle_type') as $type => $item)--}}
                                            {{--<option value='{{$type}}'> {{$item}} </option>";--}}
                                            {{--@endforeach--}}
                                        </select>
                                        @if ($errors->has('driving_person_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('driving_person_name') }}</strong>
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
                                    Update
                                </button>
                                <a href="{{url('/admin/staff')}}" class="btn btn-warning reset">

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
        // $(function() {
        //     $('#vehicle_type').change(function(){
        //         $(this).val()
        //         if(this.value == "1") {
        //             $('.notbike').hide();
        //
        //         } else {
        //             $('.notbike').show();
        //         }
        //     });
        // });

        function change() {
            debugger;
            var type = $('#vehicle_ownership').val()


            debugger;
            if(type == '1')
            {
                $('.official').hide();
                $('.personal_vehicle').show();
                $('#personal_vehicle').attr('required','true');
                $('#official').removeAttr('required');

            }
            else{
                $('.personal_vehicle').hide();
                $('.official').show();
                $('#official').attr('required','true');
                $('#personal_vehicle').removeAttr('required');

            }
        }

    </script>



@endsection