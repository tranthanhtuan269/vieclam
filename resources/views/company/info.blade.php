<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gmon') }}</title>
        <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/customize.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ url('/') }}/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
        <script src="{{ url('/') }}/sweetalert/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/sweetalert/sweetalert.css">
    </head> 
    <body>

        <div class="header">
            <div class="container">
                <div class="row">
                    <input type="hidden" name="company-id" value="{{ $company->id }}">
                    <div class="logo"><a href="{{ url('/') }}/company/{{ $company->id }}/info"><img src="{{ url('/') }}/images/{{ $company->logo }}" alt="">{{ $company->name }}</a></div>
                    <div class="hotline visible-xs" role="button" data-toggle="collapse" data-target="#hotline">
                        <span id="hotline" class="collapse">hotline: {{ $company->hotline }}</span>
                    </div>
                    <div class="hotline hidden-xs"><img src="{{ url('/') }}/images/hotline.png" alt="">
                        <span class="">hotline: {{ $company->hotline }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container info-page">
            <div class="main-menu row">
                <div class="slide"><img src="{{ url('/') }}/images/{{ $company->banner }}" width="100%" height="auto" alt=""><img class="logo" src="{{ url('/') }}/images/{{ $company->logo }}" alt=""></div>
                <p class="menu">
                    <a href="{{ url('/') }}/company/{{ $company->id }}/info" class="active"dụng>Thông Tin</a>
                    <a href="{{ url('/') }}/company/{{ $company->id }}/listjobs">Tuyển Dụng</a>
                    <button type="button" class="btn btn-primary" id="follow-btn" @if($followed) style="display: none;" @else style="display: block;" @endif><i></i>Theo dõi</button>
                    <button type="button" class="btn btn-danger" id="unfollow-btn" @if($followed) style="display: block;" @else style="display: none;" @endif><i></i>Bỏ theo dõi</button>
                </p>
            </div>
            <div class="main-content row">
                <div class="col-left col-md-9 col-xs-12">
                    <div class="row">
                        <div class="hot-new">
                            <span style="color:#f99f3c">Tin nóng: </span>
                            <a href="">Khai trương nhà hàng tại 156 Cầu Giấy
                                <span class="hot-new-img"></span></a>
                            @if($company->user != Auth::user()->id)<button type="button" class="bt-rate btn btn-primary" data-toggle="modal" data-target="#add-comment"><i></i>Thêm đánh giá</button>
                            @else
                            <button id="create_job_btn" class="bt-rate btn btn-primary"><i></i>Tạo tuyển dụng</button>
                            @endif
                        </div>
                    </div>

                    <div class="pn-left pn-hightlight row info-company">
                        <h5>VỀ CHÚNG TÔI</h5>
                        <div class="col-md-4 col-xs-12">
                            <img src="{{ url('/') }}/images/{{ $company->logo }}">
                        </div>
                        <div class="col-md-8 col-xs-12 border-blue">
                            <p class="row"><h3>{{ $company->name }}</h3></p>
                            <p class="row"><i></i>{{ $company->address }}, {{ $company->city }}</p>
                            <p class="row"><i></i>{{ $company->district }}, {{ $company->city }}</p>
                            <p class="row"><i></i>{{ $company->jobs }}</p>
                            <p class="row"><i></i>{{ $company->size }} người</p>
                            <p class="row"><i></i>Thứ 2 -  Thứ 6</p>
                            @if(strlen($company->sologan)>0)<p class="row"><i></i>{{ $company->sologan }}</p>@endif
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="row"><div class="col-md-12 col-xs-12"><?php echo $company->description; ?></div></div>
                        </div>
                    </div>
                    
                    <div class="pn-left pn-hightlight row">
                        <h5>NƠI BẠN SẼ LÀM VIỆC</h5>
                        <div class="col-md-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="wrapper-big" id="wrapper-big">
                                        <div class="prev" id="btPrev-big"><img src="{{ url('/') }}/images/prev.png" alt=""></div>
                                        <div class="next"  id="btNext-big"><img src="{{ url('/') }}/images/next.png" alt=""></div>
                                        <div style="width: 100%;overflow: hidden;display: inline-block;position: relative;">
                                            <div id="contents-big">
                                                <?php 
                                                    $imageString=rtrim($company->images,";");
                                                    $images = explode(";",$imageString);
                                                    foreach ($images as $image) {
                                                ?>
                                                <div class="item-work-big" >
                                                    <p class="work-img"><img  src="{{ url('/') }}/images/{{ $image }}" alt=""></p>
                                                </div>
                                                <?php 
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pn-left pn-hightlight row">
                        <h5>ĐỊA CHỈ</h5>
                        <div id="map"></div>
                    </div>
                </div>
                <div class="col-md-3 col-right col-xs-12">
                    <div class="pn-rating pn-left row">
                        <h5>Đánh giá chung</h5>
                        <p class="star-vote">
                            <img src="{{ url('/') }}/images/star.png" alt="" class="vote">
                            <img src="{{ url('/') }}/images/star.png" alt="" @if($votes > 1) class="vote" @else class="no-vote" @endif>
                                 <img src="{{ url('/') }}/images/star.png" alt="" @if($votes > 2) class="vote" @else class="no-vote" @endif>
                                 <img src="{{ url('/') }}/images/star.png" alt="" @if($votes > 3) class="vote" @else class="no-vote" @endif>
                                 <img src="{{ url('/') }}/images/star.png" alt="" @if($votes > 4) class="vote" @else class="no-vote" @endif>
                        </p>
                    </div>
                    <div class="pn-left pn-hightlight row">
                        <h5>Mọi người nói về chúng tôi</h5>
                        @foreach($comments as $comment)
                        <p class="content">
                            <span>{{ $comment->title }}</span>
                            <img src="{{ url('/') }}/images/star.png" alt="" class="vote">
                            <img src="{{ url('/') }}/images/star.png" alt="" @if($comment->star > 1) class="vote" @else class="no-vote" @endif>
                                 <img src="{{ url('/') }}/images/star.png" alt="" @if($comment->star > 2) class="vote" @else class="no-vote" @endif>
                                 <img src="{{ url('/') }}/images/star.png" alt="" @if($comment->star > 3) class="vote" @else class="no-vote" @endif>
                                 <img src="{{ url('/') }}/images/star.png" alt="" @if($comment->star > 4) class="vote" @else class="no-vote" @endif>
                                 <span>{{ $comment->description }}</span>
                        </p>
                        @endforeach
                        <div class="bot"><span class="active"></span>
                            <span class="active"></span>
                            <span></span>
                            <span></span></div>
                    </div>
                </div>
            </div>
            <div class="related-work row">
                <p class="title"><i></i>Thêm cơ hội làm việc cho bạn</p>
                <div class="wrapper" id="wrapper">
                    <div class="prev" id="btPrev"><img src="{{ url('/') }}/images/prev.png" alt=""></div>
                    <div class="next"  id="btNext"><img src="{{ url('/') }}/images/next.png" alt=""></div>
                    <div style="width: 100%;overflow: hidden;display: inline-block;position: relative;">
                        <div id="contents">
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
                                        <div class="work-view">
                                            <p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
                                            <p class="salary"><i></i>2 - 3 triệu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item-work" >
                                <a href="">
                                    <p class="work-img"><img  src="{{ url('/') }}/images/nhatuyendung.png" alt=""></p>
                                    <div class="details">
                                        <p class="single">Nhân viên pha chế Starbucks Coffee</p>
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

        <!-- Modal -->
        <div class="modal fade" id="add-comment" tabindex="-1" role="dialog" aria-labelledby="addComment">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Đánh giá nhà tuyển dụng</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <input type="hidden" name="company" value="{{ $company->id }}">
                            <div class="form-group">
                                <label for="inputTitle" class="col-sm-3 control-label">Tiêu đề</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputTitle" placeholder="Tiêu đề">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription" class="col-sm-3 control-label">Mô tả chi tiết</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" id="inputDescription"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputScore" class="col-sm-3 control-label">Đánh giá</label>
                                <div class="col-sm-9">
                                    <p class="star-vote" id="star-vote">
                                        <img src="{{ url('/') }}/images/star.png" alt="" id="star-vote-1" class="vote">
                                        <img src="{{ url('/') }}/images/star.png" alt="" id="star-vote-2" class="vote">
                                        <img src="{{ url('/') }}/images/star.png" alt="" id="star-vote-3" class="vote">
                                        <img src="{{ url('/') }}/images/star.png" alt="" id="star-vote-4" class="vote">
                                        <img src="{{ url('/') }}/images/star.png" alt="" id="star-vote-5" class="vote">
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                        <button type="button" class="btn btn-primary" id="send-comment">Gửi đánh giá</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.onload = function ()
            {
                var w = screen.width;
                var w2 = $("#wrapper").outerWidth();
                var w3;
                if (w > 768) {
                    w3 = w2 / 5;
                } else if (w > 600) {
                    w3 = w2 / 3;

                } else {
                    w3 = w2;
                }
                $(".item-work").css("width", w3 + "px");
                var n = w3 * ($("#contents .item-work").length);
                $("#contents").css("width", n + "px");
                setTimeout(function () {
                    onNext(false);
                }, 2000);

                //------------------------------------------------//

                var w2_big = $("#wrapper-big").outerWidth();
                var w3_big = w2_big;
                $(".item-work-big").css("width", w3_big + "px");
                var n_big = w3_big * ($("#contents-big .item-work-big").length);
                $("#contents-big").css("width", n_big + "px");
                setTimeout(function () {
                    onNext_big(false);
                }, 2000);
            };

            var isR = false;
            var action;
            $("#btPrev").click(function () {
                onPrev(true);
            });
            $("#btNext").click(function () {
                onNext(true);
            });
            function onNext(b) {
                if (b)
                    clearTimeout(action);
                if (isR)
                    return;
                isR = true;
                var w = $(".item-work").outerWidth();
                var n = parseFloat($("#contents").css("margin-left"));
                var w2 = $("#contents").outerWidth();
                var w3 = $("#wrapper").outerWidth();
                var n2 = n - w;
                if (n2 + w2 - w3 >= 0) {
                    $("#contents").animate({marginLeft: n2 + 'px'}, {duration: 300, complete: function () {
                            isR = false;
                        }});
                    action = setTimeout(function () {
                        onNext(false);
                    }, 2000);
                } else {
                    isR = false;
                    action = setTimeout(function () {
                        onPrev(false);
                    }, 2000);
                }
            }
            function onPrev(b) {
                if (b)
                    clearTimeout(action);
                if (isR)
                    return;
                isR = true;
                var w = $(".item-work").outerWidth();
                var n = parseFloat($("#contents").css("margin-left"));
                var w2 = $("#contents").outerWidth();
                var n2 = n + w;
                if (n2 <= 0) {
                    $("#contents").animate({marginLeft: n2 + 'px'}, {duration: 300, complete: function () {
                            isR = false;
                        }});
                    action = setTimeout(function () {
                        onPrev(false);
                    }, 2000);
                } else {
                    isR = false;
                    action = setTimeout(function () {
                        onNext(false);
                    }, 2000);
                }
            }

            // -----------------------------------------------------
            var isR_big = false;
            var action_big;
            $("#btPrev-big").click(function () {
                onPrev_big(true);
            });
            $("#btNext-big").click(function () {
                onNext_big(true);
            });
            function onNext_big(b_big) {
                if (b_big)
                    clearTimeout(action_big);
                if (isR_big)
                    return;
                isR_big = true;
                var w_big = $(".item-work-big").outerWidth();
                var n_big = parseFloat($("#contents-big").css("margin-left"));
                var w2_big = $("#contents-big").outerWidth();
                var w3_big = $("#wrapper-big").outerWidth();
                var n2_big = n_big - w_big;
                if (n2_big + w2_big - w3_big >= 0) {
                    $("#contents-big").animate({marginLeft: n2_big + 'px'}, {duration: 300, complete: function () {
                            isR_big = false;
                        }});
                    action_big = setTimeout(function () {
                        onNext(false);
                    }, 2000);
                } else {
                    isR_big = false;
                    action_big = setTimeout(function () {
                        onPrev(false);
                    }, 2000);
                }
            }
            function onPrev_big(b_big) {
                if (b_big)
                    clearTimeout(action_big);
                if (isR_big)
                    return;
                isR_big = true;
                var w_big = $(".item-work-big").outerWidth();
                var n_big = parseFloat($("#contents-big").css("margin-left"));
                var w2_big = $("#contents-big").outerWidth();
                var n2_big = n_big + w_big;
                if (n2_big <= 0) {
                    $("#contents-big").animate({marginLeft: n2_big + 'px'}, {duration: 300, complete: function () {
                            isR_big = false;
                        }});
                    action_big = setTimeout(function () {
                        onPrev(false);
                    }, 2000);
                } else {
                    isR_big = false;
                    action_big = setTimeout(function () {
                        onNext(false);
                    }, 2000);
                }
            }

            function initMap() {
                <?php if($company->lat == "" || $company->lng == ""){ ?>
                    var uluru = {lat: 21.027443939911, lng: 105.83038324971};
                <?php }else{ ?>
                    var uluru = {lat: "{{ $company->lat }}", lng: "{{ $company->lng }}"};
                <?php } ?>
                
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 15,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
            }

            $('#star-vote>img').click(function () {
                switch ($(this).attr('id')) {
                    case 'star-vote-1':
                        $('#star-vote-1').removeClass('no-vote').addClass('vote');
                        $('#star-vote-2').removeClass('vote').addClass('no-vote');
                        $('#star-vote-3').removeClass('vote').addClass('no-vote');
                        $('#star-vote-4').removeClass('vote').addClass('no-vote');
                        $('#star-vote-5').removeClass('vote').addClass('no-vote');
                        break;
                    case 'star-vote-2':
                        $('#star-vote-1').removeClass('no-vote').addClass('vote');
                        $('#star-vote-2').removeClass('no-vote').addClass('vote');
                        $('#star-vote-3').removeClass('vote').addClass('no-vote');
                        $('#star-vote-4').removeClass('vote').addClass('no-vote');
                        $('#star-vote-5').removeClass('vote').addClass('no-vote');
                        break;
                    case 'star-vote-3':
                        $('#star-vote-1').removeClass('no-vote').addClass('vote');
                        $('#star-vote-2').removeClass('no-vote').addClass('vote');
                        $('#star-vote-3').removeClass('no-vote').addClass('vote');
                        $('#star-vote-4').removeClass('vote').addClass('no-vote');
                        $('#star-vote-5').removeClass('vote').addClass('no-vote');
                        break;
                    case 'star-vote-4':
                        $('#star-vote-1').removeClass('no-vote').addClass('vote');
                        $('#star-vote-2').removeClass('no-vote').addClass('vote');
                        $('#star-vote-3').removeClass('no-vote').addClass('vote');
                        $('#star-vote-4').removeClass('no-vote').addClass('vote');
                        $('#star-vote-5').removeClass('vote').addClass('no-vote');
                        break;
                    case 'star-vote-5':
                        $('#star-vote-1').removeClass('no-vote').addClass('vote');
                        $('#star-vote-2').removeClass('no-vote').addClass('vote');
                        $('#star-vote-3').removeClass('no-vote').addClass('vote');
                        $('#star-vote-4').removeClass('no-vote').addClass('vote');
                        $('#star-vote-5').removeClass('no-vote').addClass('vote');
                        break;
                    default:
                        break;
                }
            });
            $('#send-comment').click(function () {
                var countStar = $('#star-vote>img.vote').length;
                var title = $('#inputTitle').val();
                var description = $('#inputDescription').val();
                var company = $('input[name=company]').val()
                var request = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/') }}/send-comment",
                    method: "POST",
                    data: {
                        'company': company,
                        'title': title,
                        'description': description,
                        'countStar': countStar,
                    },
                    dataType: "json"
                });

                request.done(function (msg) {
                    if (msg.code == 200) {
                        $('#add-comment').modal('toggle');
                        swal("Thông báo", "Thêm đánh giá thành công!", "success");
                    } else {
                        $('#add-comment').modal('toggle');
                        swal("Cảnh báo", msg.message, "error");
                    }
                });

                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });
            $('#follow-btn').click(function () {
                var company = $('input[name=company-id]').val();
                var request = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/') }}/follow-company",
                    method: "POST",
                    data: {
                        'company': company
                    },
                    dataType: "json"
                });

                request.done(function (msg) {
                    if (msg.code == 200) {
                        // thong bao khi follow thanh cong
                        $('#follow-btn').hide();
                        $('#unfollow-btn').show();
                    } else {
                        swal("Cảnh báo", "Đã có lỗi khi thêm đánh giá!", "error");
                    }
                });

                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });
            $('#unfollow-btn').click(function () {
                var company = $('input[name=company-id]').val();
                var request = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/') }}/unfollow-company",
                    method: "POST",
                    data: {
                        'company': company
                    },
                    dataType: "json"
                });

                request.done(function (msg) {
                    if (msg.code == 200) {
                        // thong bao khi unfollow thanh cong
                        $('#follow-btn').show();
                        $('#unfollow-btn').hide();
                    } else {
                        swal("Cảnh báo", "Đã có lỗi khi thêm đánh giá!", "error");
                    }
                });

                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });

            $('#create_job_btn').click(function(){
                window.location.href = "{{ url('/') }}/job/create";
            });
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlfeeJco9hP4jLWY1ObD08l9J44v7IIE&callback=initMap">
        </script>
    </body>
</html>