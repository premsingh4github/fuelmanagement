<div class="col-md-6">
    <div class="">
        <label for="ovehicle" class="col-md-6 control-label">Current Meter  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
        <div class="col-md-12">
            <input type="number" min="{{$previous_meter}}" name="current_km" class="form-control" required autofocus>
        </div>
    </div>

</div>

<div class="col-md-6">
    <div class="">
        <label for="ovehicle" class="col-md-6 control-label">Previous Meter  <span class="glyphicon glyphicon-asterisk" style="color: red; "> </span> </label>
        <div class="col-md-12">
            <input type="number" name="current_km" value="{{$previous_meter}}" class="form-control" disabled >
    </div>
    </div>
</div>