@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add PetrolPump</div>
                    <div class="panel-body">
                        <div class="new-member-form">

                            <form action="{{url('admin/petrolpump')}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="Name">PetrolPump:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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



