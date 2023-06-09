<form action="{{route('service_images.update',$images->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf

    <input name="name" type="text" value="{{$images->service_id}}"><br><br>
    <input name="path" type="file" value="{{$images->path}}"><br><br>

    <button type="update">submit</button>

</form>
