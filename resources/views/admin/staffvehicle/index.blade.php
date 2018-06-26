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
                                <a href="{{url('admin/staff_vehicle/create')}}" class="btn-sm btn-success" >Add Staff Vehicle</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTable no-footer">
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Ownership</th>
                                <th>Driver</th>
                                <th>Action</th>

                            </tr>
                            @foreach($staff_veh as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->staff->name}}</td>
                                    <td> @if ($user->ownership == '1')
                                            <div>Official</div>
                                        @else
                                            <div>Personal</div>
                                        @endif</td>
                                    <td>{{$user->driver?$user->driver->name:'Self'}}</td>


                                    <td>
                                        <a href="{{ url('admin/staff_vehicle/' . $user->id) }}" class="btn btn-sm btn-success" title="Show "><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                                        <a href="{{url('admin/staff_vehicle/'.$user->id.'/edit')}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>


                                        {!! Form::open([
                                                     'method'=>'DELETE',
                                                     'url' => ['admin/staff_vehicle', $user->id],
                                                     'style' => 'display:inline'
                                                     ]) !!}
                                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete " />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                                        {!! Form::close() !!}
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