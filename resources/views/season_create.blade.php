<!DOCTYPE html>
<html>
<body>
<form method="POST" action="{{ route('seasons.store_descriptions') }}">
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
    <label for="description">Описание времени года</label>
    <br>
    <textarea id="description" name="description"></textarea>
    <br>
    <button type="submit">Отправить</button>
</form>
</body>
</html>