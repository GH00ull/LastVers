@extends('.home') @section('title') О Нас @endsection @section('content')
<main class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4">Панель администратора</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Бренд</th>
                <th class="py-2 px-4 border-b">Название</th>
                <th class="py-2 px-4 border-b">Цена</th>
                <th class="py-2 px-4 border-b">Пробег</th>
                <th class="py-2 px-4 border-b">Продавец</th>
                <th class="py-2 px-4 border-b">Город</th>
                <th class="py-2 px-4 border-b">состояние автомобяиля</th>
                <th class="py-2 px-4 border-b"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $item)
            <!-- Пример объявления для редактирования -->
            <tr>
                <td class="py-2 px-4 border-b">{{$item->brand->name}}</td>
                <td class="py-2 px-4 border-b">{{$item->title}}</td>
                <td class="py-2 px-4 border-b">{{$item->price}}$</td>
                <td class="py-2 px-4 border-b">{{$item->mileage}}км</td>
                <td class="py-2 px-4 border-b">{{$item->id_users}}</td>
                <td class="py-2 px-4 border-b">{{$item->city->name}}</td>
                <td class="py-2 px-4 border-b">{{$item->state}}</td>
                <td class="py-2 px-4 border-b">
                    <button class="text-blue-500 hover:text-blue-700" onclick="openEditModal()">Редактировать</button>
                </td>
            </tr>
            @endforeach
            <!-- Добавьте другие объявления для редактирования -->
        </tbody>

    </table>
</main>

<!-- Модальное окно для редактирования объявления -->
<!-- Модальное окно для редактирования объявления -->
<div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white w-1/2 p-8">
        <h2 class="text-2xl font-bold mb-4">Редактирование объявления</h2>
        <!-- Форма для редактирования объявления -->
        <form>
            <!-- Поля для редактирования информации об объявлении -->
            <div class="mb-4">
                <label for="brand" class="block font-semibold">Бренд:</label>
                <input type="text" id="brand" class="border border-gray-300 p-2 w-full" />
            </div>
            <div class="mb-4">
                <label for="name" class="block font-semibold">Название:</label>
                <input type="text" id="name" class="border border-gray-300 p-2 w-full" />
            </div>
            <div class="mb-4">
                <label for="price" class="block font-semibold">Цена:</label>
                <input type="text" id="price" class="border border-gray-300 p-2 w-full" />
            </div>
            <div class="mb-4">
                <label for="mileage" class="block font-semibold">Пробег:</label>
                <input type="text" id="mileage" class="border border-gray-300 p-2 w-full" />
            </div>
            <div class="mb-4">
                <label for="seller" class="block font-semibold">Продавец:</label>
                <input type="text" id="seller" class="border border-gray-300 p-2 w-full" />
            </div>
            <div class="mb-4">
                <label for="city" class="block font-semibold">Город:</label>
                <input type="text" id="city" class="border border-gray-300 p-2 w-full" />
            </div>
            <div class="flex justify-end">
                <button type="button" class="text-red-500 hover:text-red-700 mr-4"
                    onclick="deleteListing()">Удалить</button>
                <button type="button" class="text-blue-500 hover:text-blue-700 mr-4"
                    onclick="saveChanges()">Сохранить</button>
                <button type="button" class="text-red-500 hover:text-red-700"
                    onclick="closeEditModal()">Закрыть</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Открывает модальное окно для редактирования
    function openEditModal() {
      const modal = document.getElementById('editModal');
      modal.classList.remove('hidden');
  
      // Получение значений выбранного объявления
      const selectedRow = event.target.parentNode.parentNode;
      const brand = selectedRow.cells[0].innerText;
      const name = selectedRow.cells[1].innerText;
      const price = selectedRow.cells[2].innerText;
      const mileage = selectedRow.cells[3].innerText;
      const seller = selectedRow.cells[4].innerText;
      const city = selectedRow.cells[5].innerText;
  
      // Заполнение полей формы значениями выбранного объявления
      document.getElementById('brand').value = brand;
      document.getElementById('name').value = name;
      document.getElementById('price').value = price;
      document.getElementById('mileage').value = mileage;
      document.getElementById('seller').value = seller;
      document.getElementById('city').value = city;
    }
  
    // Закрывает модальное окно для редактирования
    function closeEditModal() {
      const modal = document.getElementById('editModal');
      modal.classList.add('hidden');
    }
  
    // Удаляет объявление
    function deleteListing() {
      // Здесь можно добавить логику для удаления объявления
      // ...
  
      // Закрытие модального окна после удаления
      closeEditModal();
    }
  
    // Сохраняет изменения в объявлении
    function saveChanges() {
      // Получение значений из полей формы
      const brand = document.getElementById('brand').value;
      const name = document.getElementById('name').value;
      const price = document.getElementById('price').value;
      const mileage = document.getElementById('mileage').value;
      const seller = document.getElementById('seller').value;
      const city = document.getElementById('city').value;
  
      // Отправка данных на сервер для сохранения
      // ...
  
      // Закрытие модального окна после сохранения
      closeEditModal();
    }
</script>

@endsection