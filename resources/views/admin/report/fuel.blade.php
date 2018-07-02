<table>
    <tr>
        <th class="text-center">
            S.N.
        </th>
        <th class="text-center">
            Date
        </th>
        <th class="text-center">
            Staff Name
        </th>
        <th class="text-center">
            Month
        </th>
        <th class="text-center">
            Mode
        </th>
        <th class="text-center">
            PetrolPump
        </th>
        <th class="text-center">
            Reciver
        </th>
        <th class="text-center">
            Petrol
        </th>
        <th class="text-center">
            Diseal
        </th>
        <th class="text-center">
            Engine Oil
        </th>
        <th class="text-center">
            Servicing
        </th>
    </tr>
    @foreach($fuels as $fuel)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$fuel->date}}</td>
            <td>{{$fuel->staff->name}}</td>
            <td>{{ config('custom.nepali_months')[$fuel->month_id]}}</td>
            <td>{{$fuel->mode}}</td>
            <td>{{$fuel->petrolpump->name}}</td>
            <td>{{$fuel->receiver->name}}</td>
            <td>
                {{$fuel->service_quantity(1)}}
            </td>
            <td>
                {{$fuel->service_quantity(2)}}
            </td>
            <td>
                {{$fuel->service_quantity(3)}}
            </td>
            <td>{{$fuel}}</td>
        </tr>
    @endforeach
</table>
