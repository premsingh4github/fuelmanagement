@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Designation</div>
                    <div class="panel-body">
                        <div class="new-member-form">

                            <form action="{{url('admin/designation')}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="Name">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                    <div class="form-group col-sm-6 {{ $errors->has('level') ? ' has-error' : '' }}">
                                        <label for="code">Level:</label>
                                        <input type="number" name="level" id="level" class="form-control" value="{{old('level')}}">
                                        @if ($errors->has('level'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <input type="submit" name="submit" id="submit" value="Add" class="form-control btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



