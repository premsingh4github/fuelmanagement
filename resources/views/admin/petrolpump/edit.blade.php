@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit PetrolPump</div>
                    <div class="panel-body">
                        <div class="new-member-form">
                            {!! Form::open(['url'=>url('admin/petrolpump/'.$pump->id),'method'=>'PUT','class'=>'form-horizontal','id'=>'myform']) !!}



                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="Name">PetrolPump:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$pump->name}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <input type="submit" name="submit" id="submit" value="Update" class="form-control btn btn-success">
                                    </div>
                                </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



