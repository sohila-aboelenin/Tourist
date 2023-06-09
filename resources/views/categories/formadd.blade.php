<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <input name="name" type="text"><br><br>
    <input name="path" type="file">

    <button type="submit">submit</button>

</form>
