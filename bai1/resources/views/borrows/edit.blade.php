@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-2xl font-bold mb-4">Sửa Phiếu Mượn</h2>
    <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="reader_id" class="block text-sm font-medium text-gray-700">Tên Độc Giả</label>
            <select id="reader_id" name="reader_id" class="mt-1 p-2 border border-gray-300 rounded w-full">
                <option value="">Chọn độc giả</option>
                @foreach ($readers as $reader)
                    <option value="{{ $reader->id }}" {{ old('reader_id', $borrow->reader_id) == $reader->id ? 'selected' : '' }}>
                        {{ $reader->name }}
                    </option>
                @endforeach
            </select>
            @error('reader_id')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="book_id" class="block text-sm font-medium text-gray-700">Tên Sách</label>
            <select id="book_id" name="book_id" class="mt-1 p-2 border border-gray-300 rounded w-full">
                <option value="">Chọn sách</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ old('book_id', $borrow->book_id) == $book->id ? 'selected' : '' }}>
                        {{ $book->name }}
                    </option>
                @endforeach
            </select>
            @error('book_id')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="borrow_date" class="block text-sm font-medium text-gray-700">Ngày Mượn</label>
            <input type="date" id="borrow_date" name="borrow_date" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('borrow_date', $borrow->borrow_date) }}">
            @error('borrow_date')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="return_date" class="block text-sm font-medium text-gray-700">Ngày Trả</label>
            <input type="date" id="return_date" name="return_date" class="mt-1 p-2 border border-gray-300 rounded w-full" value="{{ old('return_date', $borrow->return_date) }}">
            @error('return_date')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Trạng Thái</label>
            <select id="status" name="status" class="mt-1 p-2 border border-gray-300 rounded w-full">
                <option value="0" {{ old('status', $borrow->status) == 0 ? 'selected' : '' }}>Chưa trả</option>
                <option value="1" {{ old('status', $borrow->status) == 1 ? 'selected' : '' }}>Đã trả</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1"> <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Cập Nhật</button>
        <a href="{{ route('borrows.index') }}" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded-md">Quay lại</a>
    </form>
</div>
@endsection
