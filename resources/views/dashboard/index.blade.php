<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/js/app.js')
</head>

<body class="dark">
    <div class="flex justify-between dark:bg-black px-4 py-3">
        <div>
            <ul class="flex">
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800" href="#">Home</a>
                </li>
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800" href="#">Empréstimos</a>
                </li>
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800" href="#">Livros</a>
                </li>
            </ul>
        </div>
        <div>
            <a href="{{ url('/user/edit') }}">
                <button class="px-3 py-1 font-bold text-white rounded bg-red-500 focus:outline-none">
                    <span>Editar Usuário</span>
                </button>
            </a>
            <a href="{{ url('/logout') }}">
                <button class="px-3 py-1 font-bold text-white rounded bg-red-500 focus:outline-none">
                    <span>Sair</span>
                </button>
            </a>
        </div>
    </div>
    <h1>Olá, você está logado!</h1>
</body>

</html>
