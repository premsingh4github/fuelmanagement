@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('includes.error')
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/report'),'method'=>'POST','class'=>'form-horizontal','id'=>'myform']) !!}
                        <div class="row">
                            <div class="form-group col-sm-6 col-sm-offset-2">
                                <a href="{{url('admin/fuel')}}" class=" btn btn-sm  btn-warning" >Back</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('staff_name') ? ' has-error' : '' }}">
                                    <label for="staff_id" class="col-md-6 control-label">Type   </label>
                                    <div class="col-md-12">
                                        <select  name="type" id="type"  tabindex="2" class="form-control"  autofocus>
                                            <option value="">Select one...</option>
                                            <option value="o">Official</option>
                                            <option value="n">Non-Official</option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label for="start_date" class="col-md-6 control-label">Start Date   </label>
                                        <div class="col-md-12">
                                            <input id="start_date" type="text" tabindex="3" class="form-control nepali_date_past" name="start_date" value=""  required autofocus>
                                            @if ($errors->has('start_date'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('start_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                        <label for="end_date" class="col-md-6 control-label">End Date  </label>
                                        <div class="col-md-12">
                                            <input id="end_date" type="text" tabindex="3" class="form-control nepali_date_past" name="end_date" value="" required  autofocus>
                                            @if ($errors->has('end_date'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('end_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="{{ $errors->has('staff_name') ? ' has-error' : '' }}">
                                        <label for="staff_id" class="col-md-6 control-label">Staff Name   </label>
                                        <div class="col-md-12">
                                            <select  name="staff_id" id="staff_id"  tabindex="2" class="form-control"  autofocus>
                                                <option value="">Select one...</option>
                                                @foreach($staffs as $type)
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
                                    <div class="{{ $errors->has('mode') ? ' has-error' : '' }}">
                                        <label for="mode" class="col-md-6 control-label">Mode  </label>
                                        <div class="col-md-12">
                                            <select  name="mode" id="mode"  tabindex="2" class="form-control"  autofocus>
                                                <option value="">Select one...</option>

                                                <option value='copon'> Copon </option>";
                                                <option value='cash'> Cash </option>";

                                            </select>
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
                                <div class="col-md-6">
                                    <div class="{{ $errors->has('petrolpump_name') ? ' has-error' : '' }} ui-widget">
                                        <label for="petrolpump_name" class="col-md-8 control-label">PetrolPump Name </label>
                                        <div class="col-md-12">
                                            <select name="petrolpump_name" id ='petrolpump_name'   onchange="petrolpumpChange()" tabindex="6" class="form-control"   autofocus>
                                                <option value="">Select one...</option>
                                                {{--<option value='0'> OTHERS </option>";--}}

                                                @foreach($petrolpump as $type)
                                                    <option value='{{$type->id}}'> {{$type->name}} </option>";
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="{{ $errors->has('reciver_name') ? ' has-error' : '' }} ui-widget">
                                        <label for="receiver_id" class="col-md-8 control-label">Reciver Name</label>
                                        <div class="col-md-12">
                                            <select name="receiver_id" id="receiver_id"  class="form-control"  autofocus>
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


                            <div class="row">

                            </div>



                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Export
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