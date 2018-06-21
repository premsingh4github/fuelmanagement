@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Designation</div>
                    <div class="panel-body">
                        <div class="new-member-form">
                            @if (Session::has('success_message'))
                                <div class="alert alert-success">{{ Session::get('success_message') }}</div>
                            @endif
                            {!! Form::open(['url'=>url('admin/designation/'.$des->id),'method'=>'PUT']) !!}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <a href="{{url('/admin/designation')}}" class="btn-sm btn-primary" >Back</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="Name">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')? old('name') : $des->name}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">Level:</label>
                                        <input type="text" name="level" id="level" class="form-control" value="{{old('level')? old('level') : $des->level}}">
                                        @if ($errors->has('level'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <input type="submit" name="submit" value="Update" id="submit" class="form-control btn btn-success">
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


