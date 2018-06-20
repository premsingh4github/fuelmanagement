<div class="form-group col-sm-6 {{ $errors->has('logo') ? ' has-error' : '' }}">
    <label for="email">District:  <span class="glyphicon glyphicon-asterisk" style="color: red; "></span></label>
    <select class="form-control" name="district" id="district" value="{{old('district')}}"  required autofocus >
        <option value="">Choose Type</option>
        @foreach($districts as $district)
            <option value="{{$district->id}}">{{$district->name}}</option>
        @endforeach
    </select>
</div>