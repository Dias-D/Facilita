@include('components.header.index')
<div class="fixed flex flex-col items-center justify-center w-full h-full dark:bg-black bg-opacity-50">
    <div class="my-5">
        <span class="text-white text-2xl font-medium text-white">
            Olá, Seja bem vindo!
        </span>
    </div>
    <div class="flex flex-row">
        <div class="mx-10">
            <div class="flex flex-col overflow-hidden bg-white rounded-lg">
                <div class="flex flex-col px-6 py-5 bg-white">
                    <div class="mt-1">
                        <form method="post" action="{{ route('login') }}" novalidate>
                            @csrf
                            <label class="block">
                                <span class="text-md font-medium text-gray-800">E-mail</span>
                                <input type="email" name="email" class="block w-full px-2 py-1 mt-1 text-md bg-gray-100 border-2 border-transparent rounded" />
                                @error('email')
                                <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="block mt-6">
                                <span class="text-md font-medium text-gray-800">Senha</span>
                                <input type="password" name="password" class="block w-full px-2 py-1 mt-1 text-md bg-gray-100 border-2 border-transparent rounded" />
                            </label>
                            <div class="flex justify-center">
                                <button class="px-4 py-1 mt-6 font-bold text-white rounded bg-green-500 focus:outline-none">
                                    <span>Entrar</span>
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
