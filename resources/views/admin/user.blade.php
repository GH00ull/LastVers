@extends('.home') @section('title') О Нас @endsection @section('content')
<div class="bg-gray-100  min-h-screen">
    <div class="container mx-auto m-4 py-15">
        <h1 class="text-4xl font-bold text-center mb-8">
            Управление пользователями
        </h1>

        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-4 px-6 text-left">ID</th>
                    <th class="py-4 px-6 text-left">Имя</th>
                    <th class="py-4 px-6 text-left">Фамилия</th>
                    <th class="py-4 px-6 text-left">Отчество</th>
                    <th class="py-4 px-6 text-left">Телефон</th>
                    <th class="py-4 px-6 text-left">Email</th>
                    <th class="py-4 px-6 text-left">Telegram</th>
                    <th class="py-4 px-6 text-left">Роль</th>
                    <th class="py-4 px-6 text-left">Редоктировать</th>
                    <th class="py-4 px-6 text-left">Удалить</th>
                </tr>
            </thead>
            @foreach ($user as $users )
            <tbody>

                <tr>
                    <td class="py-4 px-6">{{$users->id}}</td>
                    <td class="py-4 px-6">{{$users->name}}</td>
                    <td class="py-4 px-6">{{$users->last_name}}</td>
                    <td class="py-4 px-6">{{$users->middle_name}}</td>
                    <td class="py-4 px-6">{{$users->phone}}</td>
                    <td class="py-4 px-6">{{$users->email}}</td>
                    <td class="py-4 px-6">
                        @if ($users->telegram)
                        {{($users->telegram)}}
                        @else
                        не указанно
                        @endif</td>
                    <td class="py-4 px-6">
                        @switch($users->role_id)
                        @case(1)
                        Пользователь
                        @break
                        @case(3)
                        Автосалонн
                        @break
                        @case(5)Админ
                        @break
                        @default

                        @endswitch
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{route('admin.user.update',$users->id)}}"
                            class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-md inline-block">Редактировать</a>
                    </td>
                    <td>
                        <a href="{{route('admin.user.delite',$users->id)}}"
                            class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-md inline-block">Удалить</a>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>
    </div>
</div>

@endsection