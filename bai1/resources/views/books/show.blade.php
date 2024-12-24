@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <p><strong class="text-secondary">Tên sách:</strong> <span class="text-success ms-2">{{ $book->name }}</span></p>
                <p><strong class="text-secondary">Tác giả:</strong> <span class="text-success ms-2">{{ $book->author }}</span></p>
                <p><strong class="text-secondary">Thể loại:</strong> <span class="text-success ms-2">{{ $book->category }}</span></p>
                <p><strong class="text-secondary">Năm xuất bản:</strong> <span class="text-success ms-2">{{ $book->year }}</span></p>
                <p><strong class="text-secondary">Số lượng bản sao:</strong> <span class="text-success ms-2">{{ $book->quantity }}</span></p>
                <a href="{{ route('books.index') }}" class="btn btn-info text-white">Quay lại</a>
            </div>
        </div>
    </div>
@endsection
