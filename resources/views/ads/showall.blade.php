@extends('.home') @section('title') Оъявления @endsection @section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Карточка товара 1 -->
    @foreach ($ads as $adses )
    <div class="max-w-md bg-white shadow-md rounded-lg overflow-hidden">
        <img src="{{ asset('storage/'.$adses->photo) }}" alt="Product Image" class="w-full h-48 object-cover">
        <div class="px-4 py-4">
            <h3 class="text-xl font-semibold mb-2">{{$adses->title}}</h3>
            <p class="text-gray-700">{{$adses->description}}</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="font-bold text-xl">$99.99</span>
                <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded">Посматреть</button>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection