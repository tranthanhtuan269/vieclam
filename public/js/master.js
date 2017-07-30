$(document).ready(function(){
	var url_site = $('base').attr('href');
	$('.active-city').click(function(){
        var city_id = $(this).attr('data-id');
        alert(city_id);
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
               
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });

    $('.unactive-city').click(function(){
        var city_id = $(this).attr('data-id');
        alert(city_id);
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
                
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
	});
});