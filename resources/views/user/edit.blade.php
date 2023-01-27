@include('components.header.index')
<div class="fixed flex flex-col items-center justify-center w-full h-full dark:bg-black bg-opacity-50">
    <div class="my-5">
        <span class="text-white text-2xl font-medium text-white">
            Olá, {{ $user['name'] }}! Por favor, altere os dados que deseja.
        </span>
    </div>
    <div class="flex flex-row">
        <div class="mx-10">
            <div class="flex flex-col overflow-hidden bg-white rounded-lg">
                <div class="flex flex-col px-12 py-10 bg-white">
                    <div class="mt-1">
                        <form method="post" action="{{ route('user_update') }}" novalidate>
                            @csrf
                            <label class="block">
                                <span class="text-lg font-medium text-gray-800">Nome</span>
                                <input type="text" name="name" value="{{ $user['name'] }}" class="block w-full px-4 py-3 mt-1 text-lg bg-gray-100 border-2 border-transparent rounded" />
                                @error('name')
                                <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="block mt-6">
                                <span class=" text-lg font-medium text-gray-800">E-mail</span>
                                <input type="email" name="email" value="{{ $user['email'] }}" class="block w-full px-4 py-3 mt-1 text-lg bg-gray-100 border-2 border-transparent rounded" />
                                @error('email')
                                <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                @enderror
                            </label>
                            <div class="flex justify-center">
                                <button class="px-8 py-3 mt-10 font-bold text-white rounded bg-green-500 focus:outline-none">
                                    <span>Editar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.footer.index')
