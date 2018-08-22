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
                                <a href="{{url('admin/fuel/create')}}" class="btn-sm btn-success" >Add Fuel</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTable no-footer">
                            <tr>
                                <th>SN</th>
                                <th>Staff Name</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Mode</th>
                                <th>Action</th>
                            </tr>
                            @foreach($fuels as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->staff->name}}</td>
                                    <td>{{$user->date}}</td>
                                    <td>{{config('custom.nepali_months')[$user->month_id]}}</td>
                                    <td>{{$user->mode}}</td>

                                    <td>
                                        <a href="{{ url('admin/fuel/' . $user->id) }}" class="btn btn-sm btn-success" title="Show "><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                        <a href="{{ url('admin/fuel/print/' . $user->id) }}" class="btn btn-sm btn-success" title="Print "><span class="glyphicon glyphicon-print" aria-hidden="true"/></a>
                                    @if(Auth::user()->type == '1' && $user->last() )
                                        <a href="{{url('admin/fuel/'.$user->id.'/edit')}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>
                                        {!! Form::open([
                                                     'method'=>'DELETE',
                                                     'url' => ['admin/fuel', $user->id],
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