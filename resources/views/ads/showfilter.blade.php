@extends('.home') @section('title') Оъявления @endsection @section('content')
<div class="bg-gray-100 py-4 px-8">
    <h2 class="text-xl font-bold mb-2">Фильтр</h2>
    <form action="{{route('ads.filter')}}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="brand">Бренд:</label>
            <select id="brand" name="brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <option value="">Все бренды</option>
                @foreach ($brand as $item)
                    
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                <!-- Добавьте другие бренды здесь -->
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="city">Город:</label>
            <select id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <option value="">Все города</option>
                @foreach ($city as $item)
                    
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                <!-- Добавьте другие города здесь -->
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Цена:</label>
            <input type="text" id="price" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                placeholder="Введите цену до">
        </div>
        <div class="text-right">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Применить</button>
            <a href="{{route('adsShow')}}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Сбросить Фильтр</a>
        </div>
    </form>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Карточка товара 1 -->
    {{-- @dd($ads) --}}
    @if ($ads === 0)
    <h1>нет пока объявлений</h1>
    @endif
    @foreach ($ads as $adses )
    {{$photo = json_decode($adses->photo, true)}}
        <div class="max-w-md bg-white shadow-md rounded-lg overflow-hidden">
            <img src="" alt="Product Image" class="w-full h-48 object-cover">
        <div class="px-4 py-4">
            <h3 class="text-xl font-semibold mb-2">{{$adses->title}}</h3>
            <p class="text-gray-700">{{$adses->description}}</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="font-bold text-xl">{{$adses->price}}$</span>
                <a href="{{route('ads.show.one',$adses->id)}}"
                    class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded">Посматреть</a>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection