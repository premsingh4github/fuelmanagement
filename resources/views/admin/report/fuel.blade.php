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
                @foreach($fuel->fuel_services as $service)
                    {{$service->name}}
                    @endforeach

            </td>
            <td>@foreach($fuel->fuel_services  as  $service)
                    {{$service->quantity}}
                @endforeach

            </td>





        </tr>
    @endforeach
</table>
