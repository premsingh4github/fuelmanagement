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
                                <a href="{{url('admin/staff/create')}}" class="btn-sm btn-success" >Add Staffs</a>
                            </div>
                        </div>
                            <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Joining Date</th>
                                    <th>Licence No</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($staffs as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->designation->name}}</td>
                                        <td>{{$user->joining_date}}</td>
                                        <td>{{$user->licence_no}}</td>


                                    <td>
                                            <a href="{{ url('admin/staff/' . $user->id) }}" class="btn btn-sm btn-success" title="Show "><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                                            <a href="{{url('admin/staff/'.$user->id.'/edit')}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>

                                        @if($user->staff_vehicles()->count() == 0 )
                                            {!! Form::open([
                                                         'method'=>'DELETE',
                                                         'url' => ['admin/staff', $user->id],
                                                         'style' => 'display:inline'
                                                         ]) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete " />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                                            {!! Form::close() !!}
                                        @endif
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