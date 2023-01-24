<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/js/app.js')
</head>

<body class="dark">
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Algo inesperado ocorreu!</strong>
        <span class="block sm:inline">O login não pode ser realidzada. Por favor, tente novamente.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onClick="window.location.href=window.location.href">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
    </div>
    @endif
    <div class="flex justify-end bg-red-100 dark:bg-black text-red-700 px-4 py-3">
        <a href="{{url('/')}}">
            <button class="px-3 py-1 font-bold text-white rounded bg-red-500 focus:outline-none">
                <span>Entrar</span>
            </button>
        </a>
    </div>
    <div class="fixed flex flex-col items-center justify-center w-full h-full dark:bg-black bg-opacity-50">
        <div class="my-5">
            <span class="text-white text-2xl font-medium text-white">
                Olá, novo usuário! Por favor, registre-se.
            </span>
        </div>
        <div class="flex flex-row">
            <div class="mx-10">
                <div class="flex flex-col overflow-hidden bg-white rounded-lg">
                    <div class="flex flex-col px-12 py-10 bg-white">
                        <div class="mt-1">
                            <form method="post" action="/register" novalidate>
                                @csrf
                                <label class="block">
                                    <span class="text-lg font-medium text-gray-800">Nome</span>
                                    <input type="text" name="name" class="block w-full px-4 py-3 mt-1 text-lg bg-gray-100 border-2 border-transparent rounded" />
                                    @error('name')
                                    <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block mt-6">
                                    <span class=" text-lg font-medium text-gray-800">E-mail</span>
                                    <input type="email" name="email" class="block w-full px-4 py-3 mt-1 text-lg bg-gray-100 border-2 border-transparent rounded" />
                                    @error('email')
                                    <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block mt-6">
                                    <span class="text-lg font-medium text-gray-800">Senha</span>
                                    <input type="password" name="password" class="block w-full px-4 py-3 mt-1 text-lg bg-gray-100 border-2 border-transparent rounded" />
                                    @error('password')
                                    <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <div class="flex justify-center">
                                    <button class="px-8 py-3 mt-10 font-bold text-white rounded bg-green-500 focus:outline-none">
                                        <span>Registrar</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>