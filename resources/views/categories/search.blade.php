<form  action="">
    <input type="search" name="search" value="{{$search_name}}">
    <button type="submit">search</button>
</form>

<table>
    <th>id</th>
    <th>name</th>
    <th>photo</th>
    <th>edit</th>
    <th>update</th>

    @foreach($categories as $alls)
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
