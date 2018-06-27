@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/report'),'method'=>'POST','class'=>'form-horizontal']) !!}

                        @if (Session::has('success_message'))
                            <div class="alert alert-success">{{ Session::get('success_message') }}</div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label"> Date  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="date" type="text" tabindex="3" class="form-control nepali_date_past" name="date" value="" required autofocus>
                                        @if ($errors->has('date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('date') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-6 control-label">Field  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select onchange=docu() name="vehicle_type" id ='field'   tabindex="6" class="form-control"  required autofocus>
                                            <option value="">Select one...</option>
                                            @Foreach(config('custom.report_field') as $type => $item)
                                                <option value='{{$type}}'> {{$item}} </option>";
                                            @endforeach
                                        </select>  @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit"   class="btn btn-primary">
                                    Export
                                </button>
                                <button type="reset" tabindex="9" class="btn btn-warning reset">
                                    Reset
                                </button>
                            </div>
                        </div>

                        {!! form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>
        function getexcel() {


        }
    function docu() {
        debugger
        var field = $('#field').val()
        debugger

        if (field >0 ){
            debugger
            $.ajax({
                type:"GET",
                url:window.Laravel.base_url+'/admin/getreport',
                data:{field: field},
                success:function (data) {
                    $('.ajax').html(data);
                    debugger
                },
                error:function (error) {
                    debugger

                }
            });
        }
        else {
            $(".staffdetail").html("");

        }

    }



    </script>



@endsection