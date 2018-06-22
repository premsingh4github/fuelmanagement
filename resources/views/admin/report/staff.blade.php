
<table>
    <tr>
        <th class="text-center">
            S.N.
        </th>
        <th class="text-center">
           Staff Name
        </th>


    </tr>
    @foreach($staffs as $staff)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$staff->name}}</td>

        </tr>
    @endforeach
</table>
