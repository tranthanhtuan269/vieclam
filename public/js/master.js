$(document).ready(function(){
	var url_site = $('base').attr('href');
	$('.active-city').click(function(){
        var _sefl = $(this);
        var city_id = $(this).attr('data-id');
        var request = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_site + "/city/active",
            method: "POST",
            data: {
                'city': city_id
            },
            dataType: "json"
        });

        request.done(function (msg) {
            if (msg.code == 200) {
               _sefl.addClass('hidden-object').removeClass('show-object');
               _sefl.parent().find(".unactive-city").addClass('show-object').removeClass('hidden-object');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });

    $('.unactive-city').click(function(){
        var _sefl = $(this);
        var city_id = $(this).attr('data-id');
        var request = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_site + "/city/unactive",
            method: "POST",
            data: {
                'city': city_id
            },
            dataType: "json"
        });

        request.done(function (msg) {
            if (msg.code == 200) {
               _sefl.addClass('hidden-object').removeClass('show-object');
               _sefl.parent().find(".active-city").addClass('show-object').removeClass('hidden-object');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
	});

    $('.active-district').click(function(){
        var _sefl = $(this);
        var district_id = $(this).attr('data-id');
        var request = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_site + "/district/active",
            method: "POST",
            data: {
                'district': district_id
            },
            dataType: "json"
        });

        request.done(function (msg) {
            if (msg.code == 200) {
               _sefl.addClass('hidden-object').removeClass('show-object');
               _sefl.parent().find(".unactive-district").addClass('show-object').removeClass('hidden-object');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });

    $('.unactive-district').click(function(){
        var _sefl = $(this);
        var district_id = $(this).attr('data-id');
        var request = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_site + "/district/unactive",
            method: "POST",
            data: {
                'district': district_id
            },
            dataType: "json"
        });

        request.done(function (msg) {
            if (msg.code == 200) {
               _sefl.addClass('hidden-object').removeClass('show-object');
               _sefl.parent().find(".active-district").addClass('show-object').removeClass('hidden-object');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });
});