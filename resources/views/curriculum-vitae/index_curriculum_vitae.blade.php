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
                <div class="col-md-6 cv-item">
                    <div class="col-md-3 img-cv">
                        <img src="{{ url('/') }}/images/khanhlinh.png">
                    </div>
                    <div class="col-md-9 info-cv">
                        <p class="cv-name">Trần Thanh Tuấn</p>
                        <p class="cv-scholl">ĐẠI HỌC BÁCH KHOA</p>
                        <p class="cv-info cv-address"><i></i>Cầu Giấy, Hà Nội</p>
                        <p class="cv-info cv-time-work"><i></i><span class="text-bold">Có thể làm từ:</span> 18h00 - 23h00</p>
                        <p class="cv-info cv-born"><i></i><span class="text-bold">Sinh năm:</span> 1997 - <span class="text-bold">Giới tính:</span> Nam</p>
                        <p class="cv-info cv-star"><i></i><i></i><i></i><i></i><i></i><i></i></p>
                    </div>
                </div>

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
