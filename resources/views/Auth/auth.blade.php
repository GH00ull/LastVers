@extends('.home') @section('title') Авторизация @endsection @section('content')

<div class="mt-6 w-64 mx-auto bg-white shadow-md rounded p-8">
    
    
    @if (session('registration_completed'))

    <div class="bg-white shadow-md rounded-lg p-4 mb-4">
        <h2 class="text-2xl font-bold mb-4">Ошибки</h2>
      
        <ul class="list-disc pl-6">
          <li class="text-red-500">{{ session('registration_completed') }}</li>
          
          <!-- Добавьте другие ошибки здесь -->
        </ul>
      </div>
   
        
    @endif

    <h2 class="text-2xl font-bold mb-4">Авторизация</h2>

    <form action="{{route('login.user')}}" method="post">
        @csrf
        <div class="mb-6 mt-2">
            <label for="email" class="block mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Введите ваш email" />
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2">Пароль</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Введите ваш пароль" />
        </div>
        <button type="submit" class="w-full bg-purple-500 text-white py-2 px-4 rounded">
            Войти
        </button>
    </form>
    <p class="mt-4 text-center text-purple-500">
        Еще нет аккаунта?
        <a href="{{ route('registration') }}" class="text-purple-500 font-bold">Зарегистрируйтесь</a>
    </p>
</div>

@endsection