<table>
    <tr>
        <th class="text-center">
            S.N.
        </th>
        <th class="text-center">
            Staff
        </th>
        <th class="text-center">
            Vehicle
        </th>
        <th class="text-center">
            Ownership
        </th>
        <th class="text-center">
            Driver
        </th>
        <th class="text-center">
            Current Km
        </th>
        <th class="text-center">
            Previous Km
        </th>


    </tr>
    @foreach($staffvehicles as $staffvehicle)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$staffvehicle->staff->name}}</td>
            <td>{{$staffvehicle->vehicle_id}}</td>
            <td>{{$staffvehicle->ownership}}</td>
            <td>{{$staffvehicle->driver}}</td>
            <td>{{$staffvehicle->current_meter}}</td>
            <td>{{$staffvehicle->previous_meter}}</td>


        </tr>
    @endforeach
</table>
