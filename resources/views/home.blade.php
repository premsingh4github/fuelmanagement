@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="dashboardItems">
                            <li class="curveSmall"> <a href="{{url('admin/staff')}}"><i class="glyphicon glyphicon-user"></i><p>STAFFS</p></a> </li>
                            <li class="curveSmall"> <a href="{{url('admin/fuel')}}"><i class="glyphicon glyphicon-user"></i><p>FUELS</p></a> </li>
                            <li class="curveSmall"> <a href="{{url('admin/vehicle')}}"><i class="glyphicon glyphicon-user"></i><p>VEHICLES</p></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('style')
    <style>
        ul.dashboardItems {
            padding: 0px;
            margin:0px;
            text-align: center;
        }
        ul.dashboardItems li {
            background: none repeat scroll 0 0 #fff;
            border: 1px solid #b3b2b3;
            float: none;
            height: 100px;
            margin: 5px;
            overflow: hidden;
            text-align: center;
            width: 214px;
            box-shadow: inset 1px 1px 19px #ccc;
            border-radius: 8px;
            display: inline-block;
        }

        ul.dashboardItems li:hover {
            background: #eee;
            transition:0.5s;
        }
        ul.dashboardItems li i {
            clear: both;
            margin: 10px;
        }
        ul.dashboardItems li img {
            clear: both;
            margin: 10px;
            height: 48px;
            width: 48px;
        }
        ul.dashboardItems li p {
            margin: 0;
        }
        ul.dashboardItems li a {
            color: #333;
            font-size:14px;
            text-decoration: none;
        }
        ul.dashboardItems li a:hover {
            color: #000;
            text-decoration: none;
        }
    </style>
@endsection