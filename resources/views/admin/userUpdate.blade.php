@extends('.home') @section('title') О Нас @endsection @section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Редактирование пользователя</h1>

        <form class="max-w-md mx-auto bg-white shadow-md rounded-lg px-8 py-6"
            action="{{route('admin.user.updateEnd',$user->id)}}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">Имя</label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    value="{{$user->name}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">Фамилия</label>
                <input type="text" id="last_name" name="last_name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    value="{{$user->last_name}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">Отчество</label>
                <input type="text" id="last_name" name="middle_name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    value="{{$user->middle_name}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">Telegram</label>
                <input type="text" id="telegram" name="telegram"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    value="{{$user->telegram}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">Номер телефона</label>
                <input type="tel" id="phone" name="phone"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    value="{{$user->phone}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                    value="{{$user->email}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="role_id">Роль</label>
                <select id="role" name="role_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                    @switch($user->role_id)
                    @case(1)
                    <option value="1" selected>Пользователь</option>
                    <option value="5">Администратор</option>
                    <option value="3 ">Автосалонн</option>
                    @break
                    @case(3)
                    <option value="3" selected>Автосалонн</option>
                    <option value="5">Администратор</option>
                    <option value="1">Пользователь</option>
                    @break
                    @case(5)
                    <option value="5" selected>Администратор</option>
                    <option value="1">Пользователь</option>
                    <option value="3 ">Автосалонн</option>
                    @break
                    @default
                    @endswitch
                </select>
            </div>
            <div class="flex justify-end">
                <button
                    class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-md inline-block mr-2">Сохранить</button>
        </form>
    </div>
</div>

@endsection