@extends('.home') @section('title') О Нас @endsection @section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Свяжитесь с нами</h1>

        <div class="max-w-lg mx-auto bg-white shadow-md rounded-md p-6">
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Ваше имя</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Сообщение</label>
                    <textarea id="message" name="message" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500"></textarea>
                </div>
                <button type="submit"
                    class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-full">Отправить</button>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-lg text-gray-700">Если у вас есть вопросы или предложения, пожалуйста, свяжитесь с нами.</p>
            <p class="text-lg text-gray-700">Мы ответим вам в ближайшее время.</p>
        </div>
    </div>
</div>

@endsection