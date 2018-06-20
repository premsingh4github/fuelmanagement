@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">{{ Session::get('success_message') }}</div>
                        @endif
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <a href="{{url('/admin/designation/create')}}" class="btn-sm btn-success" >Add Designation</a>
                                </div>
                            </div>
                            {!! Form::open(['method'=>'get']) !!}
                            <div class="input-group">
                                <input type="text"  class="form-control" value="{{request('name')}}" name="name" id="name" placeholder="Name">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <br>
                            <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Edit</th>
                                </tr>
                                @foreach($des as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->level}}</td>
                                        <td>
                                            <a href="{{url('admin/designation/'.$user->id.'/edit')}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{--{!! $branches !!}--}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


