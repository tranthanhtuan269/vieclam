@extends('layouts.frontend')

@section('content')
<div class="container curriculumvitae-list">
    <div class="row first-row">
        <button class="btn btn-primary">HỒ SƠ MỚI</button>
        <button class="btn btn-danger">HỒ SƠ VIP</button>
    </div>
    <div class="row first-row">
        <div class="col-md-9">
            <div class="row">
                @foreach($curriculumvitaes as $curriculumvitae)
                <div class="cv-item">
                    <div class="img-cv">
                        <img src="{{ url('/') }}/images/{{ $curriculumvitae->avatar }}">
                    </div>
                    <div class="info-cv">
                        <p class="cv-name">{{ $curriculumvitae->name }}</p>
                        <p class="cv-scholl">{{ $curriculumvitae->school }}</p>
                        <p class="cv-info cv-address"><i></i>{{ $curriculumvitae->district }}, {{ $curriculumvitae->city }}</p>
                        <p class="cv-info cv-time-work"><i></i><span class="text-bold">Có thể làm từ:</span> 18h00 - 23h00</p>
                        <p class="cv-info cv-born"><i></i><span class="text-bold">Sinh năm:</span> {{ substr($curriculumvitae->birthday, 6, 4) }} - <span class="text-bold">Giới tính:</span> @if($curriculumvitae->gender == 0) Nam @else Nữ; @endif</p>
                        <p class="cv-info cv-star"><i></i><i></i><i></i><i></i><i></i><i></i></p>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
    });
</script>
@endsection
