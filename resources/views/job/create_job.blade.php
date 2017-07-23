@extends('layouts.company')

@section('content')
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<script src="{{ url('/') }}/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/sweetalert/sweetalert.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tạo trang tuyển dụng</div>
                <div class="panel-body">
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    {!! Form::open(['url' => '/job/store', 'class' => 'form-horizontal', 'files' => true, 'id' => 'create-job']) !!}
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Tên công việc']) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::number('number', null, ['class' => 'form-control', 'placeholder' => 'Số lượng']) !!}
                                    {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('expiration_date') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <div class='input-group date' id='datetimepicker'>
                                        <input type='text' class="form-control" name="expiration_date" id="expiration_date" placeholder="Ngày hết hạn" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                    {!! $errors->first('expiration_date', '<p class="help-block">:message</p>') !!}
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
                            <div class="form-group {{ $errors->has('requirement') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <label class="control-label">Yêu cầu công việc</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::text('requirement', null, ['class' => 'form-control', 'id' => 'requirement']) !!}
                                    {!! $errors->first('requirement', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group {{ $errors->has('time_start') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <div class='input-group date' id='datetimepicker'>
                                        <input type='text' class="form-control" name="time_start" id="time_start" placeholder="Thời gian đi làm" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                    {!! $errors->first('time_start', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <select class="form-control" id="city" name="city"><option value="0">--Chọn Tỉnh / Thành Phố--</option><option value="1">Hà Nội</option><option value="2">Hồ Chí Minh</option><option value="3">Đà Nẵng</option><option value="4">Hải Phòng</option><option value="5">Cần Thơ</option><option value="6">An Giang</option><option value="7">Bà Rịa Vũng Tàu</option><option value="8">Bạc Liêu</option><option value="9">Bắc Cạn</option><option value="10">Bắc Giang</option><option value="11">Hải Dương</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Bình Dương</option><option value="15">Bình Định</option><option value="16">Bình Phước</option><option value="17">Bình Thuận</option><option value="18">Cà Mau</option><option value="19">Cao Bằng</option><option value="20">Đắk Lắk</option><option value="21">Đăk Nông</option><option value="22">Điện Biên</option><option value="23">Đồng Nai</option><option value="24">Đồng Tháp</option><option value="25">Gia Lai</option><option value="26">Hà Giang</option><option value="27">Hà Nam</option><option value="28">Hà Tĩnh</option><option value="29">Hậu Giang</option><option value="30">Hòa Bình</option><option value="31">Hưng Yên</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kon Tum</option><option value="35">Lai Châu</option><option value="36">Lâm Đồng</option><option value="37">Lạng Sơn</option><option value="38">Lào Cai</option><option value="39">Long An</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Tây Ninh</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thanh Hóa</option><option value="57">Huế</option><option value="58">Tiền Giang</option><option value="59">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select>
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <select class="form-control" id="district" name="district"><option value="0">--Chọn Quận / Huyện --</option></select>
                                    {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <select class="form-control" id="position" name="position">
                                        <option value="0">--Chức vụ--</option>
                                        <option value="1">Nhân viên thời vụ</option>
                                        <option value="2">Nhân viên</option>
                                        <option value="3">Trưởng nhóm</option>
                                        <option value="4">Trưởng phòng</option>
                                        <option value="5">Phó giám đốc</option>
                                        <option value="6">Giám đốc</option>
                                    </select>
                                    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('job_type') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <input type="hidden" id="job_type" name="job_type" value="">
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
                                    {!! $errors->first('job_type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <input type="hidden" id="education" name="education" value="0">
                                    <select class="form-control" title="Yêu cầu bằng cấp" id="education_select" name="education_select">
                                        <option value="0">Không yêu cầu bằng cấp</option>
                                        <option value="1">Cửa nhân</option>
                                        <option value="2">Kỹ sư</option>
                                        <option value="3">MBA</option>
                                        <option value="4">Thạc sĩ</option>
                                        <option value="5">Tiến sĩ</option>
                                    </select>
                                    {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('experience') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <input type="hidden" id="experience" name="experience" value="0">
                                    <select class="form-control" title="Kinh nghiệm" id="experience_select" name="experience_select">
                                        <option value="0">Không yêu cầu kinh nghiệm</option>
                                        <option value="1">1 năm</option>
                                        <option value="2">2 năm</option>
                                        <option value="3">3 năm</option>
                                        <option value="4">4 năm</option>
                                        <option value="5">5 năm</option>
                                        <option value="6">Trên 5 năm</option>
                                    </select>
                                    {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <input type="hidden" id="salary" name="salary" value="0">
                                    <select class="form-control" title="Mức lương" id="salary_select" name="salary_select">
                                        <option value="0">Thỏa thuận mức lương</option>
                                        <option value="1">Dưới 1 triệu</option>
                                        <option value="2">1 - 2 triệu</option>
                                        <option value="3">2 - 3 triệu</option>
                                        <option value="4">2 - 4 triệu</option>
                                        <option value="5">4 - 5 triệu</option>
                                        <option value="6">5 - 8 triệu</option>
                                        <option value="7">8 - 12 triệu</option>
                                        <option value="8">12 - 15 triệu</option>
                                        <option value="9">15 - 20 triệu</option>
                                        <option value="10">Trên 20 năm</option>
                                    </select>
                                    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('work_type') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <input type="hidden" id="work_type" name="work_type" value="0">
                                    <select class="form-control" title="Hình thức làm việc" id="work_type_select" name="work_type_select">
                                        <option value="0">Bán thời gian</option>
                                        <option value="1">Toàn thời gian</option>
                                    </select>
                                    {!! $errors->first('work_type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <input type="hidden" id="age" name="age" value="0">
                                    <select class="form-control" title="Độ tuổi" id="age_select" name="age_select">
                                        <option value="0">Không yêu cầu độ tuổi</option>
                                        <option value="1">18 - 24 tuổi</option>
                                        <option value="2">Trên 24 tuổi</option>
                                    </select>
                                    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <input type="hidden" id="gender" name="gender" value="0">
                                    <select class="form-control" title="Hình thức làm việc" id="gender_select" name="gender_select">
                                        <option value="0">Không yêu cầu giới tính</option>
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('benefit') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <label class="control-label">Quyền lợi</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::text('benefit', null, ['class' => 'form-control', 'id' => 'benefit']) !!}
                                    {!! $errors->first('benefit', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('public') ? 'has-error' : ''}}">
                                <div class="col-md-12">
                                    <select class="form-control" id="public" name="public"><option value="0">Hiển thị với ứng viên</option><option value="1">Không hiển thị</option></select>
                                    {!! $errors->first('public', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
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
    CKEDITOR.replace('requirement');
    CKEDITOR.replace('benefit');

    $('#time_start').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('#expiration_date').datetimepicker({
        format: 'DD/MM/YYYY'
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

    $("#job_type_select").change(function () {
        $("#job_type").val($(this).val());
    });

    $("#education_select").change(function () {
        $("#education").val($(this).val());
    });

    $("#experience_select").change(function () {
        $("#experience").val($(this).val());
    });

    $("#salary_select").change(function () {
        $("#salary").val($(this).val());
    });

    $("#work_type_select").change(function () {
        $("#work_type").val($(this).val());
    });

    $("#age_select").change(function () {
        $("#age").val($(this).val());
    });

    $("#gender_select").change(function () {
        $("#gender").val($(this).val());
    });

    $("#submit-btn").click(function () {
        var listJobs = '';
        $('.dropdown-menu.inner>li.selected').each(function (index) {
            listJobs += $(this).text() + ';';
        });

        $('#description').val(CKEDITOR.instances["description"].getData());
        $('#requirement').val(CKEDITOR.instances["requirement"].getData());
        $('#benefit').val(CKEDITOR.instances["benefit"].getData());
        $('#job_type').val(listJobs);
        $("#create-job").submit();
    });
});
</script>
@endsection
