<table>
    <tr>
        <th class="text-center">
            S.N.
        </th>
        <th class="text-center">
            Type
        </th>
        <th class="text-center">
            Brand
        </th>
        <th class="text-center">
            Mileage
        </th>
        <th class="text-center">
            Engine No
        </th>
        <th class="text-center">
            Chassis No
        </th>
        <th class="text-center">
            Register Date
        </th>
        <th class="text-center">
            Vehicle No
        </th>
        <th class="text-center">
            Current km
        </th>


    </tr>
    @foreach($vehicles as $vehicle)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{config('custom.vehicle_types')[$vehicle->type]}}</td>
            <td>{{$vehicle->brand}}</td>
            <td>{{$vehicle->mileage}}</td>
            <td>{{$vehicle->engine_no}}</td>
            <td>{{$vehicle->chassis_no}}</td>
            <td>{{$vehicle->registered_date}}</td>
            <td>{{$vehicle->vehicle_no}}</td>
            <td>{{$vehicle->current_km}}</td>


        </tr>
    @endforeach
</table>
