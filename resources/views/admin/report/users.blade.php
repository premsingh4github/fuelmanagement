<table>
    <tr>
        <th class="text-center">
            S.N.
        </th>
        <th class="text-center">
            Name
        </th>
        <th class="text-center">
            Email
        </th>
        <th class="text-center">
            Type
        </th>
        <th class="text-center">
            Status
        </th>



    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td> @if($user->type == 2)User  @endif</td>
            <td> @if($user->status == 1)Active @endif</td>
        </tr>
    @endforeach
</table>
