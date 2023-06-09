<form action="{{route('categories.update',$cat->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf

    <input name="name" type="text" value="{{$cat->name}}"><br><br>
    <input name="path" type="file" value="{{$cat->name}}"><br><br>

    <button type="update">submit</button>

</form>
