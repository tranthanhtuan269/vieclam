@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row pull-right">
                <a href="{{ url('/') }}/create-cv" class="btn btn-primary">Tạo Hồ Sơ</a>
                <a href="{{ url('/') }}/company/create" class="btn btn-primary">Tạo Trang Tuyển Dụng</a>
            </div>
        </div>
    </div>
</div>
@endsection
