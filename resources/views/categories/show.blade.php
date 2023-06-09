
<table>
    <th>id</th>
    <th>name</th>
    <th>photo</th>
    <th>edit</th>
    <th>update</th>

    @foreach($all as $alls)
        <tr>
            <td>{{$alls->id}}</td>
            <td>{{$alls->name}}</td>
            <td><img src="{{asset('images/category/'.$alls->path)}}" height="50px" width="50px"></td>
            <td>
                <a href="{{route('categories.edit',$alls->id)}}" >update</a>
            <td>
                <form action="{{route('categories.destroy',$alls->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
