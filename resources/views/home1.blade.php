@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row pull-right">
                @if(Auth::check() && Auth::user()->hasRole('poster'))
                <a target="_self" href="{{ url('/') }}/company/create" class="btn btn-primary">Tạo Công ty</a>
                <a target="_self" href="{{ url('/') }}/job/create" class="btn btn-primary">Tạo Trang Tuyển Dụng</a>
                @elseif(Auth::check() && Auth::user()->hasRole('user'))
                <a target="_self" href="{{ url('/') }}/curriculumvitae/create" class="btn btn-primary">Tạo Hồ Sơ</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
