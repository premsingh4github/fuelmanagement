<table>
    <tr>
        <th class="text-center" >
            S.N.
        </th>
        <th class="text-center" width="50%">
            Date
        </th>
        <th class="text-center" >
            Type
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
            Receiver
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
    <?php $total_diseal = $total_engine_oil = $total_petrol = 0; ?>
    @foreach($fuels as $fuel)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td width="500" >{{$fuel->date}}</td>
            <td> Official </td>
            <td>{{$fuel->staff->name}}</td>
            <td>{{ config('custom.nepali_months')[$fuel->month_id]}}</td>
            <td>

                @if($fuel->mode == 'cash')
                    {{$fuel->mode}} [{{$fuel->amount}}]
                @else
                    {{$fuel->mode}}
                @endif
            </td>
            <td>{{$fuel->petrolpump->name}}</td>
            <td>{{$fuel->receiver->name}}</td>
            <td>
                <?php $total_petrol += $petrol = $fuel->service_quantity(1); ?>
                {{$petrol}}

            </td>
            <td>
                <?php $total_diseal = $diseal = $fuel->service_quantity(2); ?>
                {{$diseal}}
            </td>
            <td>
                <?php $total_engine_oil = $engine = $fuel->service_quantity(3); ?>
                {{$engine}}
            </td>
            <td>
                @if($fuel->servicing == '1')
                    Yes
                @else
                    No
                @endif
            </td>
        </tr>
        <?php $o_count = $loop->iteration; ?>
    @endforeach
    @foreach($nonofficials as $fuel)
        <tr>
            <td>{{$o_count + $loop->iteration}}</td>
            <td width="500" >{{$fuel->date}}</td>
            <td> Non Official </td>
            <td>{{$fuel->name}} [{{$fuel->organization}}]</td>
            <td>{{ config('custom.nepali_months')[$fuel->month_id]}}</td>
            <td>
                @if($fuel->mode == 'cash')
                    {{$fuel->mode}} [{{$fuel->amount}}]
                @else
                    {{$fuel->mode}}
                @endif
            </td>
            <td>{{$fuel->petrolpump->name}}</td>
            <td>{{$fuel->receiver_name}}</td>
            <td>
                <?php  $total_petrol += $fuel->petrol; ?>
                {{$fuel->petrol}}
            </td>
            <td>
                <?php $total_diseal += $fuel->diseal ; ?>
                {{$fuel->diseal}}
            </td>
            <td>
                <?php $total_engine_oil += $fuel->engine_oil ; ?>
                {{$fuel->engine_oil}}
            </td>

            <td>

            </td>
        </tr>
    @endforeach
    <tr>
        <td>Total</td>
        <td width="500" ></td>
        <td> </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            {{$total_petrol}}
        </td>
        <td>
            {{$total_diseal}}
        </td>
        <td>
            {{$total_engine_oil}}
        </td>
        <td>

        </td>
    </tr>
</table>
