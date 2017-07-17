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
                            <div class="form-group {{ $errors->has('school') ? 'has-error' : ''}}">
                                <label for="birthday" class="col-md-2 control-label">Trường học</label>
                                <div class="col-md-4">
                                    <select class="form-control" id="school" name="school"><option value="0">--Chọn Trường học--</option><option value="1">Đại học Giáo dục</option>
                                        <option value="2">Đại học Kinh tế Quốc dân</option>
                                        <option value="3">Cao đẳng sư phạm trung ương</option>
                                        <option value="4">Đại học Ngoại Thương</option>
                                        <option value="9">Đại học lao động xã hội</option>
                                        <option value="10">ĐH Công Nghiệp Hà Nội</option>
                                        <option value="11">Đại học kinh tế kỹ thuật công nghiệp</option>
                                        <option value="12">Học viện tài chính</option>
                                        <option value="13">Cao đẳng kinh tế kỹ thuật và thưong mại</option>
                                        <option value="83">Trường Cao Đẳng Nghề Đà Nẵng</option>
                                        <option value="20">Đại học Kinh tế kỹ thuật công nghiệp</option>
                                        <option value="21">Đại học Ngoại ngữ-Đại học quốc gia</option>
                                        <option value="22">Học viện Ngoại giao</option>
                                        <option value="23">Đại học Mở Hà Nội</option>
                                        <option value="24">Đại học sư phạm Hà Nội</option>
                                        <option value="26">Đại học khoa học tự nhiên</option>
                                        <option value="27">Đại học FPT</option>
                                        <option value="28">Đại học Bách khoa</option>
                                        <option value="29">Đại học Y Hà Nội</option>
                                        <option value="30">Đại học dược Hà Nội</option>
                                        <option value="31">Đại học Luật Hà Nội</option>
                                        <option value="32">Học viện Công nghệ Bưu chính Viễn thông</option>
                                        <option value="33"> Đại học Thương Mại</option>
                                        <option value="34">Học viện phụ nữ Việt Nam</option>
                                        <option value="35">Cao Đẳng Công nghệ và thương mại Hà Nội</option>
                                        <option value="36">ĐH Lao động xã hội</option>
                                        <option value="37">ĐH Kinh Tế Quốc Dân</option>
                                        <option value="38">Đại học thành đô</option>
                                        <option value="39">Đại học Tài nguyên và môi trường Hà Nội</option>
                                        <option value="40">Đại học Mỏ Địa chất</option>
                                        <option value="41">Cao đẳng thương mại và du lịch</option>
                                        <option value="42">Học viện quản lý giáo dục </option>
                                        <option value="43">Đại học khoa học xã hội và nhân văn</option>
                                        <option value="44">Học viện báo chí và tuyên truyền</option>
                                        <option value="45">Đại học xây dựng</option>
                                        <option value="46">Đại học Kinh doanh và công nghệ Hà Nội</option>
                                        <option value="47">Đại học Thăng Long</option>
                                        <option value="48">Đại học sân khấu điện ảnh</option>
                                        <option value="52">Đại Học Kiến Trúc Hà Nội</option>
                                        <option value="53">Đại học Giao thông vận tải</option>
                                        <option value="54">Học viện kĩ thuật quân sự</option>
                                        <option value="55">Học viện nông nghiệp</option>
                                        <option value="56">Đại học Phương Đông</option>
                                        <option value="57">Đại học công nghệ giao thông vận tải</option>
                                        <option value="58">Đại học điện lực</option>
                                        <option value="59">Đại học Kinh tế</option>
                                        <option value="60">ĐH Công nghệ - ĐHQGHN</option>
                                        <option value="61">Khoa Y Dược - ĐHQGHN</option>
                                        <option value="62">Đại học công đoàn</option>
                                        <option value="63">Học viện Hậu Cần</option>
                                        <option value="64">Học viện Hành chính quốc gia</option>
                                        <option value="65">Học viện Ngân hàng</option>
                                        <option value="66">Đại học Thủy lợi</option>
                                        <option value="67">Đại học thủ đô</option>
                                        <option value="68">Đại học Hà Nội</option>
                                        <option value="69">Học viện y học cổ truyền</option>
                                        <option value="70">ĐH Giáo dục - ĐHQGHN</option>
                                        <option value="71">Học viện chính sách và phát triển</option>
                                        <option value="72">Đại học kinh tế - ĐHQGHN</option>
                                        <option value="73">Cao đẳng Hải Dương</option>
                                        <option value="74">Trường Cao Đẳng Phương Đông Đà Nẵng</option>
                                        <option value="75">Đại Học Kinh Tế Đà Nẵng</option>
                                        <option value="76">Đại Học Bách Khoa Đà Nẵng</option>
                                        <option value="77">Đại Học Đông Á Đà Nẵng</option>
                                        <option value="78">Đại Học Sư Phạm Đà Nẵng</option>
                                        <option value="79">Đại Học Ngoại Ngữ Đà Nẵng</option>
                                        <option value="80">Đại Học Kiến Trúc Đà Nẵng</option>
                                        <option value="81">Đại Học Duy Tân Đà Nẵng</option>
                                        <option value="82">Cao Đẳng Kinh Tế Kế Hoạch Đà Nẵng</option>
                                        <option value="84">Trường Cao Đẳng Thương Mại</option>
                                        <option value="85">Trường Cao Đẳng Nghề Đà Nẵng</option>
                                        <option value="86">Trường Cao Đẳng Nghề Việt Úc</option>
                                        <option value="87">Đại Học Kỹ Thuật Y Dược</option>
                                        <option value="88">Đại Học Thể Dục Thể Thao</option>
                                        <option value="89">Trường Cao Đẳng Công Nghệ</option>
                                        <option value="90">Trường Cao Đẳng Giao Thông Vận Tải II</option>
                                        <option value="91">Trường Cao Đẳng Bách Khoa</option>
                                        <option value="92">Trường Cao Đẳng Việt Hàn</option>
                                        <option value="93">Trường Trung Học Phổ Thông</option>
                                        <option value="94">Trường Cao Đẳng Công Nghệ Thông Tin</option>
                                        </select>
                                    {!! $errors->first('school', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-offset-2">{!! Form::radio('student_process', '0', true); !!}Đang học</label>
                                    <label class="col-sm-offset-2">{!! Form::radio('student_process', '1'); !!}Đã tốt nghiệp</label>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                                <label for="birthday" class="col-md-2 control-label">Thời gian học</label>
                                <div class="col-md-4">
                                    <select class="form-control" id="city" name="city"><option value="0">--Chọn Tỉnh / Thành Phố--</option><option value="1">Hà Nội</option><option value="2">Hồ Chí Minh</option><option value="3">Đà Nẵng</option><option value="4">Hải Phòng</option><option value="5">Cần Thơ</option><option value="6">An Giang</option><option value="7">Bà Rịa Vũng Tàu</option><option value="8">Bạc Liêu</option><option value="9">Bắc Cạn</option><option value="10">Bắc Giang</option><option value="11">Hải Dương</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Bình Dương</option><option value="15">Bình Định</option><option value="16">Bình Phước</option><option value="17">Bình Thuận</option><option value="18">Cà Mau</option><option value="19">Cao Bằng</option><option value="20">Đắk Lắk</option><option value="21">Đăk Nông</option><option value="22">Điện Biên</option><option value="23">Đồng Nai</option><option value="24">Đồng Tháp</option><option value="25">Gia Lai</option><option value="26">Hà Giang</option><option value="27">Hà Nam</option><option value="28">Hà Tĩnh</option><option value="29">Hậu Giang</option><option value="30">Hòa Bình</option><option value="31">Hưng Yên</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kon Tum</option><option value="35">Lai Châu</option><option value="36">Lâm Đồng</option><option value="37">Lạng Sơn</option><option value="38">Lào Cai</option><option value="39">Long An</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Tây Ninh</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thanh Hóa</option><option value="57">Huế</option><option value="58">Tiền Giang</option><option value="59">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select>
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-offset-2">{!! Form::radio('student_process', '0', true); !!}Đang học</label>
                                    <label class="col-sm-offset-2">{!! Form::radio('student_process', '1'); !!}Đã tốt nghiệp</label>
                                </div>
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

