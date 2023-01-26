<div class="flex justify-between dark:bg-black px-4 py-3">
    <div>
        <ul class="flex">
            <li class="mr-6">
                <a class="text-white hover:text-blue-800" href="{{ url('/dashboard') }}">Home</a>
            </li>
            <li class="mr-6">
                <a class="text-white hover:text-blue-800" href="#">Empréstimos</a>
            </li>
            <li class="mr-6">
                <a class="text-white hover:text-blue-800" href="#">Livros</a>
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
