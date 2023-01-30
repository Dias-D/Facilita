@include('../components.header.index')
<div class="fixed flex flex-col items-center w-full h-full dark:bg-black bg-opacity-50">
    <div>
        <a href="{{ route('borrowing-books.create') }}">
            <button class="px-3 py-1 font-bold text-white rounded bg-green-500 focus:outline-none">
                <span>Novo</span>
            </button>
        </a>
    </div>
    <div class="flex flex-col my-5">
        <table class="table-auto">
            <thead>
                <tr class="text-white">
                    <th>Usuário</th>
                    <th>Livro</th>
                    <th>Devolução</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowings as $borrowing)
                <tr class="text-white">
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->book->name }}</td>
                    <td>{{ $borrowing->devolution }}</td>
                    @if($borrowing->status === App\Enums\BorrowingStatusEnum::fromName('OPEN'))
                    <td>
                        <form action="{{ route('borrowing-books.update', $borrowing->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <input class="hidden" name="status" value="{{ App\Enums\BorrowingStatusEnum::fromName('LATE') }}" />
                            <button class="px-3 py-1 font-bold text-white rounded bg-green-500 focus:outline-none">
                                <span>Atrasado</span>
                            </button>
                            </a>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('borrowing-books.destroy', $borrowing->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <input class="hidden" name="status" value="{{ App\Enums\BorrowingStatusEnum::fromName('RETURNED') }}" />
                            <button type="submit" class="px-3 py-1 font-bold text-white rounded bg-red-500 focus:outline-none">
                                <span>Devolvido</span>
                            </button>
                        </form>
                    </td>
                    @elseif($borrowing->status === App\Enums\BorrowingStatusEnum::fromName('LATE'))
                    <td>
                        <button class="px-3 py-1 font-bold text-white rounded bg-gray-500 focus:outline-none">
                            <span>Atrasado</span>
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('borrowing-books.destroy', $borrowing->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <input class="hidden" name="status" value="{{ App\Enums\BorrowingStatusEnum::fromName('RETURNED') }}" />
                            <button type="submit" class="px-3 py-1 font-bold text-white rounded bg-red-500 focus:outline-none">
                                <span>Devolvido</span>
                            </button>
                        </form>
                    </td>
                    @else
                    <td>
                        <button class="px-3 py-1 font-bold text-white rounded bg-gray-500 focus:outline-none">
                            <span>Atrasado</span>
                        </button>
                    </td>
                    <td>
                        <button class="px-3 py-1 font-bold text-white rounded bg-gray-500 focus:outline-none">
                            <span>Devolvido</span>
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
