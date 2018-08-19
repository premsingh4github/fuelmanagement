@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('includes.error')
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('nonofficialfuels'),'method'=>'POST','class'=>'form-horizontal','id'=>'myform']) !!}
                       @include('nonofficialfuels.form')
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
        function  checkQuantity() {
            var staff_id = $('#staff_name').val();
            var month_id = $('#month').val();
            var quantity = $('#quantity').val();
            if( (staff_id > 0) && (month_id > 0) && (quantity > 0) ){
                $.ajax({
                    type: "GET",
                    url: window.Laravel.base_url+'/checkquantity',
                    data: {staff_id: staff_id,month_id: month_id, quantity: quantity},
                    success:function (data) {
                        $('#message').html(data);
                        debugger
                    },
                    error:function (error) {
                        debugger
                    }
                });
            }
        }
        function getStaffdetailforfuel() {
            getStaffdetail();
            updateService();
            getCurrentMeters();
        }
    </script>



@endsection