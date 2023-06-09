<form action="{{route('service_images.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <input name="service_id" type="number"><br><br>
    <input name="path" type="file"><br><br>

    <button type="submit">submit</button>

</form>
