<form action="{{route('services.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <input name="name" type="text" placeholder="name"><br><br>
    <input name="description" type="text" placeholder="description"><br><br>
    <input name="price" type="number" placeholder="price"><br><br>
    <input name="category_id" type="text" placeholder="id">
    <button type="submit">submit</button>

</form>
