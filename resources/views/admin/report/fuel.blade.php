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
            Amount
        </th>
        <th class="text-center">
            PetrolPump
        </th>




    </tr>
    @foreach($fuels as $fuel)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$fuel->date}}</td>
            <td>{{$fuel->staff->name}}</td>
            <td>{{ config('custom.nepali_months')[$fuel->month_id]}}</td>
            <td>{{$fuel->mode}}</td>
            <td>{{$fuel->amount}}</td>
            <td>{{$fuel->petrolpump->name}}</td>



        </tr>
    @endforeach
</table>
