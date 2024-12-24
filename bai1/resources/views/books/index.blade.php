@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold mb-4">Danh Sách Sách</h2>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="{{ route('books.create')}}" class="px-4 py-2 bg-green-500 text-white rounded-md mb-4">Thêm Sách</a>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                <th class="px-4 py-3 text-left">STT</th>
                <th class="px-4 py-3 text-left">Tên Sách</th>
                <th class="px-4 py-3 text-left">Tác Giả</th>
                <th class="px-4 py-3 text-left">Thể Loại</th>
                <th class="px-4 py-3 text-center">Năm Xuất Bản</th>
                <th class="px-4 py-3 text-center">Số Lượng Bản Sao</th>
                <th class="px-4 py-3 text-center">Hành Động</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y">
            @foreach ($books as $book)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-left">{{ $book->id }}</td>
                <td class="px-4 py-3 text-left">{{ $book->name }}</td>
                <td class="px-4 py-3 text-left">{{ $book->author }}</td>
                <td class="px-4 py-3 text-left">{{ $book->category }}</td>
                <td class="px-4 py-3 text-center">{{ $book->year }}</td>
                <td class="px-4 py-3 text-center">{{ $book->quantity }}</td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center items-center space-x-3">
                        <a href="{{ route('books.show', $book->id)}}" class="text-blue-600">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('books.edit', $book->id)}}" class="text-yellow-600">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button type="button" class="btn btn-link text-red-600" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" onclick="setDeleteAction('{{ route('books.destroy', $book->id) }}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>

@include('books.destroy');

@endsection

<script>
    function setDeleteAction(actionUrl) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = actionUrl;
    }
</script>
