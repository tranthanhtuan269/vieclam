@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tạo trang công ty</div>
                <div class="panel-body">
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    {!! Form::open(['url' => '/company/store', 'class' => 'form-horizontal', 'files' => true, 'id' => 'create-company']) !!}

                    <div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">

                        <div class="col-md-12">
                            <img src="" id="banner-image" class="img" style="height: 160px; width: 100%; background-color: #fff; border: 2px solid gray; border-radius: 5px;">
                            <input type="file" name="banner-img" id="banner-img" style="display: none;">
                            {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <img src="" id="logo-image" class="img" style="height: 150px; width: 150px; background-color: #fff; border: 2px solid gray; border-radius: 5px;">
                                    <input type="file" name="logo-img" id="logo-img" style="display: none;">
                                    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Tên nhà tuyển dụng']) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('sub_name') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::text('sub_name', null, ['class' => 'form-control', 'placeholder' => 'Tên viết tắt']) !!}
                                    {!! $errors->first('sub_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <select class="form-control" id="city" name="city"><option value="0">--Chọn Tỉnh / Thành Phố--</option><option value="1">Hà Nội</option><option value="2">Hồ Chí Minh</option><option value="3">Đà Nẵng</option><option value="4">Hải Phòng</option><option value="5">Cần Thơ</option><option value="6">An Giang</option><option value="7">Bà Rịa Vũng Tàu</option><option value="8">Bạc Liêu</option><option value="9">Bắc Cạn</option><option value="10">Bắc Giang</option><option value="11">Hải Dương</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Bình Dương</option><option value="15">Bình Định</option><option value="16">Bình Phước</option><option value="17">Bình Thuận</option><option value="18">Cà Mau</option><option value="19">Cao Bằng</option><option value="20">Đắk Lắk</option><option value="21">Đăk Nông</option><option value="22">Điện Biên</option><option value="23">Đồng Nai</option><option value="24">Đồng Tháp</option><option value="25">Gia Lai</option><option value="26">Hà Giang</option><option value="27">Hà Nam</option><option value="28">Hà Tĩnh</option><option value="29">Hậu Giang</option><option value="30">Hòa Bình</option><option value="31">Hưng Yên</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kon Tum</option><option value="35">Lai Châu</option><option value="36">Lâm Đồng</option><option value="37">Lạng Sơn</option><option value="38">Lào Cai</option><option value="39">Long An</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Tây Ninh</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thanh Hóa</option><option value="57">Huế</option><option value="58">Tiền Giang</option><option value="59">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select>
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('town') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <select class="form-control" id="town" name="town"><option value="0">--Chọn Phường / Xã --</option></select>
                                    {!! $errors->first('town', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group {{ $errors->has('tax_code') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::text('tax_code', null, ['class' => 'form-control', 'placeholder' => 'Mã số thuế']) !!}
                                    {!! $errors->first('tax_code', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::select('size', [
                                    '0' => 'Quy mô', 
                                    '1' => 'Dưới 20 người', 
                                    '2' => 'Từ 20- 50 người', 
                                    '3' => 'Từ 51-100 người', 
                                    '4' => 'Từ 101 -1000 người',
                                    '5' => 'Trên 1000 người'
                                    ], null, array('class' => 'form-control')) !!}
                                    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <select class="form-control" id="district" name="district"><option value="0">--Chọn Quận / Huyện --</option></select>
                                    {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Số nhà và Đường']) !!}
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group {{ $errors->has('sologan') ? 'has-error' : ''}}">
                        <div class="col-md-12">
                            {!! Form::text('sologan', null, ['class' => 'form-control', 'placeholder' => 'Khẩu hiệu']) !!}
                            {!! $errors->first('sologan', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group {{ $errors->has('jobs') ? 'has-error' : ''}}">
                        <div class="col-md-12">
                            <input type="hidden" id="jobs" name="jobs" value="">
                            <select class="form-control selectpicker" multiple title="Chọn ngành nghề">
                                <option>Làm bán thời gian</option>
                                <option>Bán hàng</option>
                                <option>Marketing-PR</option>
                                <option>Bảo vệ</option>
                                <option>Du lịch</option>
                                <option>Sale/Marketing online</option>
                                <option>Promotion Girl(PG)</option>
                                <option>Thực tập</option>
                                <option>Phụ bếp</option>
                                <option>Người giúp việc</option>
                                <option>Bếp chính</option>
                                <option>Nhân viên spa</option>
                                <option>Pha chế</option>
                                <option>Bell man</option>
                                <option>Chăm sóc khách hàng</option>
                                <option>Giao nhận, ship</option>
                                <option>Kinh doanh</option>
                                <option>Hành chính nhân sự</option>
                                <option>Phiên dịch</option>
                                <option>Gia sư</option>
                                <option>Hướng dẫn viên</option>
                                <option>Giám sát, quản lý</option>
                                <option>Phục vụ, bồi bàn</option>
                                <option>Telesale</option>
                                <option>Cộng tác viên</option>
                                <option>Phụ bếp</option>
                                <option>Lễ tân</option>
                                <option>Thu ngân</option>
                                <option>Marketing online</option>
                                <option>Phát tờ rơi</option>
                                <option>Buồng phòng</option>
                                <option>Pha chế</option>
                                <option>Shipper</option>
                                <option>Kế toán</option>
                            </select>
                            {!! $errors->first('jobs', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                        <div class="col-md-12">
                            <label class="control-label">Thêm mô tả</label>
                        </div>
                        <div class="col-md-12">
                            {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
                        <div class="col-md-12">
                            <label class="control-label">Thêm ảnh</label>
                        </div>
                        <div class="col-md-12">
                            <div id="images-plus"></div>
                            <img src="{{ url('/') }}/images/icons8-Add-Image-50.png" id="images" class="img" style="height: 50px; width: 50px;">
                            <input type="file" name="images-img[]" id="images-img" style="display: none;" multiple>
                            {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            <button class="btn btn-primary" id="submit-btn">Tạo mới</button>
                            <a href="{{ url('/home') }}" class="btn btn-primary">Trở về trang chủ</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    CKEDITOR.replace('description');
    $('#logo-image').on('click', function (e) {
        $('#logo-img').click();
    });
    $('#logo-img').on('change', function (e) {
        var fileInput = this;
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#logo-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    $('#banner-image').on('click', function (e) {
        $('#banner-img').click();
    });
    $('#banner-img').on('change', function (e) {
        var fileInput = this;
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#banner-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    $('#images').on('click', function (e) {
        $('#images-img').click();
    });
    $('#images-img').on('change', function (e) {
        var fileInput = this;
        var i = 0;
        $(fileInput.files).each(function (index) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var html = '<img src="' + e.target.result + '" id="images" class="img" style="width: 150px;">';
                $('#images-plus').append(html);
            }
            reader.readAsDataURL(fileInput.files[i]);
            i++;
        });
    });

    $("#city").change(function () {
        var citId = $("#city").val();
        var request = $.ajax({
            url: "{{ URL::to('/') }}/getDistrict/" + citId,
            method: "GET",
            dataType: "html"
        });

        request.done(function (msg) {
            $("#district").html(msg);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });

    $("#district").change(function () {
        var districtId = $("#district").val();
        var request = $.ajax({
            url: "{{ URL::to('/') }}/getTown/" + districtId,
            method: "GET",
            dataType: "html"
        });

        request.done(function (msg) {
            $("#town").html(msg);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });

    $("#submit-btn").click(function () {
        var listJobs = '';
        $('.dropdown-menu.inner>li.selected').each(function (index) {
            listJobs += $(this).text() + ';';
        });

        $('#description').val(CKEDITOR.instances["description"].getData());
        $('#jobs').val(listJobs);
        $("#create-company").submit();
    });
});
</script>
@endsection
