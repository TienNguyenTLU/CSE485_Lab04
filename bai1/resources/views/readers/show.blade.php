@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <p><strong class="text-secondary">Tên độc giả:</strong> <span class="text-success ms-2">{{ $reader->name }}</span></p>
                <p><strong class="text-secondary">Ngày sinh:</strong> <span class="text-success ms-2">{{ $reader->birthday }}</span></p>
                <p><strong class="text-secondary">Địa chỉ:</strong> <span class="text-success ms-2">{{ $reader->address }}</span></p>
                <p><strong class="text-secondary">Số điện thoại:</strong> <span class="text-success ms-2">{{ $reader->phone }}</span></p>
                <a href="{{ route('readers.index') }}" class="btn btn-info text-white">Quay lại</a>
            </div>
        </div>
    </div>
@endsection
