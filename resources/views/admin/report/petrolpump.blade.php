<table>
    <tr>
        <th class="text-center">
            S.N.
        </th>
        <th class="text-center">
            Name
        </th>



    </tr>
    @foreach($petrolpump as $petrolpum)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$petrolpum}}</td>
        </tr>
    @endforeach
</table>
