@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="dashboardItems">
                        <li class="curveSmall"> <a href="{{url('admin/staff')}}"><i class="glyphicon glyphicon-user"></i><p>STAFFS</p></a> </li>
                        <li class="curveSmall"> <a href="{{url('admin/fuel')}}"><i class="glyphicon glyphicon-user"></i><p>FUEL</p></a> </li>
                        <li class="curveSmall"> <a href="{{url('admin/vehicle')}}"><i class="glyphicon glyphicon-user"></i><p>VEHICLES</p></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
