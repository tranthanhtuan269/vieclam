@extends('layouts.company')

@section('content')
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create New CurriculumVitae</div>
                <div class="panel-body">
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    {!! Form::open(['url' => '/curriculumvitae/store', 'class' => 'form-horizontal', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <img src="" id="avatar-image" class="img" style="height: 150px; width: 150px; background-color: #fff; border: 2px solid gray; border-radius: 5px;">
                                    <input type="file" name="avatar-img" id="avatar-img" style="display: none;">
                                    {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
                                {!! Form::label('birthday', 'Ngày sinh', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    <div class='input-group date' id='datetimepicker'>
                                        <input type='text' class="form-control" name="birthday" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                    {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                                {!! Form::label('city', 'Tỉnh / Thành phố', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    <select class="form-control" id="city" name="city"><option value="0">--Chọn Tỉnh / Thành Phố--</option><option value="1">Hà Nội</option><option value="2">Hồ Chí Minh</option><option value="3">Đà Nẵng</option><option value="4">Hải Phòng</option><option value="5">Cần Thơ</option><option value="6">An Giang</option><option value="7">Bà Rịa Vũng Tàu</option><option value="8">Bạc Liêu</option><option value="9">Bắc Cạn</option><option value="10">Bắc Giang</option><option value="11">Hải Dương</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Bình Dương</option><option value="15">Bình Định</option><option value="16">Bình Phước</option><option value="17">Bình Thuận</option><option value="18">Cà Mau</option><option value="19">Cao Bằng</option><option value="20">Đắk Lắk</option><option value="21">Đăk Nông</option><option value="22">Điện Biên</option><option value="23">Đồng Nai</option><option value="24">Đồng Tháp</option><option value="25">Gia Lai</option><option value="26">Hà Giang</option><option value="27">Hà Nam</option><option value="28">Hà Tĩnh</option><option value="29">Hậu Giang</option><option value="30">Hòa Bình</option><option value="31">Hưng Yên</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kon Tum</option><option value="35">Lai Châu</option><option value="36">Lâm Đồng</option><option value="37">Lạng Sơn</option><option value="38">Lào Cai</option><option value="39">Long An</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Tây Ninh</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thanh Hóa</option><option value="57">Huế</option><option value="58">Tiền Giang</option><option value="59">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select>
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('town') ? 'has-error' : ''}}">
                                {!! Form::label('town', 'Xã / Phường', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    <select class="form-control" id="town" name="town"><option value="0">--Chọn Phường / Xã --</option></select>
                                    {!! $errors->first('town', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                                {!! Form::label('gender', 'Giới tính', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    <label>{!! Form::radio('gender', '1', true); !!}Nam</label>
                                    <label>{!! Form::radio('gender', '0'); !!}Nữ</label>
                                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                                {!! Form::label('district', 'Quận / Huyện', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    <select class="form-control" id="district" name="district"><option value="0">--Chọn Quận / Huyện --</option></select>
                                    {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                {!! Form::label('address', 'Địa chỉ', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Số nhà và Đường']) !!}
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Quá trình học tập</div>
                        <div class="panel-body">
                            <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <label class="col-md-2">{!! Form::radio('gender', '0', true); !!}Chứng chỉ</label>
                                    <label class="col-md-5">{!! Form::radio('gender', '1'); !!}Sau Đại học/Đại học/Cao đẳng/Trung cấp</label>
                                    <label class="col-md-5">{!! Form::radio('gender', '2'); !!}Dưới Đại học/Cao đẳng/Trung cấp</label>
                                </div>
                                {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
                        {!! Form::label('education', 'Quá trình học tập', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('education', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('word_experience') ? 'has-error' : ''}}">
                        {!! Form::label('word_experience', 'Kinh nghiệm làm việc', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('word_experience', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('word_experience', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
                        {!! Form::label('language', 'Ngoại ngữ', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('language', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('interests') ? 'has-error' : ''}}">
                        {!! Form::label('interests', 'Sở thích', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('interests', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('interests', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('qualification') ? 'has-error' : ''}}">
                        {!! Form::label('qualification', 'Trình độ chuyên môn', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('qualification', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('qualification', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('career_objective') ? 'has-error' : ''}}">
                        {!! Form::label('career_objective', 'Mục tiêu nghề nghiệp', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('career_objective', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('career_objective', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
                        {!! Form::label('images', 'Ảnh ', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('images', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
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
//    CKEDITOR.replace('description');
$('#datetimepicker').datetimepicker({
    format: 'DD/MM/YYYY'
});
$('#avatar-image').on('click', function (e) {
    $('#avatar-img').click();
});
$('#avatar-img').on('change', function (e) {
    var fileInput = this;
    if (fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#avatar-image').attr('src', e.target.result);
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

