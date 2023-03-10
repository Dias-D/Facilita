<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/js/app.js')
</head>

<body class="dark">
    @include('components.header.alert')
    @if(Auth::check())
    <div class="flex dark:bg-black justify-between px-4 py-3">
        <div>
            <ul class="flex">
                <li class="mr-6">
                    <a class="text-white hover:text-blue-800" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-blue-800" href="{{ route('users.index') }}">Usuários</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-blue-800" href="{{ route('books.index') }}">Livros</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-blue-800" href="{{ route('borrowing-books.index') }}">Empréstimos</a>
                </li>
            </ul>
        </div>
        <div>
            <a href="{{ route('logout') }}">
                <button class="px-3 py-1 font-bold text-white rounded bg-red-500 focus:outline-none">
                    <span>Sair</span>
                </button>
            </a>
        </div>
    </div>
    @endif
