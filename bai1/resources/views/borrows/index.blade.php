@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold mb-4">Danh sách phiếu mượn</h2>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="" class="px-4 py-2 bg-green-500 text-white rounded-md mb-4">Thêm phiếu mượn</a>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                <th class="px-4 py-3 text-left">STT</th>
                <th class="px-4 py-3 text-left">Tên người mượn</th>
                <th class="px-4 py-3 text-left">Tên sách</th>
                <th class="px-4 py-3 text-center">Tên tác giả</th>
                <th class="px-4 py-3 text-center">Ngày mượn sách</th>
                <th class="px-4 py-3 text-center">Ngày trả sách</th>
                <th class="px-4 py-3 text-center">Trạng thái</th>
                <th class="px-4 py-3 text-center">Hành Động</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y">
            @foreach ($borrows as $borrow)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-left">{{ $borrow->id }}</td>
                <td class="px-4 py-3 text-left">{{ $borrow->reader->name }}</td>
                <td class="px-4 py-3 text-left">{{ $borrow->book->name }}</td>
                <td class="px-4 py-3 text-left">{{ $borrow->book->author }}</td>
                <td class="px-4 py-3 text-left">{{ $borrow->borrow_date }}</td>
                <td class="px-4 py-3 text-center">{{ $borrow->return_date }}</td>
                <td class="px-4 py-3 text-center"> @if($borrow->status == 0) Chưa trả @else Đã trả @endif</td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center items-center space-x-3">
                        <a href="{{ route('borrows.show', $borrow->id)}}" class="text-blue-600">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('borrows.edit', $borrow->id)}}" class="text-yellow-600">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button type="button" class="btn btn-link text-red-600" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" onclick="setDeleteAction('{{ route('borrows.destroy', $borrow->id)}}')">
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
        {{ $borrows->links() }}
    </div>
</div>

@include('borrows.destroy');

@endsection

<script>
    function setDeleteAction(actionUrl) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = actionUrl;
    }
</script>