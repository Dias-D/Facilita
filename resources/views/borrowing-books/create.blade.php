@include('components.header.index')
<div class="fixed flex flex-col items-center justify-center w-full h-full dark:bg-black bg-opacity-50">
    <div class="my-5">
        <span class="text-white text-2xl font-medium text-white">
            Por favor, selecione as informações desejáveis.
        </span>
    </div>
    <div class="flex flex-row">
        <div class="mx-10">
            <div class="flex flex-col overflow-hidden bg-white rounded-lg">
                <div class="flex flex-col px-6 py-5 bg-white">
                    <div class="mt-1">
                        <form method="post" action="{{ route('borrowing-books.store') }}" novalidate>
                            @csrf
                            <label class="block">
                                <span class="text-md font-medium text-gray-800">Usuário</span>
                                <select name="user_id" class="block w-full px-2 py-1 mt-1 text-md bg-gray-100 border-2 border-transparent rounded">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="block mt-6">
                                <span class=" text-md font-medium text-gray-800">Livro</span>
                                <select name="book_id" class="block w-full px-2 py-1 mt-1 text-md bg-gray-100 border-2 border-transparent rounded">
                                    @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="block mt-6">
                                <span class=" text-md font-medium text-gray-800">Devolução</span>
                                <input type="date" name="devolution" class="block w-full px-2 py-1 mt-1 text-md bg-gray-100 border-2 border-transparent rounded" />
                                @error('devolution')
                                <span class="block font-medium text-brand-danger">{{ $message }}</span>
                                @enderror
                            </label>
                            <div class="flex justify-center">
                                <button class="px-4 py-1 mt-6 font-bold text-white rounded bg-green-500 focus:outline-none">
                                    <span>Criar</span>
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
