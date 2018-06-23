@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>url('admin/staff/'.$staff->id),'method'=>'PUT','class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-6 control-label">Name  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="name" type="text" tabindex="1" class="form-control" name="name" value="{{$staff->name}}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('designation') ? ' has-error' : '' }}">
                                    <label for="designation" class="col-md-6 control-label">Designation  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <select name="designation"   tabindex="2" class="form-control" required autofocus>
                                            <option value="">Select one...</option>

                                            @foreach($des as $type )
                                                <option value='{{$type->id}}' @if($type == $staff->designation) selected @endif> {{$type->name}} </option>";
                                            @endforeach
                                        </select> @if ($errors->has('designation'))
                                                <strong>{{ $errors->first('designation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="{{ $errors->has('joining_date') ? ' has-error' : '' }}">
                                    <label for="joining_date" class="col-md-6 control-label">Joining Date  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
                                    <div class="col-md-12">
                                        <input id="joining_date" type="text" tabindex="3" class="form-control nepali-calender " name="joining_date" value="{{$staff->joining_date}}" required autofocus>
                                        @if ($errors->has('joining_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('joining_date') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="{{ $errors->has('licence_no') ? ' has-error' : '' }}">
                                    <label for="licence_no" class="col-md-6 control-label">Licence No   </label>
                                    <div class="col-md-12">
                                        <input id="licence_no" type="text" tabindex="3" class="form-control " name="licence_no" value="{{$staff->licence_no}}" >
                                        @if ($errors->has('licence_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('licence_no') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="{{ $errors->has('status') ? ' has-error' : '' }} ui-widget">
                                    <label for="document_type_id" class="col-md-8 control-label">Status <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>

                                    <div class="col-md-12">
                                        <select name="status" id="status"  tabindex="4" class="form-control"  onchange=change() required autofocus>
                                            <option value="">Select one...</option>
                                            @foreach(config('custom.status') as $type => $item)
                                                <option value='{{$type}}' @if($type == $staff->status) selected @endif> {{$item}} </option>";

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{url('/admin/staff')}}" class="btn btn-warning reset">

                                    Back

                                </a>
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
        // $(function() {
        //     $('#vehicle_type').change(function(){
        //         $(this).val()
        //         if(this.value == "1") {
        //             $('.notbike').hide();
        //
        //         } else {
        //             $('.notbike').show();
        //         }
        //     });
        // });

        function change() {
            debugger;
            var type = $('#vehicle_ownership').val()


            debugger;
            if(type == '1')
            {
                $('.official').hide();
                $('.personal_vehicle').show();
                $('#personal_vehicle').attr('required','true');
                $('#official').removeAttr('required');

            }
            else{
                $('.personal_vehicle').hide();
                $('.official').show();
                $('#official').attr('required','true');
                $('#personal_vehicle').removeAttr('required');

            }
        }

    </script>



@endsection