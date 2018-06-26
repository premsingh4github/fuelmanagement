<table>
    <tr>
        <th class="text-center">
            S.N.
        </th>
        <th class="text-center">
            Name
        </th>
        <th class="text-center">
            Level
        </th>


    </tr>
    @foreach($designation as $designatio)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$designatio->name}}</td>
            <td>{{$designatio->level}}</td>


        </tr>
    @endforeach
</table>
