<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ url('/') }}" target="_blank">
	<title>Test</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="{{ url('/') }}/public/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="{{ url('/') }}/public/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
	<script src="{{ url('/') }}/public/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" href="{{ url('/') }}/public/css/fptHomeCss.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="row clearfix">
				<div class="logo clearfix"><a target="_self" href=""><img src="{{ url('/') }}/public/images/{{ $company->logo }}" id="logo" alt=""><p>{{ $job->name }}</p></a></div>
				<div class="link"><a target="_self" class="bt-join" href="javascript:void(0)" data-id="{{ $job->id }}">Ứng tuyển ngay</a></div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row ads clearfix">
			@if(isset($company->images) && strlen($company->images) > 0)
			<?php 
				$company->images=rtrim($company->images,";");
				$images = explode(";",$company->images);
				for($i = 0; $i < count($images); $i++){ if($i == 3) break; ?>
					
					<div class="col-md-4 col-xs-12">
						<div class="item-ads"><img src="{{ url('/') }}/public/images/{{ $images[$i] }}" alt=""></div>
					</div>

				<?php } ?>
			@endif
		</div>
		<div class="contents-job row">
			<div class="col-md-4 info-company col-xs-12">
				<div class="logo"><a target="_self" href=""><img src="{{ url('/') }}/public/images/{{ $company->logo }}" alt=""></a></div>
				<div class="info">
					<p class="title">{{ $company->name }}</p>
					<div class="star">
						<img src="{{ url('/') }}/public/images/star.png" alt="">
						<img src="{{ url('/') }}/public/images/star.png" alt="">
						<img src="{{ url('/') }}/public/images/star.png" alt="">
						<img src="{{ url('/') }}/public/images/star.png" alt="">
						<img src="{{ url('/') }}/public/images/star.png" alt="">
					</div>
					<p class="time-new-roman"><i></i>{{ $company->address }}, {{ $company->city }} </p>
					<p class="time-new-roman"><i></i>{{ $company->city }}</p>
					<p class="time-new-roman"><i></i>{{ $company->district }}, {{ $company->city }}</p>
					@if(strlen($company->jobs) > 0 )
					<p class="time-new-roman">
						<i></i>
					</p>
					@endif
					<p class="time-new-roman" style="display: inline-block;margin-right: 50px"><i></i>{{ $company->size }} người</p>
					<p class="time-new-roman"><i></i>Thứ 2 - Thứ 6</p>
					@if(strlen($company->sologan) > 0)
					<p class="time-new-roman"><i></i>{{ $company->sologan }}</p>
					@endif
					<div class="link time-new-roman" ><a target="_self" href="{{ url('/') }}/company/{{ $company->id }}/listjobs" class="underline">Trang tuyển dụng <i class="muiten"></i></a></div>
				</div>
			</div>
			<div class="col-md-8  col-xs-12">
				<div class="info-job">
					<p class="title" style="margin-top: -8px">{{ $job->name }}</p>
					<p class="time-new-roman"><i></i><span style="margin-right: 35px">
					{{ $company->district }}, {{ $company->city }}
					</span>
					<a target="_self" href="" style="color:#2a70b8;display: inline-block;" class="underline">Xem bản đồ <i class="muiten"></i></a></p>
					<p class="time-new-roman"><i></i>{{ $job->salary }}</p>
					<p class="time-new-roman"><i></i>{{ $job->expiration_date }} (còn 3 ngày)</p>
					<p class="time-new-roman"><i></i>{{ $job->number }} người</p>
					<p class="time-new-roman"><i></i><?php if($job->gender == 0) { echo "Nam"; }else{ echo "Nữ"; } ?></p>
					<div class="bt clearfix">
						<a target="_self" class="bt-join time-new-roman" href="javascript:void(0)" data-id="{{ $job->id }}">Ứng tuyển ngay</a> 
						<span style="padding:0;" id="share">
							<a target="_self" class="icon" href=""><i class="i1"></i></a>
							<a target="_self" class="icon" href=""> <i class="i2"></i></a>
							<a target="_self" class="icon" href=""><i class="i3"></i></a>
							<a target="_self" class="icon" href=""><i class="i4"></i></a>
							<a target="_self" class="icon" href=""><i class="i5"></i></a>
							<span>Chia sẻ qua</span>
						</span>
					</div>
				</div>
				<div class="item">
					<div class="title">việc bạn sẽ làm</div>
				</div>
				<div class="item">
					<div class="title">chúng tôi kỳ vọng ở bạn</div>
				</div>
				<div class="item">
					<div class="title">điều bạn mong muốn</div>
				</div>
				<p style="margin-top: 20px;text-align: center;"><a target="_self" href="javascript:void(0)" class="bt-join" data-id="{{ $job->id }}">Ứng tuyển ngay</a></p>
			</div>
		</div>
		<div class="related-work row">
			<p class="title"><i></i>Thêm cơ hội làm việc cho bạn</p>
			<div class="wrapper" id="wrapper">
				<div class="prev" id="btPrev"><img src="{{ url('/') }}/public/images/prev.png" alt=""></div>
				<div class="next"  id="btNext"><img src="{{ url('/') }}/public/images/next.png" alt=""></div>
				<div style="width: 100%;overflow: hidden;display: inline-block;position: relative;">
					<div id="contents">
						<div class="item-work" >
							<div class="border-item">
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
								<a target="_self" href="">
									<p class="work-img"><img  src="{{ url('/') }}/public/images/nhatuyendung.png" alt=""></p>
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
	</div>
	<footer>
		<div class="container">
			<div class="footer-top row">
				<div class="col-md-4 col-xs-6 footer-col">
					<p class="title">về gmon</p>
					<p><a target="_self" href="">Giới thiệu</a></p>
					<p><a target="_self" href="">Việc làm</a></p>
					<p><a target="_self" href="">Nhà tuyển dụng</a></p>
					<p><a target="_self" href="">Hồ sơ ứng viên</a></p>
					<p><a target="_self" href="">Nhà tuyển dụng</a></p>
				</div>
				<div class="col-md-3 col-xs-6 footer-col">
					<p class="title">công cụ</p>
					<p><a target="_self" href="">Hồ sơ</a></p>
					<p><a target="_self" href="">Việc làm của tôi</a></p>
					<p><a target="_self" href="">Thông báo việc làm</a></p>
					<p><a target="_self" href="">Phản hồi</a></p>
					<p><a target="_self" href="">Tư vấn nghề nghiệp</a></p>
				</div>
				<div class="col-md-5 contact col-xs-12 footer-col">
					<p class="title">kết nối với gmon</p>
					<p class="mxh">
						<a target="_self" href=""></a>
						<a target="_self" href=""></a>
						<a target="_self" href=""></a>
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
		var url_site = $('base').attr('href');

		window.onload = function()
		{
			var x=$("#logo").outerHeight();
			var x1=$("#logo").parent().outerHeight();
			$("#logo").css("margin-top",(x1-x)/2+"px");
		    var w=screen.width;
		    var w2=$("#wrapper").outerWidth();
		    var w3;
		    if(w>1000){
		    	w3=w2/5;
		    }else if(w>800){
		    	w3=w2/4;
		    }else if(w>600){
		    	w3=w2/3;
		    }else if(w>400){
		    	w3=w2/2;
		    }else{
		    	w3=w2;
		    }
		    $(".item-work").css("width",w3+"px");
		   	var n=	w3*( $( "#contents .item-work" ).length);
		   	$( "#contents" ).css("width",n+"px");
		 	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		 		$( "#wrapper" ).addClass("mobile");
			}
			setTimeout(function(){onNext(false);});
		};

		$('.bt-join').click(function(){
	        var _sefl = $(this);
	        var job_id = $(this).attr('data-id');
	        var request = $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: url_site + "/job/join",
	            method: "POST",
	            data: {
	                'job': job_id
	            },
	            dataType: "json"
	        });

	        request.done(function (msg) {
	            if (msg.code == 200) {
	            	$('.bt-join').off('click');
	               	swal("Thông báo", "Bạn đã ứng tuyển thành công!", "success");
	            }else if(msg.code == 401){
	            	swal("Thông báo", "Bạn phải đăng nhập trước khi ứng tuyển!", "error");
	            }
	        });

	        request.fail(function (jqXHR, textStatus) {
	            alert("Request failed: " + textStatus);
	        });
		});

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
	</script>

</body>
</html>