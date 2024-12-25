@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold mb-4">Thêm Sách</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tên Sách</label>
            <input type="text" id="name" name="name" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('name') }}" >
            @error('name')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Tác Giả</label>
            <input type="text" id="author" name="author" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('author') }}" >
            @error('author')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Thể Loại</label>
            <input type="text" id="category" name="category" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('category') }}" >
            @error('category')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-gray-700">Năm Xuất Bản</label>
            <input type="number" id="year" name="year" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('publish_year') }}" >
            @error('year')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Số Lượng Bản Sao</label>
            <input type="number" id="quantity" name="quantity" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('quantity') }}" >
            @error('quantity')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Lưu</button>
        <a href="{{ route('books.index') }}" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded-md">Quay lại</a>
    </form>
</div>
@endsection
