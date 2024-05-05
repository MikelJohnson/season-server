<!DOCTYPE html>
<html>
<body>
<form method="POST" action="{{ route('seasons.store_images') }}" enctype="multipart/form-data">
    @csrf
    <label for="season">Время года</label>
    <br>
    <select id="season" name="season">
        <option value="winter">Зима</option>
        <option value="spring">Весна</option>
        <option value="summer">Лето</option>
        <option value="fall">Осень</option>
    </select>
    <br>
    <label for="image_file">Фото</label>
    <br>
    <input type="file" id="image_file" name="image_file"></textarea>
    <br>
    <button type="submit">Отправить</button>
</form>
</body>
</html>