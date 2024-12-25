@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold mb-4">Thêm Độc Giả</h2>
    <form action="{{ route('readers.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tên Sách</label>
            <input type="text" id="name" name="name" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('name') }}" >
            @error('name')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="birthday" class="block text-sm font-medium text-gray-700">Tác Giả</label>
            <input type="date" id="birthday" name="birthday" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('birthday') }}" >
            @error('birthday')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Thể Loại</label>
            <input type="text" id="address" name="address" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('address') }}" >
            @error('address')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('phone') }}" >
            @error('phone')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Lưu</button>
        <a href="{{ route('books.index') }}" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded-md">Quay lại</a>
    </form>
</div>
@endsection
