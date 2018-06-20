@if( $staff->capacity < $total_quantity )
    <div class="form-group">
        <label for="meter" class="col-md-6 col-md-offset-4 control-label">
        <div class="alert alert-warning" >
            Quantity become more than monthly limit.
        </div>
        </label>
    </div>
@endif
@if($staff->vehicle_type != '1')
    <div class="meter" >
        <div class="form-group">
            <label for="meter" class="col-md-4 control-label">Current Meter</label>
            <div class="col-sm-6">
                <input id="meter" type="text" tabindex="6" class="form-control" name="meter" required  autofocus>
            </div>
        </div>
    </div>
@endif