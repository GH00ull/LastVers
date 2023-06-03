@extends('.home') @section('title') Регистрация @endsection @section('content')

<div class="w-64 mx-auto bg-white shadow-md rounded p-8">

    @error('email','password')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Ошибка!</strong>
        <span class="block sm:inline">{{$message}}</span>
    </div>
    @enderror
    @if (session('registration_completed'))
    <div class="alert alert-success">
        {{ session('registration_completed') }}
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