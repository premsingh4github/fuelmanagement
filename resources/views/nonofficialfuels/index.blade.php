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
                                <a href="{{url('nonofficialfuels/create')}}" class="btn-sm btn-success" >Add Non-Official Fuel</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTable no-footer">
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Organization</th>
                                <th>Month</th>
                                <th>Vehicle No</th>
                                <th>Mode</th>
                                <th>Action</th>
                            </tr>
                            @foreach($fuels as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->organization}}</td>
                                    <td>{{$user->vehicle_no}}</td>
                                    <td>{{config('custom.nepali_months')[$user->month_id]}}</td>
                                    <td>{{$user->mode}}</td>

                                    <td>
                                        <a href="{{ url('nonofficialfuels/' . $user->id) }}" class="btn btn-sm btn-success" title="Show "><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                        <a href="{{ url('nonofficialfuels/print/' . $user->id) }}" class="btn btn-sm btn-success" title="Print "><span class="glyphicon glyphicon-print" aria-hidden="true"/></a>
                                    @if(Auth::user()->type == '1' )
                                        <a href="{{url('nonofficialfuels/'.$user->id.'/edit')}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i></a>
                                        {!! Form::open([
                                                     'method'=>'DELETE',
                                                     'url' => ['nonofficialfuels', $user->id],
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