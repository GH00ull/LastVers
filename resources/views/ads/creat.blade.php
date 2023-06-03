@extends('.home') @section('title') Регистрация @endsection @section('content')
<div class="max-w-md mx-auto bg-white shadow-md rounded p-6">
    @error('title','brand','mileage','price','description','city','condition','main_image')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Ошибка!</strong>
        <span class="block sm:inline">{{$message}}</span>
    </div>
    @enderror
    <h2 class="text-2xl font-bold mb-4">Создать объявление</h2>
    <form action="{{route('ads.creation')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block mb-2">Название</label>
            <input type="text" id="title" name="title" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Введите название" />
        </div>
        <div class="mb-4">
            <label for="brand" class="block mb-2">Марка</label>
            <select id="brand" name="brand" class="w-full border border-gray-300 p-2 rounded">
                <option>Выберите марку</option>
                <option value="1">Марка 1</option>
                <option value="2">Марка 2</option>
                <option value="3">Марка 3</option>
                <option value="4">Марка 4</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="mileage" class="block mb-2">Пробег</label>
            <input type="text" id="mileage" name="mileage" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Введите пробег" />
        </div>
        <div class="mb-4">
            <label for="price" class="block mb-2">Цена</label>
            <input type="text" id="price" name="price" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Введите цену" />
        </div>
        <div class="mb-4">
            <label for="main_image" class="block mb-2">Фото</label>
            <input type="file" id="main_image" name="main_image" class="w-full border border-gray-300 p-2 rounded" />
        </div>
        <div class="mb-4">
            <label for="description" class="block mb-2">Описание</label>
            <textarea id="description" name="description" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Введите описание"></textarea>
        </div>
        <div class="mb-4">
            <label for="city" class="block mb-2">Город</label>
            <select id="city" name="city" class="w-full border border-gray-300 p-2 rounded">
                <option>Выберите город</option>
                <option value="1">Город 1</option>
                <option value="2">Город 2</option>
                <option value="3">Город 3</option>
                <option value="4">Город 4</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="condition" class="block mb-2">Состояние</label>
            <div class="flex items-center">
                <input type="radio" id="new" name="condition" value="0" class="mr-2" />
                <label for="new" class="mr-4">Новая</label>
                <input type="radio" id="used" name="condition" value="1" class="mr-2" />
                <label for="used">Была в эксплуатации</label>
            </div>
        </div>
        <button type="submit" class="w-full bg-purple-500 text-white py-2 px-4 rounded">Создать</button>
    </form>
</div>

@endsection