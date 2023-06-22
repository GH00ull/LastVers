@extends('.home') @section('title') Оъявления @endsection @section('content')
<main class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4">Объявления</h1>

    <!-- Фильтры -->
    <div class="flex items-center mb-4">
        <label for="city" class="mr-2">Город:</label>
        <select id="city" class="border border-gray-300 rounded px-2 py-1">
            <option value="">Все</option>
            @foreach ($city as $item )
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

        <label for="mileage" class="ml-4 mr-2">Пробег:</label>
        <input type="number" id="mileage" class="border border-gray-300 rounded px-2 py-1 w-24" placeholder="Пробег">

        <label for="brand" class="ml-4 mr-2">Бренд:</label>
        <select id="brand" class="border border-gray-300 rounded px-2 py-1">
            <option value="">Все</option>
            @foreach ($brand as $item )

            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

        <label for="condition" class="ml-4 mr-2">Состояние:</label>
        <select id="condition" class="border border-gray-300 rounded px-2 py-1">
            <option value="">Все</option>
            <option value="used">Б/у</option>
            <option value="new">Новая</option>
        </select>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Пример объявления -->
        @foreach ($ads as $item)
        <?php $adsPhoto=json_decode($item->photo,true);?>
        <div class="bg-white  rounded-lg p-6" data-city="{{$item->id_city}}" data-mileage="{{$item->mileage}}"
            data-brand="{{$item->id_brand}}" data-condition="used">
            <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
                <img src="{{asset($adsPhoto[1])}}" alt="Изображение автомобиля" class="mb-4">
                <h2 class="text-xl font-bold mb-2">{{$item->title}}</h2>
                <p class="text-gray-600 mb-4">Описание:{{$item->description}}</p>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-700 font-semibold">{{$item->price}}$</p>
                        <p class="text-gray-700">Город: {{$item->city->name}}</p>
                        <p class="text-gray-700">Бренд: {{$item->brand->name}}</p>
                        <p class="text-gray-700">Пробег: {{$item->mileage}}км</p>
                    </div>
                    <a href="{{route('ads.show.one',$item->id)}}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Подробнее</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>

<script>
    // Функция для обработки изменений в фильтрах
    function handleFilter() {
      const selectedCity = document.getElementById('city').value;
      const selectedMileage = document.getElementById('mileage').value;
      const selectedBrand = document.getElementById('brand').value;
      const selectedCondition = document.getElementById('condition').value;
      const items = document.querySelectorAll('.grid > div');
  
      items.forEach((item) => {
        const city = item.getAttribute('data-city');
        const mileage = item.getAttribute('data-mileage');
        const brand = item.getAttribute('data-brand');
        const condition = item.getAttribute('data-condition');
        const shouldShow = (
          (selectedCity === '' || selectedCity === city) &&
          (selectedMileage === '' || parseInt(selectedMileage) >= parseInt(mileage)) &&
          (selectedBrand === '' || selectedBrand === brand) &&
          (selectedCondition === '' || selectedCondition === condition)
        );
  
        item.style.display = shouldShow ? 'block' : 'none';
      });
    }
  
    // Назначаем обработчики событий изменений фильтров
    document.getElementById('city').addEventListener('change', handleFilter);
    document.getElementById('mileage').addEventListener('input', handleFilter);
    document.getElementById('brand').addEventListener('change', handleFilter);
    document.getElementById('condition').addEventListener('change', handleFilter);
</script>

@endsection