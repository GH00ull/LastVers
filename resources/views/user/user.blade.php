@extends('.home') @section('title') О Нас @endsection @section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Личный кабинет</h1>

        <div class="flex">
            <div class="w-1/4 pr-4">
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <h2 class="text-2xl font-bold mb-4">Пользователь</h2>

                    <div class="mb-4">
                        <h3 class="text-lg font-bold">Имя:</h3>
                        <p class="text-gray-600">{{$user->name}}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">Фамилия:</h3>
                        <p class="text-gray-600">{{$user->last_name}}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">Отчество:</h3>
                        <p class="text-gray-600">{{$user->middle_name}}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">Мобильный телефон:</h3>
                        <p class="text-gray-600">{{$user->phone}}</p>
                    </div>
                    @if ($user->telegram)
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">telegram:</h3>
                        <p class="text-gray-600">{{$user->telegram}}</p>
                    </div>
                    @endif
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">Email:</h3>
                        <p class="text-gray-600">{{$user->email}}</p>
                    </div>
                    <!-- Добавьте другие данные пользователя здесь -->
                </div>
            </div>

            <div class="w-3/4 pl-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-2xl font-bold mb-4">Мои объявления</h2>
                    @foreach ($ads as $item)

                    <div class="mb-4">
                        <h3 class="text-lg font-bold">{{$item->title}}</h3>
                        <p class="text-gray-600">{{$item->description}}</p>
                        <a href="{{route('ads.delite',$item->id)}}"
                            class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-md inline-block">Удалить
                            оъявление</a>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection