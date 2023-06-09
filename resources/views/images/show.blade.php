
<table>
    <th>id</th>
    <th>service_id</th>
    <th>photo</th>
    <th>edit</th>
    <th>update</th>

    @foreach($images as $alls)
        <tr>
            <td>{{$alls->id}}</td>
            <td>{{$alls->name}}</td>
            <td><img src="{{asset('images/images/'.$alls->path)}}" height="50px" width="50px"></td>
            <td>
                <a href="{{route('service_images.edit',$alls->id)}}" >update</a>
            <td>
                <form action="{{route('service_images.destroy',$alls->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
