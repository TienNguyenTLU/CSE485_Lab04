@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold mb-4">Danh Sách Độc Giả</h2>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="{{ route('readers.create')}}" class="px-4 py-2 bg-green-500 text-white rounded-md mb-4">Thêm Độc Giả</a>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                <th class="px-4 py-3 text-left">STT</th>
                <th class="px-4 py-3 text-left">Tên độc giả</th>
                <th class="px-4 py-3 text-left">Ngày sinh</th>
                <th class="px-4 py-3 text-center">Địa chỉ</th>
                <th class="px-4 py-3 text-center">Số điện thoại</th>
                <th class="px-4 py-3 text-center">Hành Động</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y">
            @foreach ($readers as $reader)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-left">{{ $reader->id }}</td>
                <td class="px-4 py-3 text-left">{{ $reader->name }}</td>
                <td class="px-4 py-3 text-left">{{ $reader->birthday }}</td>
                <td class="px-4 py-3 text-left">{{ $reader->address }}</td>
                <td class="px-4 py-3 text-center">{{ $reader->phone }}</td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center items-center space-x-3">
                        <a href="{{ route('readers.show', $reader->id)}}" class="text-blue-600">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('readers.edit', $reader->id)}}" class="text-yellow-600">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button type="button" class="btn btn-link text-red-600" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" onclick="setDeleteAction('{{ route('readers.destroy', $reader->id)}}')">
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
        {{ $readers->links() }}
    </div>
</div>

@include('readers.destroy');

@endsection

<script>
    function setDeleteAction(actionUrl) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = actionUrl;
    }
</script>
