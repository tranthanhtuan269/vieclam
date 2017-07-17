@extends('layouts.company')

@section('content')
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
                        <div class="col-md-10">
                            
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
                        {!! Form::label('birthday', 'Birthday', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::input('datetime-local', 'birthday', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                        {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::number('gender', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                        {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::number('city', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                        {!! Form::label('district', 'District', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::number('district', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('town') ? 'has-error' : ''}}">
                        {!! Form::label('town', 'Town', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::number('town', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('town', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
                        {!! Form::label('education', 'Education', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('education', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('word_experience') ? 'has-error' : ''}}">
                        {!! Form::label('word_experience', 'Word Experience', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('word_experience', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('word_experience', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
                        {!! Form::label('language', 'Language', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('language', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('interests') ? 'has-error' : ''}}">
                        {!! Form::label('interests', 'Interests', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('interests', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('interests', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('references') ? 'has-error' : ''}}">
                        {!! Form::label('references', 'References', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('references', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('references', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('qualification') ? 'has-error' : ''}}">
                        {!! Form::label('qualification', 'Qualification', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('qualification', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('qualification', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('career_objective') ? 'has-error' : ''}}">
                        {!! Form::label('career_objective', 'Career Objective', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('career_objective', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('career_objective', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
                        {!! Form::label('images', 'Images', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('images', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                        {!! Form::label('active', 'Active', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::number('active', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
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

