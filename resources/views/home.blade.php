<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/js/app.js')
</head>

<body class="dark">
    <div class="fixed flex flex-col items-center justify-center w-full h-full dark:bg-black bg-opacity-50">
        <div class="my-5">
            <span class="text-white text-2xl font-medium text-white">
                Olá, Seja bem vindo!
            </span>
        </div>
    </div>
</body>

</html>
