@extends('.home') @section('title') О Нас @endsection @section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Создание автосалона</h1>
        <p class="text-lg text-center text-gray-700 mb-8">
            Добро пожаловать в мир автомобилей! Создайте свой автосалон и
            предложите клиентам лучшие автомобили.
        </p>

        <div class="max-w-md mx-auto bg-white shadow-md rounded-md p-6">
            <form action="{{route('created.showroom')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Название автосалона</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Адрес</label>
                    <input type="text" id="address" name="address"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Телефон</label>
                    <input type="text" id="phone" name="phone"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Слогон компании</label>
                    <input type="text" id="tagline" name="tagline"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500" />
                </div>
                <div class="mb-4">
                    <label for="main_image" class="block mb-2  text-gray-700 text-sm font-bold">Фото</label>
                    <input type="file" id="main_image" name="images[]" class="w-full border border-gray-300 p-2 rounded"
                        multiple />
                </div>
                <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-full">
                    Создать
                </button>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-lg text-gray-700">
                Создайте свой автосалон прямо сейчас и предложите клиентам
                лучшие автомобили!
            </p>
        </div>
    </div>
</div>

@endsection