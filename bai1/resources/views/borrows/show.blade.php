@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <p><strong class="text-secondary">Tên người mượn:</strong> <span class="text-success ms-2">{{ $borrow->reader->name }}</span></p>
                <p><strong class="text-secondary">Ngày sinh:</strong> <span class="text-success ms-2">{{ $borrow->reader->birthday }}</span></p>
                <p><strong class="text-secondary">Địa chỉ:</strong> <span class="text-success ms-2">{{ $borrow->reader->address }}</span></p>
                <p><strong class="text-secondary">Số điện thoại:</strong> <span class="text-success ms-2">{{ $borrow->reader->phone }}</span></p>               
                <p><strong class="text-secondary">Tên sách:</strong> <span class="text-success ms-2">{{ $borrow->book->name }}</span></p>
                <p><strong class="text-secondary">Tác giả:</strong> <span class="text-success ms-2">{{ $borrow->book->author }}</span></p>
                <p><strong class="text-secondary">Ngày mượn:</strong> <span class="text-success ms-2">{{ $borrow->borrow_date }}</span></p>
                <p><strong class="text-secondary">Ngày trả:</strong> <span class="text-success ms-2">{{ $borrow->return_date }}</span></p>
                <p><strong class="text-secondary">Trạng thái:</strong> 
                    <span class="text-success ms-2">
                        @if($borrow->status == 0) Chưa trả @else Đã trả @endif
                    </span>
                </p>

                <a href="{{ route('borrows.index') }}" class="btn btn-info text-white">Quay lại</a>
            </div>
        </div>
    </div>
@endsection
