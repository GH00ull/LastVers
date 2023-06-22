@extends('.home') @section('title') О Нас @endsection @section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Администраторская панель</h1>

        <div class="flex">
            <div class="w-1/3 pr-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-2xl font-bold mb-4">Категория: Города</h2>

                    <ul>
                        @foreach ($city as $item)

                        <li class="mb-4">
                            <h3 class="text-lg font-bold">{{$item->name}}</h3>
                            <a href="{{route('admin.city.delite',$item->id)}}"
                                class="text-blue-500 hover:text-blue-700">Удалить</a>
                        </li>
                        @endforeach

                        <!-- Добавьте другие города здесь -->
                    </ul>
                </div>
            </div>

            <div class="w-1/3 px-2">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-2xl font-bold mb-4">Категория: Бренды</h2>

                    <ul>
                        @foreach ($brand as $item)

                        <li class="mb-4">
                            <h3 class="text-lg font-bold">{{$item->name}}</h3>
                            <a href="{{route('admin.brand.delite',$item->id)}}"
                                class="text-blue-500 hover:text-blue-700">Удалить</a>
                        </li>
                        @endforeach

                        <!-- Добавьте другие бренды здесь -->
                    </ul>
                </div>
            </div>

            <div class="w-1/3 pl-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-2xl font-bold mb-4">Редактирование</h2>

                    <!-- Форма редактирования города -->
                    <form action="{{route('admin.city.create')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-lg font-bold mb-2" for="city-name">Название города</label>
                            <input type="text" id="city-name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Сохранить</button>
                        </div>
                    </form>

                    <!-- Форма редактирования бренда -->
                    <form class="mt-8" action="{{route('admin.brand')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-lg font-bold mb-2" for="brand-name">Название бренда</label>
                            <input type="text" id="brand-name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection