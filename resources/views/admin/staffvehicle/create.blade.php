@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff_vehicle'),'method'=>'POST','class'=>'form-horizontal','id'=>'myform']) !!}

                        <div class="row">
                            @include('includes.error')
                            <div class="col-md-6">
                                <div class="{{ $errors->has('staff') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Staff  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">

                                        <select id="staff_id" name="staff"   tabindex="2" class="form-control" onchange="getStaffdetail()" required autofocus>
                                        <option value="">Select one...</option>
                                        @foreach($staffs as $type)
                                        <option value='{{$type->id}}'> {{$type->name}} </option>";
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
                                            <option value="1">Official</option>
                                            <option value="0">Personal</option>
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
                            <div id="staff_detail">

                            </div>
                        </div>
                        <div class="row" id="vehicle_container">
                            <div class="ajax">
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{url('admin/staff_vehicle')}}" tabindex="9" class="btn btn-warning reset">
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
@endsection