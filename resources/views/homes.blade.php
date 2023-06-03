@extends('.home') @section('title') Оъявления @endsection @section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Добро пожаловать на наш сайт по продаже автомобилей</h1>
        <p class="text-lg text-center text-gray-700 mb-8">Здесь вы найдете широкий выбор автомобилей разных марок,
            моделей и ценовых категорий</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Карточка категории 1 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <img src="https://kolesa-uploads.ru/-/6f67124b-c902-4f06-ab26-85e119d3fa4b/pre-new-chery-sedan-3.jpg"
                    alt="Category Image" class="w-full h-100 object-cover mb-4">
                <h3 class="text-xl font-semibold mb-2">Седаны</h3>
                <p class="text-gray-700">Широкий выбор седанов разных марок и моделей</p>
                <a href="#" class="text-purple-500 font-semibold mt-4 inline-block">Просмотреть</a>
            </div>

            <!-- Карточка категории 2 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <img src="https://tarantas.news/uploads/prew/inner/ilfyhaicy6cwgz34sfpb.jpg" alt="Category Image"
                    class="w-full h-100 object-cover mt-3 mb-4">
                <h3 class="text-xl font-semibold mb-2">Внедорожники</h3>
                <p class="text-gray-700">Мощные и надежные внедорожники для любых условий</p>
                <a href="#" class="text-purple-500 font-semibold mt-4 inline-block">Просмотреть</a>
            </div>

            <!-- Карточка категории 3 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <img src="https://ss.sport-express.ru/userfiles/materials/181/1811686/volga.jpg" alt="Category Image"
                    class="w-full h-100 object-cover mt-10 mb-4">
                <h3 class="text-xl font-semibold mb-2">Спорткары</h3>
                <p class="text-gray-700">Быстрые и элегантные спортивные автомобили</p>
                <a href="#" class="text-purple-500 font-semibold mt-4 inline-block">Просмотреть</a>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-lg text-gray-700">Не упустите свою возможность приобрести идеальный автомобиль!</p>
            <a href="#"
                class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-full mt-8 inline-block">Посмотреть
                все автомобили</a>
        </div>
    </div>
</div>
@endsection