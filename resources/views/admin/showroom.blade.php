@extends('.home') @section('title') О Нас @endsection @section('content')


<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Автосалоны</h1>

        <div class="flex">
            <div class="w-1/2 pr-4">
                <h2 class="text-2xl font-bold mb-4">Не рассмотренные автосалоны</h2>
                @foreach ($notredi as $notredis )

                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">{{$notredis->title}}</h3>
                        <p class="text-gray-600 mb-2">Слоган: {{$notredis->tagline}}</p>
                        <p class="text-gray-600 mb-2">Адрес: {{$notredis->address}}</p>
                        <a href="#"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md inline-block mt-2">Просмотр</a>
                    </div>
                    @endforeach

                    <!-- Добавьте другие не рассмотренные автосалоны здесь -->
                </div>
            </div>

            <div class="w-1/2 pl-4">
                <h2 class="text-2xl font-bold mb-4">Одобренные автосалоны</h2>
                @foreach ($redi as $redis )
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">{{$redis->title}}</h3>
                        <p class="text-gray-600 mb-2">Слоган: {{$redis->tagline}}</p>
                        <p class="text-gray-600 mb-2">Адрес: {{$redis->address}}</p>
                        <a href="#"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md inline-block mt-2">Просмотр</a>
                    </div>

                    @endforeach

                    <!-- Добавьте другие одобренные автосалоны здесь -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection