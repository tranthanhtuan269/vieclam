<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Gmon') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
    <script src="{{ url('/') }}/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/home.css">
</head>
<body class="homepage">
    <header>
        <div class="header-top clearfix">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="row">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                                <img src="{{ url('/') }}/images/menu.png" alt="" width="25px">
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <div class="row">
                                <div class="link-left">
                                    <a href="{{ url('/') }}"><i></i>Trang chủ</a>
                                    <a href=""><i></i>Việc làm</a>
                                    <a href=""><i></i>Nhà tuyển dụng</a>
                                </div>
                                <div class="login">
                                    @if (Auth::guest())
                                    <a data-toggle="modal" data-target="#myModal" onclick="onOpenLogin()"><i></i>Đăng nhập</a>
                                    <a data-toggle="modal" data-target="#myModal" onclick="onOpenRegister()">Đăng ký</a>
                                        <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <button class="exit-login visible-xs" onclick="onCloseModalLogin()" style="margin-bottom: 5px;line-height: 0;background-color: transparent;border:1px solid #C9C9C9;padding: 5px"><img src="{{ url('/') }}/images/del.png" width="15px" alt=""></button>
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div style="margin:-15px -15px 0 -15px!important;">
                                                    <ul class="nav nav-justified header-tab-login">
                                                        <li class=""><a data-toggle="tab" href="#login">Đăng nhập</a></li>
                                                        <li class=""><a data-toggle="tab" href="#register">Đăng ký</a></li>
                                                    </ul>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div id="register" class="tab-pane fade">
                                                            <h3>ĐĂNG KÝ TÀI KHOẢN GMON NGAY !</h3>
                                                            <form method="post">
                                                                <!-- <div class="row text-center">
                                                                    <p>Tiếp tục với</p>
                                                                    <a href="#" class="facebook"><i></i> Facebook</a>
                                                                    <a href="#" class="google"><i></i> Google</a>
                                                                    <span class="col-md-12" style="display: inline-block;margin-bottom: 30px"><hr style="float: left;width: 40%;margin-top: 25px">Hoặc<hr style="float: right;width: 40%;margin-top: 25px"></span>
                                                                </div> -->
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group ">
                                                                        <input type="text" class="form-control" id="firstname" placeholder="Họ" required autofocus><span class="required">*</span>
                                                                    </div>
                                                                    <div class="col-md-6 form-group ">
                                                                        <input type="text" class="form-control" id="lastname" placeholder="Tên" required><span class="required">*</span>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <input type="number" class="form-control" id="sdt" placeholder="Số điện thoại" required><span class="required">*</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <input type="email" class="form-control" id="register-email" placeholder="Email" required><span class="required">*</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group ">
                                                                        <input type="password" class="form-control" id="register-password" placeholder="Mật khẩu" required><span class="required">*</span>
                                                                    </div>
                                                                    <div class="col-md-6 form-group ">
                                                                        <input type="password" class="form-control" id="r_password" placeholder="Xác nhận mật khẩu" required><span class="required">*</span>
                                                                    </div>
                                                                </div>
                                                                <div style="margin-top: -5px;margin-bottom: 20px">
                                                                    <label for="">Bạn là:</label>
                                                                    <select name="" id="">
                                                                        <option value="ung_vien">Ứng viên</option>
                                                                        <option value="ntd">Nhà tuyển dụng</option>
                                                                    </select>
                                                                </div>
                                                                <div class="text-center">
                                                                    <div id="register-btn" class="btn btn-primary">ĐĂNG KÝ NGAY</div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="login" class="tab-pane fade">
                                                            <!-- <h3>ĐĂNG NHẬP</h3> -->
                                                            <form>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <input type="email" class="form-control" id="login-email" placeholder="Email" required autofocus>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <input type="password" class="form-control" id="login-password" placeholder="Mật khẩu" required>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <div id="login-btn" class="btn btn-primary">ĐĂNG NHẬP</div>
                                                                </div>
                                                                <hr>
                                                                <p class="text-center">Hoặc đăng nhập nhanh bằng</p>
                                                                <div class="row text-center">
                                                                    <a href="{{ url('/auth/facebook') }}" class="facebook"><i></i> Facebook</a>
                                                                    <a href="{{ url('/auth/google') }}" class="google"><i></i> Google</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                    </div>
                                    @else
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                @if(Auth::check() && Auth::user()->hasRole('admin'))
                                                    <li><a href="{{ url('/admin') }}">Administrator</a></li>
                                                @else 
                                                @endif
                                                <li>
                                                    <a href="{{ url('/logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        Đăng Xuất
                                                    </a>

                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="header-mid">
            <div class="container" >
                <div class="clearfix row" style="padding-bottom: 30px">
                    <div class="col-md-3">
                        <a href="" class="logo row"><img src="{{ url('/') }}/images/home.png" alt=""></a>
                    </div>
                    <div class="col-md-9" style="margin-top: 30px">
                        <div class="">
                            <div class="col-md-9">
                                <form class="search">
                                    <input type="text" name="" id="" class="col-md-5" placeholder="Nhập tên công việc">
                                    <span> <i></i>
                                        <select id="tinh">
                                            <option>Hà Nội</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </span>
                                    <span> <i></i>
                                        <select id="quanhuyen">
                                            <option>Quận/Huyện</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </span>
                                    <button type="submit" class="hidden-xs"><i></i></button>
                                    <button type="submit" class="visible-xs" style="width: auto;border:1px solid #EBEAEA;padding:5px 7px;height: auto;margin:auto;margin-top: 10px;background-color: #F5F5F5;color:#A8A8A8;border-radius: 4px">Tìm kiếm</button>
                                </form>
                                <div class="city">
                                    <a href="{{ url('/') }}/?city=1">Hà Nội</a>
                                    <a href="{{ url('/') }}/?city=2">TP HCM</a>
                                    <a href="{{ url('/') }}/?city=3">Đà Nẵng</a>
                                    <a href="{{ url('/') }}/?city=4">Hải Phòng</a>
                                    <a href="{{ url('/') }}/?city=14">Bình Dương</a>
                                </div>
                            </div>
                            <div class="col-md-3 clearfix">
                                <div class="contact row">
                                    <p><i></i>0977898312</p>
                                    <p><i></i>vieclamhn@gmon.vn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bot">
            <div class="container clearfix">
                <div class="row">
                    <div class="menu-left">
                        <a href=""><i></i>Khách sạn</a>
                        <a href=""><i></i>Nhà hàng</a>
                        <a href=""><i></i>Cửa hàng</a>
                        <a href=""><i></i>Doanh nghiệp</a>
                        <a href=""><i></i>Nhân sự tài năng</a>
                    </div>
                    <div class="menu-right">
                        <a href="{{ url('/') }}/curriculumvitae/create"><i></i>Tạo hồ sơ</a>
                        <a href=""><i></i>Trang tuyển dụng</a>
                    </div>
                </div>
                
            </div>
        </div>

    </header>
    <div class="container ads">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <div class="banner row">
                    <a href=""><img src="{{ url('/') }}/images/slide.png" alt="" width="100%" ;></a>
                </div>
                <div class="row news">
                    <div class="col-md-6" style="margin-right: -1px">
                        <div class="top row">
                            <div class="col-md-4 col-xs-4"><a href="{{ url('/') }}/?city=1" @if($city == 1) class="active" @endif>Hà Nội</a></div>
                            <div class="col-md-4 col-xs-4"><a href="{{ url('/') }}/?city=3" @if($city == 3) class="active" @endif>Đà Nẵng</a></div>
                            <div class="col-md-4 col-xs-4"><a href="{{ url('/') }}/?city=2" @if($city == 2) class="active" @endif>TP.HCM</a></div>
                        </div>
                        <div class="row title">
                            Tìm kiếm việc làm theo các quận
                        </div>
                        <div class="row contentsLeft" id="list-districts">
                            @foreach($districts as $district)
                                <a href="{{ url('/') }}/?district={{ $district->id }}">{{ $district->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 " >
                        <div class="row top">
                            <span>VIỆC LÀM HẲNG NGÀY</span> 
                        </div>
                        <div class="row title">
                            Tìm kiếm việc làm hằng ngày
                        </div>
                        <div class="contentsRight">
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <p>Hôm nay</p>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                </div>
                                <div class="col-md-3 col-xs-3">
                                </div>
                                <div class="col-md-3 col-xs-3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <div class="point"><a  class="active"></a><hr class="right"></div>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <div class="point"><a  class=""></a><hr></div>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <div class="point"><a  class=""></a><hr></div>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <div class="point"><a class=""></a><hr class="left"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <p>04/07</p>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <p>04/07</p>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <p>04/07</p>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <p>04/07</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="ads-top"><a href=""><img src="{{ url('/') }}/images/ads.png" alt=""></a></div>
                <div class="ads-bot">
                    <a href=""><img src="{{ url('/') }}/images/zalo.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="list-logo clearfix">
        <div class="container" style="position: relative;">
            <span id="btPrev" class="btPrev"></span>
            <span id="btNext" class="btNext"></span>
            <div class="wrapper row" id="wrapper-logo">
                <div class="contents clearfix" id="contents-logo">
                    <ul>
                        <li class="item-logo"><a href=""><img src="{{ url('/') }}/images/logoHome.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome1.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome2.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome3.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome4.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome5.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome6.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome7.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome8.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome3.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome10.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome11.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome12.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome2.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome3.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome5.png" alt=""></a></li>
                        <li><a href=""><img src="{{ url('/') }}/images/logoHome.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container list-info">
        <div class="vip-candidates row">
            <div class="title clearfix"><span>Ứng viên VIP <i class="hot"></i></span><a href="">984 ứng viên VIP <i></i></a></div>
            <div class="clearfix wrapper" id="wrapper-candidates">
                @foreach($cvs as $cv)
                <div class="item-u" >
                    <a href="{{ url('/') }}/curriculumvitae/{{ $cv->id }}" onmouseenter="onFocusCandidates(event)" onmouseleave ="onDisFocusCandidates(event)">
                        <div class="img"><img src="{{ url('/') }}/images/{{ $cv->avatar }}" alt=""></div>
                        <p class="name text-center">{{ $cv->username }}</p>
                        <p class="university text-center">Sinh viên ĐH Ngoại Giao</p>
                        <div class="view">
                            <div class="info">
                                <div class="sub-img"><div class="border"><img src="{{ url('/') }}/images/{{ $cv->avatar }}" alt=""></div></div>
                                <p>{{ $cv->username }}</p>
                                <p>{{ $cv->birthday }}</p>
                                <!-- <p>CLB AIESEC Hà Nội</p> -->
                            </div>
                            <div class="link">
                                Xem hồ sơ của tôi &rsaquo;
                            </div>
                        </div>
                    </a>
                </div>  
                @endforeach
            </div>
        </div>
        <div class="hot-jobs row">
            <div class="title clearfix"><span>Việc làm HOT <i class="hot"></i></span><a href="">101 việc làm HOT <i></i></a></div>
            <div class="wrapper" id="wrapper4">
                <div style="width: 100%;overflow: visible;display: inline-block;position: relative;">
                    <div class="contents">
                        @foreach($jobs as $job)
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/{{ $job->logo }}" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>{{ $job->name }} tại {{ $job->companyname }}</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>{{ $job->district }}, {{ $job->city }}</p>
                                            <p class="salary"><i></i>{{ $job->salary }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="need-jobs row">
            <div class="title clearfix"><span>Đang tuyển GẤP <i></i></span><a href="">101 việc làm GẤP <i></i></a></div>
            <div class="wrapper" id="wrapper3">
                <div style="width: 100%;overflow: visible;display: inline-block;position: relative;">
                    <div class="contents">
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="col-ads">
                <a href="">
                    <img src="{{ url('/') }}/images/ads2.png" alt="">
                </a>
            </div>
        </div>
        <div class="new-jobs row">
            <div class="title clearfix"><span>Việc làm mới </span><i class="new"></i></div>
            <div class="wrapper" id="wrapper">
                <div class="prev" id="btPrevNewJobs"><img src="{{ url('/') }}/images/prev.png" alt=""></div>
                <div class="next"  id="btNextNewJobs"><img src="{{ url('/') }}/images/next.png" alt=""></div>
                <div style="width: 100%;overflow: hidden;display: inline-block;position: relative;">
                    <div class="contents" id="contents-jobs">
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <span class="icon-new"><img src="{{ url('/') }}/images/icon-new.png" alt=""></span>
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks </p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="new-employer row">
            <div class="title clearfix"><span>Nhà tuyển dụng mới</span> <i class="new"></i></div>
            <div class="wrapper" id="wrapper2">
                <div class="prev" id="btPrevNewEmployer"><img src="{{ url('/') }}/images/prev.png" alt=""></div>
                <div class="next"  id="btNextNewEmployer"><img src="{{ url('/') }}/images/next.png" alt=""></div>
                <div style="width: 100%;overflow: hidden;display: inline-block;position: relative;">
                    <div class="contents" id="contents-employer">
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <span class="icon-new"><img src="{{ url('/') }}/images/icon-new.png" alt=""></span>
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung2.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item-work" >
                            <div class="border-item">
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <div class="single"><p>Starbucks Coffee</p></div>
                                        <div class="work-view">
                                            <p>Xem thêm &rsaquo;&rsaquo;</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container list-number">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="col-md-5 col-xs-5">
                    <i></i>
                </div>
                <div class="col-md-7 col-xs-7">
                    <div class="row info">
                        <p class="text">Hồ sơ ứng viên</p>
                        <p class="number">4626 <a href="">&rsaquo;</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="col-md-5 col-xs-5">
                    <i></i>
                </div>
                <div class="col-md-7 col-xs-7">
                    <div class="row info">
                        <p class="text">Freelance</p>
                        <p class="number">1126 <a href="">&rsaquo;</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="col-md-5 col-xs-5">
                    <i></i>
                </div>
                <div class="col-md-7 col-xs-7">
                    <div class="row info">
                        <p class="text">Tài năng</p>
                        <p class="number">1452 <a href="">&rsaquo;</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="col-md-5 col-xs-5">
                    <i></i>
                </div>
                <div class="col-md-7 col-xs-7">
                    <div class="row info">
                        <p class="text">Tài năng đại học</p>
                        <p class="number">2332 <a href="">&rsaquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer-top row">
                <div class="col-md-4 col-xs-6 footer-col">
                    <p class="title">về gmon</p>
                    <p><a href="">Giới thiệu</a></p>
                    <p><a href="">Việc làm</a></p>
                    <p><a href="">Nhà tuyển dụng</a></p>
                    <p><a href="">Hồ sơ ứng viên</a></p>
                    <p><a href="">Nhà tuyển dụng</a></p>
                </div>
                <div class="col-md-3 col-xs-6 footer-col">
                    <p class="title">công cụ</p>
                    <p><a href="">Hồ sơ</a></p>
                    <p><a href="">Việc làm của tôi</a></p>
                    <p><a href="">Thông báo việc làm</a></p>
                    <p><a href="">Phản hồi</a></p>
                    <p><a href="">Tư vấn nghề nghiệp</a></p>
                </div>
                <div class="col-md-5 contact col-xs-12 footer-col">
                    <p class="title">kết nối với gmon</p>
                    <p class="mxh">
                        <a href=""></a>
                        <a href=""></a>
                        <a href=""></a>
                    </p>
                </div>
            </div>
            <div class="footer-bot row">
                <div class="col-md-8">
                    <p>Công ty cổ phần Giải pháp và công nghệ GMon</p>
                    <p>Địa chỉ: Tầng 8 - Tòa nhà Trần Phú - số 17 tổ 24 đường Dương Đình Nghệ - P.Yên Hòa - Q.Cầu Giấy - Hà Nội</p>
                    <p>Điện thoại: 04.3212.1515</p>
                    <p>Email nhà tuyển dụng: vieclamhn@gmon.vnEmail nhà tuyển dụng</p>
                    <p>Email ứng viên: tuyendunghn@gmon.vn</p>
                </div>
                <div class="col-md-4">
                    <p style="margin-top: 15px">&#64; 2016-2017 Gmon.vn,inc. All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        window.onresize = function(event){
            resetSlide();
        }
        window.onload =function(){resetSlide();}
        function resetSlide()
        {
            clearTimeout(listLogo.action);
            clearTimeout(listNewEmployer.action);
            clearTimeout(listNewJobs.action);
            $( "#"+listLogo.contents ).css("margin-left","0");
            $( "#"+listNewEmployer.contents ).css("margin-left","0");
            $( "#"+listNewJobs.contents ).css("margin-left","0");
            var w=screen.width;
            var w2=$(".new-jobs #wrapper").outerWidth();
            var w3;
            if(w>1000){
                w3=w2/5;
                $(".need-jobs .wrapper" ).css("width",w3*4+"px");
                $(".need-jobs .title" ).css("width",w3*4+"px");
                $("#col-ads").css("width",w3+"px");
            }else if(w>800){
                w3=w2/4;
                $(".need-jobs .wrapper" ).css("width",w3*3+"px");
                $(".need-jobs .title" ).css("width",w3*3+"px");
                $("#col-ads").css("width",w3+"px");
            }else if(w>600){
                w3=w2/3;
                $(".need-jobs .wrapper" ).css("width",w3*2+"px");
                $(".need-jobs .title" ).css("width",w3*2+"px");
                $("#col-ads").css("width",w3+"px");
            }else if(w>400){
                w3=w2/2;
            }else{
                w3=w2;
            }
            $(".item-work").css("width",w3+"px");
            $(".new-jobs .contents" ).css("width",w3*( $( "#contents-jobs .item-work" ).length)+"px");
            $(".new-employer .contents" ).css("width",w3*( $( "#contents-employer .item-work" ).length)+"px");
            $(".vip-candidates .item-u" ).css("width",w3+"px");
           
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $(".new-jobs #wrapper" ).addClass("mobile");
                $(".new-employer .next").css("margin-right","0px");
                $(".new-employer .prev").css("margin-left","0px");
            }

            w2=$("#wrapper-logo").outerWidth();
            if(w>1000){
                w3=w2/13;
            }else if(w>800){
                w3=w2/10;
            }else if(w>600){
                w3=w2/8;
            }else if(w>400){
                w3=w2/5;
            }else{
                w3=w2/4;
            }
            $("#wrapper-logo li").css("width",w3+"px");
            $("#wrapper-logo li").css("height",w3+"px");
            $("#contents-logo").css("width",w3*($( "#wrapper-logo li" ).length)+"px");
            $("#wrapper-logo").parent().children("span").css("top",w3/2+"px");

            setTimeout(function(){onNext(true,listLogo)},2000);
            setTimeout(function(){onPrev(true,listNewEmployer)},3000);
            setTimeout(function(){onNext(true,listNewJobs)},4000);
        };
        var listLogo={
            isRun:false,
            wrapper:"wrapper-logo",
            contents:"contents-logo",
            item:"item-logo",
            action:""
        }
        var listNewEmployer={
            isRun:false,
            wrapper:"wrapper2",
            contents:"contents-employer",
            item:"item-work",
            action:""
        }
        var listNewJobs={
            isRun:false,
            wrapper:"wrapper",
            contents:"contents-jobs",
            item:"item-work",
            action:""
        }
        $("#btPrev").click(function(){onPrev(true,listLogo);});
        $("#btNext").click(function(){onNext(true,listLogo);});
        $("#btPrevNewJobs").click(function(){onPrev(true,listNewJobs);});
        $("#btNextNewJobs").click(function(){onNext(true,listNewJobs);});
        $("#btPrevNewEmployer").click(function(){onPrev(true,listNewEmployer);});
        $("#btNextNewEmployer").click(function(){onNext(true,listNewEmployer);});
        function onNext(b,ob){
            if(ob.isRun) return;
            if(b)clearTimeout(ob.action);
            ob.isRun=true;
            var w=$("#"+ob.contents +" ."+ob.item).outerWidth();
             var n=parseFloat($( "#"+ob.contents ).css("margin-left"));
             var w2=$( "#"+ob.contents ).outerWidth();
             var w3=$( "#"+ob.wrapper ).outerWidth();
             var n2=n-w;
             if(n2+w2-w3>=0){
                $( "#"+ob.contents ).animate({marginLeft: n2+'px'},{duration: 300,complete:function(){ob.isRun=false;}});
                ob.action=setTimeout(function(){onNext(false,ob);},2000);
             }
             else{ob.isRun=false;ob.action=setTimeout(function(){onPrev(false,ob);},2000);}
        }
        function onPrev(b,ob){
            if(ob.isRun) return;
            if(b)clearTimeout(ob.action);
            ob.isRun=true;
             var w=$("#"+ob.contents +" ."+ob.item).outerWidth();
             var n=parseFloat($( "#"+ob.contents ).css("margin-left"));
             var n2=n+w;
             if(n2<=0){
                $( "#"+ob.contents ).animate({marginLeft: n2+'px'},{duration: 300,complete:function(){ob.isRun=false;}});
                ob.action=setTimeout(function(){onPrev(false,ob);},2000);
             }
             else{ob.isRun=false;ob.action=setTimeout(function(){onNext(b,ob);},2000);}
        }
        function onCloseModalLogin(){
            $("#myModal").modal('toggle');
        }
        function onOpenRegister(){
            $("#register").addClass("in active");
            $(".header-tab-login li:nth-child(1)").removeClass("active");
            $(".header-tab-login li:nth-child(2)").addClass("active");
        }
        function onOpenLogin(){
            $("#login").addClass("in active");
            $(".header-tab-login li:nth-child(2)").removeClass("active");
            $(".header-tab-login li:nth-child(1)").addClass("active");
        }
        function onFocusCandidates(event){
            $(event.target).find(".view").animate({top: 0+'px'},300);
        }
        function onDisFocusCandidates(event){
            $(event.target).find(".view").animate({top: 200+'px'});
        }

        $(document).ready(function(){
            $('#login-btn').click(function(){
                var loginEmail = $('#login-email').val();
                var loginPassword = $('#login-password').val();
                var request = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/') }}/auth/login",
                    method: "POST",
                    data: {
                        'email': loginEmail,
                        'password': loginPassword
                    },
                    dataType: "json"
                });

                request.done(function (msg) {
                    if(msg.code == 200) {
                        location.reload();
                   }
                });

                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });

            $('#register-btn').click(function(){
                var registerFirstname = $('#firstname').val();
                var registerLastname = $('#lastname').val();
                var username = registerFirstname + ' ' + registerLastname;
                var registersdt = $('#sdt').val();
                var registerEmail = $('#register-email').val();
                var registerPassword = $('#register-password').val();
                var rPassword = $('#r_password').val();
                if(registerPassword != rPassword){
                    return false;
                }

                var request = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/') }}/auth/register",
                    method: "POST",
                    data: {
                        'username': username,
                        'password': registerPassword,
                        'email': registerEmail,
                        'phone': registersdt
                    },
                    dataType: "json"
                });

                request.done(function (msg) {
                    if(msg.code == 200) {
                        location.reload();
                   }
                });

                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });
        });
    </script>
</body>
</html>

