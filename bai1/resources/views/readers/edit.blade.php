@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold mb-4">Sửa thông tin độc giả</h2>
    <form action="{{ route('readers.update', $reader->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tên độc giả</label>
            <input type="text" id="name" name="name" value="{{ old('name', $reader->name) }}" class="mt-1 p-2 border border-gray-300 rounded w-full">
            @error('name')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="birthday" class="block text-sm font-medium text-gray-700">Ngày sinh</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $reader->birthday) }}" class="mt-1 p-2 border border-gray-300 rounded w-full">
            @error('birthday')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
            <input type="text" id="address" name="address" value="{{ old('address', $reader->address) }}" class="mt-1 p-2 border border-gray-300 rounded w-full">
            @error('address')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $reader->phone) }}" class="mt-1 p-2 border border-gray-300 rounded w-full">
            @error('phone')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Cập Nhật</button>
        <a href="{{ route('readers.index') }}" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded-md">Quay lại</a>
    </form>
</div>
@endsection
