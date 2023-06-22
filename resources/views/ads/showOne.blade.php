@extends('.home') @section('title') Оъявления @endsection @section('link')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
@endsection @section('content')

<div class="container mx-auto py-8">
    <div class="flex">
        <div class="w-1/2">
            <div class="slider">
                @foreach(json_decode($photo) as $image)
                <img src="{{asset($image)}}">
                @endforeach
            </div>
        </div>
        <div class="w-1/2">
            <h1 class="text-2xl font-bold mb-4">{{$ads->title}}</h1>
            <p class="text-gray-600 mb-4">{{$ads->description}}</p>
            <p class="text-lg font-bold mb-2">Характеристики</p>
            <ul class="list-disc ml-6">
                <li>Марка: {{$brand->name}} </li>
                <li>Пробег:{{$ads->mileage}} </li>
                <li>Город:{{$city->name}}</li>
                @if($ads->state === 0)<li>Состояние:новая </li>
                @else<li>Состояние:Б/У </li>@endif
                <!-- Добавьте другие характеристики здесь -->
            </ul>
            <p class="text-lg font-bold mb-2">Владелиц</p>
            <ul class="list-disc ml-6">
                <li>Имя: {{$user->name}} {{$user->last_name}}</li>
                <li>Телефон: {{$user->phone}}</li>
                @if($user->telegram)
                <li>Телеграмм: {{$user->telegram}}</li>@endif
            </ul>
            <p class="text-lg font-bold mt-4">Цена: {{$ads->price}}$</p>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $(document).ready(function() {
            $('.slider').slick();
        });
</script>


@endsection