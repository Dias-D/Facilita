@include('components.header.index')
<div class="fixed flex flex-col items-center w-full h-full dark:bg-black bg-opacity-50">
    <div>
        <a href="{{ route('books.create') }}">
            <button class="px-3 py-1 font-bold text-white rounded bg-green-500 focus:outline-none">
                <span>Novo</span>
            </button>
        </a>
    </div>
    <div class="flex flex-col my-5">
        <table class="table-auto">
            <thead>
                <tr class="text-white">
                    <th>Registro</th>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Classificação</th>
                    <th>Status</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr class="text-white">
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->classification->description }}</td>
                    <td>{{ $book->status }}</td>
                    @if($book->status === App\Enums\BookStatusEnum::fromName('AVAILABLE'))
                    <td>
                        <a href="{{ route('books.edit', ['book' => $book->id]) }}">
                            <button class="px-3 py-1 font-bold text-white rounded bg-green-500 focus:outline-none">
                                <span>Editar</span>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="px-3 py-1 font-bold text-white rounded bg-red-500 focus:outline-none">
                                <span>Excluir</span>
                            </button>
                        </form>
                    </td>
                    @else
                    <td>
                        <button class="px-3 py-1 font-bold text-white rounded bg-gray-500 focus:outline-none">
                            <span>Editar</span>
                        </button>
                    </td>
                    <td>
                        <button class="px-3 py-1 font-bold text-white rounded bg-gray-500 focus:outline-none">
                            <span>Excluir</span>
                        </button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('components.footer.index')
