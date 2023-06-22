@extends('.home') @section('title') О Нас @endsection @section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Панель Администратора </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Кнопка "Главная" -->
            <a href="{{route('admin.showroom')}}" class="bg-white shadow-md rounded-lg p-6 text-center text-2xl">
                <h2 class="text-2xl font-semibold mb-4">Главная</h2>
                <p class="text-gray-700">Управления автосалономи</p>
                <p class="text-purple-500 font-semibold mt-4">Количество автосалонов: {{$Showroom}}</p>
            </a>

            <!-- Кнопка "Пользователи" -->
            <a href="{{route('admin.user')}}" class="bg-white shadow-md rounded-lg p-6 text-center text-2xl">
                <h2 class="text-2xl font-semibold text-2xlmb-4">Пользователи</h2>
                <p class="text-gray-700 text-2xl">Управляйте пользователями</p>
                <p class="text-purple-500 font-semibold mt-4 text-2xl">Количество пользователей: {{$user}}</p>
            </a>

            <!-- Кнопка "Объявления" -->
            <a href="{{route('admin.ads')}}" class="bg-white shadow-md rounded-lg p-6 text-center text-2xl">
                <h2 class="text-2xl font-semibold mb-4">Объявления</h2>
                <p class="text-gray-700">Управляйте объявлениями</p>
                <p class="text-purple-500 font-semibold mt-4">Количество объявлений: {{$post}}</p>
            </a>
            <a href="{{route('admin.city')}}" class="bg-white shadow-md rounded-lg p-6 text-center text-2xl">
                <h2 class=" font-semibold mb-4 text-2xl">Категории</h2>
                <p class="text-gray-700">Управление категориями</p>
            </a>
        </div>
    </div>
</div>

@endsection