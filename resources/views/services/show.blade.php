
{{--<form  action="">--}}
{{--    <input type="search" name="search" value="{{$search_name}}">--}}
{{--    <button type="submit">search</button>--}}
{{--</form>--}}



<table>
    <th>id</th>
    <th>name</th>
    <th>description</th>
    <th>price</th>
    <th>edit</th>
    <th>update</th>

    @foreach($services as $alls)
        <tr>
            <td>{{$alls->id}}</td>
            <td>{{$alls->name}}</td>
            <td>{{$alls->description}}</td>
            <td>{{$alls->price}}</td>

            <td>
                <a href="{{route('services.edit',$alls->id)}}" >update</a>
            <td>
                <form action="{{route('services.destroy',$alls->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
