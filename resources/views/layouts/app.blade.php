<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
	<link rel="stylesheet" href="{{ url('/') }}/css/style.css">
	<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="{{ url('/') }}/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="logo"><a href=""><img src="{{ url('/') }}/img/logo.png" alt="">Pizza Hut</a></div>
				<div class="hotline visible-xs" role="button" data-toggle="collapse" data-target="#hotline"><img src="{{ url('/') }}/img/hotline.png" alt="" >
					<span id="hotline" class="collapse">hotline: 1900 1080</span>
				</div>
				<div class="hotline hidden-xs"><img src="{{ url('/') }}/img/hotline.png" alt="">
					<span class="">hotline: 1900 1080</span>
				</div>
				
			</div>
		</div>
	</div>
	<div class="container">
		<div class="main-menu row">
			<div class="slide"><img src="{{ url('/') }}/img/slide.png" width="100%" height="auto" alt=""><img class="logo" src="{{ url('/') }}/img/bigLogo.png" alt=""></div>
			<p class="menu">
				<a href="#">Thông Tin</a>
				<a href="#" class="active">Tuyển Dụng</a>
				<button type="button" class="btn btn-primary"><i></i>Đang theo dõi</button>
			</p>
		</div>
		<div class="main-content row">
			<div class="col-left col-md-9 col-xs-12">
				<div class="row">
					<div class="hot-new"><span style="color:#f99f3c">Tin nóng: </span><a href="">Khai trương nhà hàng tại 156 Cầu Giấy
					<span class="hot-new-img"></span></a>
					<button  type="button" class="bt-rate btn btn-primary"><i></i>Thêm đánh giá</button>
				</div>
				</div>
				<div class="row item-job">
					<div class="job-image">
						<div style="padding: 10%;"><img src="{{ url('/') }}/img/bigLogo.png" alt=""></div>
					</div>
					<div class="job-content">
						<div class="job-name">Nhân viên phục vụ bàn tại pizza hut</div>
						<div class="job-info">
							<span><i></i>Số lượng: 5</span>
							<span><i></i>Cầu Giấy, Ba Đình</span>
							<span class="active"><i></i>Hạn nộp: 08/03/2017</span>
						</div>
						<span class="job-hot">HOT</span>
						<a href="" class="job-view">Chi tiết</a>
					</div>
				</div>
				<div class="row item-job">
					<div class="job-image">
						<div style="padding: 10%;"><img src="{{ url('/') }}/img/bigLogo.png" alt=""></div>
					</div>
					<div class="job-content">
						<div class="job-name">Nhân viên phục vụ bàn tại pizza hut</div>
						<div class="job-info">
							<span><i></i>Số lượng: 5</span>
							<span><i></i>Cầu Giấy, Ba Đình</span>
							<span class=""><i></i>Hạn nộp: 08/03/2017</span>
						</div>
						<span class="job-hot">HOT</span>
						<a href="" class="job-view">Chi tiết</a>
					</div>
				</div>
				<div class="row item-job">
					<div class="job-image">
						<div style="padding: 10%;"><img src="{{ url('/') }}/img/bigLogo.png" alt=""></div>
					</div>
					<div class="job-content">
						<div class="job-name">Nhân viên phục vụ bàn tại pizza hut</div>
						<div class="job-info">
							<span><i></i>Số lượng: 5</span>
							<span><i></i>Cầu Giấy, Ba Đình</span>
							<span class=""><i></i>Hạn nộp: 08/03/2017</span>
						</div>
						<span class="job-hot">HOT</span>
						<a href="" class="job-view">Chi tiết</a>
					</div>
				</div>
				<div class="row item-job">
					<div class="job-image">
						<div style="padding: 10%;"><img src="{{ url('/') }}/img/bigLogo.png" alt=""></div>
					</div>
					<div class="job-content">
						<div class="job-name">Nhân viên phục vụ bàn tại pizza hut</div>
						<div class="job-info">
							<span><i></i>Số lượng: 5</span>
							<span><i></i>Cầu Giấy, Ba Đình</span>
							<span class="active"><i></i>Hạn nộp: 08/03/2017</span>
						</div>
						<span class="job-hot">HOT</span>
						<a href="" class="job-view">Chi tiết</a>
					</div>
				</div>
				<div class="m-pagination row center">
				    <a href="#">1</a>
				    <a href="#">2</a>
				    <a href="#">3</a>
				    <a href="#">4</a>
				    <a href="#">5</a>
				    <a href="#">Tiếp theo<i></i></a>
				</div>
			</div>
			<div class="col-md-3 col-right col-xs-12">
				<div class="pn-rating pn-left row">
					<h5>Đánh giá chung</h5>
					<p class="star-vote">
						<img src="{{ url('/') }}/img/star.png" alt="">
						<img src="{{ url('/') }}/img/star.png" alt="">
						<img src="{{ url('/') }}/img/star.png" alt="">
						<img src="{{ url('/') }}/img/star.png" alt="">
						<img src="{{ url('/') }}/img/star.png" alt="">
					</p>
					<div class="percent-vote">
						<div class="img"><img src="{{ url('/') }}/img/tuyendung.png" alt=""><span class="percent">75%</span></div>
						<p class="tx">Đánh giá khuyến khích việc làm tại đây.</p>
					</div>
				</div>
				<div class="pn-left pn-hightlight row">
					<h5>Mọi người nói về chúng tôi</h5>
					<p class="content">
						<span>Nơi khởi đầu tốt</span>
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" alt="">
						<img src="img/star.png" alt="">
						<span>abcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcd</span>
					</p>
					<p class="content">
						<span>Nơi khởi đầu tốt</span>
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" alt="">
						<img src="img/star.png" alt="">
						<span>abcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcd</span>
					</p>
					<p class="content" style="border:none">
						<span>Nơi khởi đầu tốt</span>
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" class="active" alt="">
						<img src="img/star.png" alt="">
						<img src="img/star.png" alt="">
						<span>abcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcd</span>
					</p>
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
				<div class="prev" id="btPrev"><img src="{{ url('/') }}/img/prev.png" alt=""></div>
				<div class="next"  id="btNext"><img src="{{ url('/') }}/img/next.png" alt=""></div>
				<div style="width: 100%;overflow: hidden;display: inline-block;position: relative;">
				<div id="contents">
					<div class="item-work">
						<div>
						<p class="work-img"><img  src="{{ url('/') }}/img/nhatuyendung.png" alt=""></p>
						<p class="single">Nhân viên pha chế Starbucks Coffee</p>
						<span class="work-view"><a href="">Xem thêm &rsaquo;</a></span>
						</div>
					</div>
					<div class="item-work">
						<div>
						<p class="work-img work-img-border"><img src="{{ url('/') }}/img/nhatuyendung.png" alt=""></p>
						<p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
						<p class="salary"><i></i>2 - 3 triệu</p>
						<span class="work-view"><a href="">Xem thêm &rsaquo;</a></span>
						</div>
					</div>
					<div class="item-work">
						<div>
						<p class="work-img work-img-border"><img src="{{ url('/') }}/img/nhatuyendung.png" alt=""></p>
						<p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
						<p class="salary"><i></i>2 - 3 triệu</p>
						<span class="work-view"><a href="">Xem thêm &rsaquo;</a></span>
						</div>
					</div>
					<div class="item-work">
						<div>
						<p class="work-img work-img-border"><img src="{{ url('/') }}/img/nhatuyendung.png" alt=""></p>
						<p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
						<p class="salary"><i></i>2 - 3 triệu</p>
						<span class="work-view"><a href="">Xem thêm &rsaquo;</a></span>
						</div>
					</div>
					<div class="item-work">
						<div>
						<p class="work-img work-img-border"><img src="{{ url('/') }}/img/nhatuyendung.png" alt=""></p>
						<p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
						<p class="salary"><i></i>2 - 3 triệu</p>
						<span class="work-view"><a href="">Xem thêm &rsaquo;</a></span>
						</div>
					</div>
					<div class="item-work">
						<div>
						<p class="work-img work-img-border"><img src="{{ url('/') }}/img/nhatuyendung.png" alt=""></p>
						<p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
						<p class="salary"><i></i>2 - 3 triệu</p>
						<span class="work-view"><a href="">Xem thêm &rsaquo;</a></span>
						</div>
					</div>
					<div class="item-work">
						<div>
						<p class="work-img work-img-border"><img src="{{ url('/') }}/img/nhatuyendung.png" alt=""></p>
						<p class="location"><i></i>Cầu Giấy, Ba Đình, Hà Nội</p>
						<p class="salary"><i></i>2 - 3 triệu</p>
						<span class="work-view"><a href="">Xem thêm &rsaquo;</a></span>
						</div>
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
	<script>
		window.onload = function()
		{
		    var w=screen.width;
		    var w2=$("#wrapper").outerWidth();
		    var w3;
		    if(w>768){
		    	w3=w2/5;
		    }else if(w>600){
		    	w3=w2/3;
		    	
		    }else{
		    	w3=w2;
		    }
		    $(".item-work").css("width",w3+"px");
		   	var n=	w3*( $( "#contents .item-work" ).length);
		   	$( "#contents" ).css("width",n+"px");
		 	 setTimeout(function(){onNext(false);},2000);
		};
		var isR=false;
		var action;
		$("#btPrev").click(function(){onPrev(true);});
		$("#btNext").click(function(){onNext(true);});
		function onNext(b){
			if(b)clearTimeout(action);
			if(isR) return;
			isR=true;
			var w=$(".item-work").outerWidth();
			 var n=parseFloat($( "#contents" ).css("margin-left"));
			 var w2=$("#contents").outerWidth();
			 var w3=$("#wrapper").outerWidth();
			 var n2=n-w;
			 if(n2+w2-w3>=0){
			 	$( "#contents" ).animate({marginLeft: n2+'px'},{duration: 300,complete:function(){isR=false;}});
			 	action=setTimeout(function(){onNext(false);},2000);
			 }
			 else{isR=false;action=setTimeout(function(){onPrev(false);},2000);}
		}
		function onPrev(b){
			if(b)clearTimeout(action);
			if(isR) return;
			isR=true;
			var w=$(".item-work").outerWidth();
			 var n=parseFloat($( "#contents" ).css("margin-left"));
			 var w2=$("#contents").outerWidth();
			 var n2=n+w;
			 if(n2<=0){
			 	$( "#contents" ).animate({marginLeft: n2+'px'},{duration: 300,complete:function(){isR=false;}});
			 	action=setTimeout(function(){onPrev(false);},2000);
			 }
			 else{isR=false;action=setTimeout(function(){onNext(false);},2000);}
		}
		// var autoSlideInterval;
		// function autoSlide(b){
		// 	var isContinue=true;
		// 	autoSlideInterval=setInterval(function() {
		// 		if(!isContinue) b=!b;
		// 		if(b) {
		// 			isContinue=onPrev();
		// 		}else isContinue=onNext();
		// 	}, 2000);
		// }
	</script>
</body>
</html>