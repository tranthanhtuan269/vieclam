$(document).ready(function () {
    var site_link = $('body').attr('data-site');
    var count_hoc_tap = 0;
    var count_kinh_nghiem = 0;
    var count_ngoai_ngu = 0;

    $('#them_moi_ngoai_ngu').click(function () {
        count_ngoai_ngu++;
        var html = "";
            html += "<div class='form-ngon-ngu-group' id='ngoai_ngu_" + count_ngoai_ngu + "'>";
                html += "<div id='ngoai_ngu_" + count_ngoai_ngu + "_content'>";
                    html += "<div class='form-group'>";
                        html += "<label for='ten_ngoai_ngu' class='col-md-2 control-label'>Tên ngoại ngữ</label>";
                        html += "<div class='col-md-4'>";
                            html += "<input type='text' class='form-control' class='ten_ngoai_ngu' id='ten_ngoai_ngu_" + count_ngoai_ngu + "'>";
                        html += "</div>";
                        html += "<label for='trinh_do_ngoai_ngu' class='col-md-2 control-label'>Trình độ</label>";
                        html += "<div class='col-md-4'>";
                            html += "<input type='text' class='form-control' class='trinh_do_ngoai_ngu' id='trinh_do_ngoai_ngu_" + count_ngoai_ngu + "'>";
                        html += "</div>";
                    html += "</div>";
                    html += "<div class='form-group'>";
                        html += "<div class='col-md-8'>";
                            html += "<p id='ngoai_ngu_" + count_ngoai_ngu + "_txt' class='ngoai_ngu-hide'></p>";
                        html += "</div>";
                        html += "<div class='col-md-4'>";
                            html += "<div class='btn btn-danger pull-right ngoai_ngu_delete-btn' id='delete_ngoai_ngu_" + count_ngoai_ngu + "'>Hủy bỏ</div>";
                            html += "<div class='btn btn-primary pull-right ngoai_ngu_edit-btn' id='edit_ngoai_ngu_" + count_ngoai_ngu + "' style='display:none;'>Chỉnh sửa</div>";
                            html += "<div class='btn btn-primary pull-right ngoai_ngu_success-btn' id='success_ngoai_ngu_" + count_ngoai_ngu + "'>Hoàn thành</div>";
                        html += "</div>";
                    html += "</div>";
                html += "</div>";
            html += "</div>";
        $(html).appendTo('#trinh_do_ngoai_ngu>.panel-body');
        addEventToTrinhDoNgoaiNgu();
    });

    $('.ngoai_ngu_delete-btn').click(function () {
        var id_obj = $(this).attr('id');
        id_obj = id_obj.substring(17, id_obj.length);
        $('#ngoai_ngu_' + id_obj).remove();
        count_ngoai_ngu--;
    });

    $('.ngoai_ngu_success-btn').click(function () {
        var id_obj = $(this).attr('id');
        id_obj = id_obj.substring(18, id_obj.length);
        $('#ngoai_ngu_' + id_obj + '_content').fadeOut("slow", function () {});
        $('#ngoai_ngu_' + id_obj + '_txt').html(' - ' + $('#ten_ngoai_ngu_' + id_obj).val() + ' - Trình độ ' + $('#trinh_do_ngoai_ngu_' + id_obj).val());
        $(this).hide();
        $('#edit_ngoai_ngu_' + id_obj).show();
    });

    $('.ngoai_ngu_edit-btn').click(function () {
        var id_obj = $(this).attr('id');
        id_obj = id_obj.substring(15, id_obj.length);
        $('#ngoai_ngu_' + id_obj + '_content').show();
        $(this).hide();
        $('#success_ngoai_ngu_' + id_obj).show();
    });

    function addEventToTrinhDoNgoaiNgu() {
        $('.ngoai_ngu_delete-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(17, id_obj.length);
            $('#ngoai_ngu_' + id_obj).remove();
            count_ngoai_ngu--;
        });

        $('.ngoai_ngu_success-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(18, id_obj.length);
            $('#ngoai_ngu_' + id_obj + '_content').fadeOut("slow", function () {});
            $('#ngoai_ngu_' + id_obj + '_txt').html(' - ' + $('#ten_ngoai_ngu_' + id_obj).val() + ' - Trình độ ' + $('#trinh_do_ngoai_ngu_' + id_obj).val());
            $(this).hide();
            $('#edit_ngoai_ngu_' + id_obj).show();
        });

        $('.ngoai_ngu_edit-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(15, id_obj.length);
            $('#ngoai_ngu_' + id_obj + '_content').show();
            $(this).hide();
            $('#success_ngoai_ngu_' + id_obj).show();
        });
    }

    $('#them_moi_kinh_nghiem').click(function () {
        count_kinh_nghiem++;
        var html = "";
        html += "<div class='form-kinh-nghiem-group' id='kinh_nghiem_lam_viec_" + count_kinh_nghiem + "'>";
        html += "<div id='kinh_nghiem_lam_viec_" + count_kinh_nghiem + "_content'>";
        html += "<div class='form-group'>";
        html += "<div class='col-md-6'>";
        html += "<label for='ten_cong_ty' class='col-md-4 control-label'>Tên công ty đã làm</label>";
        html += "<div class='col-md-8'>";
        html += "<input type='text' class='form-control' class='ten_cong_ty' id='ten_cong_ty_" + count_kinh_nghiem + "'>";
        html += "</div>";
        html += "</div>";
        html += "<div class='col-md-6'>";
        html += "<label for='vi_tri' class='col-md-4 control-label'>Vị trí công việc</label>";
        html += "<div class='col-md-8'>";
        html += "<input type='text' class='form-control' class='vi_tri' id='vi_tri_" + count_kinh_nghiem + "'>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Thời gian làm</label>";
        html += "<div class='col-md-1'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Từ:</label>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='thang_bat_dau' id='thang_bat_dau_lam_viec_" + count_kinh_nghiem + "'>";
        html += "<option value='0'>--Chọn Tháng--</option>";
        html += "<option value='1'>Tháng 1</option>";
        html += "<option value='2'>Tháng 2</option>";
        html += "<option value='3'>Tháng 3</option>";
        html += "<option value='4'>Tháng 4</option>";
        html += "<option value='5'>Tháng 5</option>";
        html += "<option value='6'>Tháng 6</option>";
        html += "<option value='7'>Tháng 7</option>";
        html += "<option value='8'>Tháng 8</option>";
        html += "<option value='9'>Tháng 9</option>";
        html += "<option value='10'>Tháng 10</option>";
        html += "<option value='11'>Tháng 11</option>";
        html += "<option value='12'>Tháng 12</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='nam_bat_dau' id='nam_bat_dau_lam_viec_" + count_kinh_nghiem + "'>";
        html += "<option value='0'>--Chọn Năm--</option>";
        html += "<option value='1960'>Năm 1960</option><option value='1961'>Năm 1961</option><option value='1962'>Năm 1962</option><option value='1963'>Năm 1963</option><option value='1964'>Năm 1964</option><option value='1965'>Năm 1965</option><option value='1966'>Năm 1966</option><option value='1967'>Năm 1967</option><option value='1968'>Năm 1968</option><option value='1969'>Năm 1969</option><option value='1970'>Năm 1970</option><option value='1971'>Năm 1971</option><option value='1972'>Năm 1972</option><option value='1973'>Năm 1973</option><option value='1974'>Năm 1974</option><option value='1975'>Năm 1975</option><option value='1976'>Năm 1976</option><option value='1977'>Năm 1977</option><option value='1978'>Năm 1978</option><option value='1979'>Năm 1979</option><option value='1980'>Năm 1980</option><option value='1981'>Năm 1981</option><option value='1982'>Năm 1982</option><option value='1983'>Năm 1983</option><option value='1984'>Năm 1984</option><option value='1985'>Năm 1985</option><option value='1986'>Năm 1986</option><option value='1987'>Năm 1987</option><option value='1988'>Năm 1988</option><option value='1989'>Năm 1989</option><option value='1990'>Năm 1990</option><option value='1991'>Năm 1991</option><option value='1992'>Năm 1992</option><option value='1993'>Năm 1993</option><option value='1994'>Năm 1994</option><option value='1995'>Năm 1995</option><option value='1996'>Năm 1996</option><option value='1997'>Năm 1997</option><option value='1998'>Năm 1998</option><option value='1999'>Năm 1999</option><option value='2000'>Năm 2000</option><option value='2001'>Năm 2001</option><option value='2002'>Năm 2002</option><option value='2003'>Năm 2003</option><option value='2004'>Năm 2004</option><option value='2005'>Năm 2005</option><option value='2006'>Năm 2006</option><option value='2007'>Năm 2007</option><option value='2008'>Năm 2008</option><option value='2009'>Năm 2009</option><option value='2010'>Năm 2010</option><option value='2011'>Năm 2011</option><option value='2012'>Năm 2012</option><option value='2013'>Năm 2013</option><option value='2014'>Năm 2014</option><option value='2015'>Năm 2015</option><option value='2016'>Năm 2016</option><option value='2017'>Năm 2017</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='col-md-1'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Đến:</label>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='thang_ket_thuc' id='thang_ket_thuc_lam_viec_" + count_kinh_nghiem + "'>";
        html += "<option value='0'>--Chọn Tháng--</option>";
        html += "<option value='1'>Tháng 1</option>";
        html += "<option value='2'>Tháng 2</option>";
        html += "<option value='3'>Tháng 3</option>";
        html += "<option value='4'>Tháng 4</option>";
        html += "<option value='5'>Tháng 5</option>";
        html += "<option value='6'>Tháng 6</option>";
        html += "<option value='7'>Tháng 7</option>";
        html += "<option value='8'>Tháng 8</option>";
        html += "<option value='9'>Tháng 9</option>";
        html += "<option value='10'>Tháng 10</option>";
        html += "<option value='11'>Tháng 11</option>";
        html += "<option value='12'>Tháng 12</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='nam_ket_thuc' id='nam_ket_thuc_lam_viec_" + count_kinh_nghiem + "'>";
        html += "<option value='0'>--Chọn Năm--</option>";
        html += "<option value='1960'>Năm 1960</option><option value='1961'>Năm 1961</option><option value='1962'>Năm 1962</option><option value='1963'>Năm 1963</option><option value='1964'>Năm 1964</option><option value='1965'>Năm 1965</option><option value='1966'>Năm 1966</option><option value='1967'>Năm 1967</option><option value='1968'>Năm 1968</option><option value='1969'>Năm 1969</option><option value='1970'>Năm 1970</option><option value='1971'>Năm 1971</option><option value='1972'>Năm 1972</option><option value='1973'>Năm 1973</option><option value='1974'>Năm 1974</option><option value='1975'>Năm 1975</option><option value='1976'>Năm 1976</option><option value='1977'>Năm 1977</option><option value='1978'>Năm 1978</option><option value='1979'>Năm 1979</option><option value='1980'>Năm 1980</option><option value='1981'>Năm 1981</option><option value='1982'>Năm 1982</option><option value='1983'>Năm 1983</option><option value='1984'>Năm 1984</option><option value='1985'>Năm 1985</option><option value='1986'>Năm 1986</option><option value='1987'>Năm 1987</option><option value='1988'>Năm 1988</option><option value='1989'>Năm 1989</option><option value='1990'>Năm 1990</option><option value='1991'>Năm 1991</option><option value='1992'>Năm 1992</option><option value='1993'>Năm 1993</option><option value='1994'>Năm 1994</option><option value='1995'>Năm 1995</option><option value='1996'>Năm 1996</option><option value='1997'>Năm 1997</option><option value='1998'>Năm 1998</option><option value='1999'>Năm 1999</option><option value='2000'>Năm 2000</option><option value='2001'>Năm 2001</option><option value='2002'>Năm 2002</option><option value='2003'>Năm 2003</option><option value='2004'>Năm 2004</option><option value='2005'>Năm 2005</option><option value='2006'>Năm 2006</option><option value='2007'>Năm 2007</option><option value='2008'>Năm 2008</option><option value='2009'>Năm 2009</option><option value='2010'>Năm 2010</option><option value='2011'>Năm 2011</option><option value='2012'>Năm 2012</option><option value='2013'>Năm 2013</option><option value='2014'>Năm 2014</option><option value='2015'>Năm 2015</option><option value='2016'>Năm 2016</option><option value='2017'>Năm 2017</option>";
        html += "</select>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<div class='col-md-12'>";
        html += "<label for='ten_cong_ty' class='col-md-2 control-label'>Địa chỉ công ty</label>";
        html += "<div class='col-md-4'>";
        html += "<input type='text' class='form-control' class='dia_chi_cong_ty' id='dia_chi_cong_ty_" + count_kinh_nghiem + "'>";
        html += "</div>";
        html += "<div class='col-md-3'>";
        html += "<select class='form-control thanh_pho' id='thanh_pho_" + count_kinh_nghiem + "'><option value='0'>--Chọn Tỉnh / Thành Phố--</option><option value='1'>Hà Nội</option><option value='2'>Hồ Chí Minh</option><option value='3'>Đà Nẵng</option><option value='4'>Hải Phòng</option><option value='5'>Cần Thơ</option><option value='6'>An Giang</option><option value='7'>Bà Rịa Vũng Tàu</option><option value='8'>Bạc Liêu</option><option value='9'>Bắc Cạn</option><option value='10'>Bắc Giang</option><option value='11'>Hải Dương</option><option value='12'>Bắc Ninh</option><option value='13'>Bến Tre</option><option value='14'>Bình Dương</option><option value='15'>Bình Định</option><option value='16'>Bình Phước</option><option value='17'>Bình Thuận</option><option value='18'>Cà Mau</option><option value='19'>Cao Bằng</option><option value='20'>Đắk Lắk</option><option value='21'>Đăk Nông</option><option value='22'>Điện Biên</option><option value='23'>Đồng Nai</option><option value='24'>Đồng Tháp</option><option value='25'>Gia Lai</option><option value='26'>Hà Giang</option><option value='27'>Hà Nam</option><option value='28'>Hà Tĩnh</option><option value='29'>Hậu Giang</option><option value='30'>Hòa Bình</option><option value='31'>Hưng Yên</option><option value='32'>Khánh Hòa</option><option value='33'>Kiên Giang</option><option value='34'>Kon Tum</option><option value='35'>Lai Châu</option><option value='36'>Lâm Đồng</option><option value='37'>Lạng Sơn</option><option value='38'>Lào Cai</option><option value='39'>Long An</option><option value='40'>Nam Định</option><option value='41'>Nghệ An</option><option value='42'>Ninh Bình</option><option value='43'>Ninh Thuận</option><option value='44'>Phú Thọ</option><option value='45'>Phú Yên</option><option value='46'>Quảng Bình</option><option value='47'>Quảng Nam</option><option value='48'>Quảng Ngãi</option><option value='49'>Quảng Ninh</option><option value='50'>Quảng Trị</option><option value='51'>Sóc Trăng</option><option value='52'>Sơn La</option><option value='53'>Tây Ninh</option><option value='54'>Thái Bình</option><option value='55'>Thái Nguyên</option><option value='56'>Thanh Hóa</option><option value='57'>Huế</option><option value='58'>Tiền Giang</option><option value='59'>Trà Vinh</option><option value='60'>Tuyên Quang</option><option value='61'>Vĩnh Long</option><option value='62'>Vĩnh Phúc</option><option value='63'>Yên Bái</option></select>";
        html += "</div>";
        html += "<div class='col-md-3'>";
        html += "<select class='form-control quan_huyen' id='quan_huyen_" + count_kinh_nghiem + "'><option value='0'>--Chọn Quận / Huyện --</option></select>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<div class='col-md-12'>";
        html += "<label for='ten_cong_ty' class='col-md-2 control-label'>Mô tả ngắn</label>";
        html += "<div class='col-md-10'>";
        html += "<input type='text' class='form-control' class='mo_ta_ngan' id='mo_ta_" + count_kinh_nghiem + "'>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<div class='col-md-8'>";
        html += "<p id='kinh_nghiem_" + count_kinh_nghiem + "_txt' class='kinh-nghiem-hide'></p>";
        html += "</div>";
        html += "<div class='col-md-4'>";
        html += "<div class='btn btn-danger pull-right kinh_nghiem_delete-btn' id='delete_kinh_nghiem_" + count_kinh_nghiem + "'>Hủy bỏ</div>";
        html += "<div class='btn btn-primary pull-right kinh_nghiem_edit-btn' id='edit_kinh_nghiem_" + count_kinh_nghiem + "' style='display:none;'>Chỉnh sửa</div>";
        html += "<div class='btn btn-primary pull-right kinh_nghiem_success-btn' id='success_kinh_nghiem_" + count_kinh_nghiem + "'>Hoàn thành</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        $(html).appendTo('#kinh_nghiem_lam_viec>.panel-body');
        addEventToKinhNghiemLamViec();
    });

    $('.kinh_nghiem_delete-btn').click(function () {
        var id_obj = $(this).attr('id');
        id_obj = id_obj.substring(19, id_obj.length);
        $('#kinh_nghiem_lam_viec_' + id_obj).remove();
        count_kinh_nghiem--;
    });

    $('.kinh_nghiem_success-btn').click(function () {
        var id_obj = $(this).attr('id');
        id_obj = id_obj.substring(20, id_obj.length);
        $('#kinh_nghiem_lam_viec_' + id_obj + '_content').fadeOut("slow", function () {});
        $('#kinh_nghiem_' + id_obj + '_txt').html(' - ' + $('#vi_tri_' + id_obj).val() + ' tại ' + $('#ten_cong_ty_' + id_obj).val() + '  ( ' + $('#nam_bat_dau_lam_viec_' + id_obj).val() + ' - ' + $('#nam_ket_thuc_lam_viec_' + id_obj).val() + ' )');
        $(this).hide();
        $('#edit_kinh_nghiem_' + id_obj).show();
    });

    $('.kinh_nghiem_edit-btn').click(function () {
        var id_obj = $(this).attr('id');
        console.log(id_obj);
        id_obj = id_obj.substring(17, id_obj.length);
        $('#kinh_nghiem_lam_viec_' + id_obj + '_content').show();
        $(this).hide();
        $('#success_kinh_nghiem_' + id_obj).show();
    });

    $(".thanh_pho").change(function () {
        cityId = $(this).attr('id');
        cityId = cityId.substring(10, cityId.length);

        var citId = $(this).val();
        var request = $.ajax({
            url: site_link + "/getDistrict/" + citId,
            method: "GET",
            dataType: "html"
        });

        request.done(function (msg) {
            $("#quan_huyen_" + cityId).html(msg);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    });

    function addEventToKinhNghiemLamViec() {
        $('.kinh_nghiem_delete-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(19, id_obj.length);
            $('#kinh_nghiem_lam_viec_' + id_obj).remove();
            count_kinh_nghiem--;
        });

        $('.kinh_nghiem_success-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(20, id_obj.length);
            $('#kinh_nghiem_lam_viec_' + id_obj + '_content').fadeOut("slow", function () {});
            $('#kinh_nghiem_' + id_obj + '_txt').html(' - ' + $('#vi_tri_' + id_obj).val() + ' tại ' + $('#ten_cong_ty_' + id_obj).val() + '  ( ' + $('#nam_bat_dau_lam_viec_' + id_obj).val() + ' - ' + $('#nam_ket_thuc_lam_viec_' + id_obj).val() + ' )');
            $(this).hide();
            $('#edit_kinh_nghiem_' + id_obj).show();
        });

        $('.kinh_nghiem_edit-btn').click(function () {
            var id_obj = $(this).attr('id');
            console.log(id_obj);
            id_obj = id_obj.substring(17, id_obj.length);
            $('#kinh_nghiem_lam_viec_' + id_obj + '_content').show();
            $(this).hide();
            $('#success_kinh_nghiem_' + id_obj).show();
        });

        $('.thanh_pho').off('change');
        $(".thanh_pho").change(function () {
            cityId = $(this).attr('id');
            cityId = cityId.substring(10, cityId.length);

            var citId = $(this).val();
            var request = $.ajax({
                url: site_link + "/getDistrict/" + citId,
                method: "GET",
                dataType: "html"
            });

            request.done(function (msg) {
                $("#quan_huyen_" + cityId).html(msg);
            });

            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        });
    }

    $('#them_moi_hoc_tap').click(function () {
        count_hoc_tap++;
        var html = "";
        html += "<div class='form-hoc-tap-group' id='hoc_tap_" + count_hoc_tap + "'>";
        html += "<div id='hoc_tap_" + count_hoc_tap + "_content'>";
        html += "<div class='form-group'>";
        html += "<div class='col-md-12'>";
        html += "<label class='col-md-2'><input type='radio' class='check_box' name='bang_cap_" + count_hoc_tap + "' value='0' checked> Chứng chỉ</label>";
        html += "<label class='col-md-5'><input type='radio' class='check_box' name='bang_cap_" + count_hoc_tap + "' value='1'>Sau Đại học / Đại học / Cao đẳng / Trung cấp</label>";
        html += "<label class='col-md-5'><input type='radio' class='check_box' name='bang_cap_" + count_hoc_tap + "' value='2'>Tiểu học / Trung học</label>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Học tại</label>";
        html += "<div class='col-md-4'>";
        html += "<input type='text' class='form-control' class='truong_hoc' id='truong_hoc_" + count_hoc_tap + "' placeholder='Nhập tên trường, trung tâm học'>";
        html += "</div>";
        html += "<div class='col-md-6'>";
        html += "<label class='col-sm-offset-2'><input type='radio' name='student_process_" + count_hoc_tap + "' value='0' checked>Đang học</label>";
        html += "<label class='col-sm-offset-2'><input type='radio' name='student_process_" + count_hoc_tap + "' value='1'>Đã tốt nghiệp</label>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Thời gian học</label>";
        html += "<div class='col-md-1'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Từ:</label>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='thang_bat_dau' id='thang_bat_dau_" + count_hoc_tap + "'>";
        html += "<option value='0'>--Chọn Tháng--</option>";
        html += "<option value='1'>Tháng 1</option>";
        html += "<option value='2'>Tháng 2</option>";
        html += "<option value='3'>Tháng 3</option>";
        html += "<option value='4'>Tháng 4</option>";
        html += "<option value='5'>Tháng 5</option>";
        html += "<option value='6'>Tháng 6</option>";
        html += "<option value='7'>Tháng 7</option>";
        html += "<option value='8'>Tháng 8</option>";
        html += "<option value='9'>Tháng 9</option>";
        html += "<option value='10'>Tháng 10</option>";
        html += "<option value='11'>Tháng 11</option>";
        html += "<option value='12'>Tháng 12</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='nam_bat_dau' id='nam_bat_dau_" + count_hoc_tap + "'>";
        html += "<option value='0'>--Chọn Năm--</option>";
        html += "<option value='1960'>Năm 1960</option><option value='1961'>Năm 1961</option><option value='1962'>Năm 1962</option><option value='1963'>Năm 1963</option><option value='1964'>Năm 1964</option><option value='1965'>Năm 1965</option><option value='1966'>Năm 1966</option><option value='1967'>Năm 1967</option><option value='1968'>Năm 1968</option><option value='1969'>Năm 1969</option><option value='1970'>Năm 1970</option><option value='1971'>Năm 1971</option><option value='1972'>Năm 1972</option><option value='1973'>Năm 1973</option><option value='1974'>Năm 1974</option><option value='1975'>Năm 1975</option><option value='1976'>Năm 1976</option><option value='1977'>Năm 1977</option><option value='1978'>Năm 1978</option><option value='1979'>Năm 1979</option><option value='1980'>Năm 1980</option><option value='1981'>Năm 1981</option><option value='1982'>Năm 1982</option><option value='1983'>Năm 1983</option><option value='1984'>Năm 1984</option><option value='1985'>Năm 1985</option><option value='1986'>Năm 1986</option><option value='1987'>Năm 1987</option><option value='1988'>Năm 1988</option><option value='1989'>Năm 1989</option><option value='1990'>Năm 1990</option><option value='1991'>Năm 1991</option><option value='1992'>Năm 1992</option><option value='1993'>Năm 1993</option><option value='1994'>Năm 1994</option><option value='1995'>Năm 1995</option><option value='1996'>Năm 1996</option><option value='1997'>Năm 1997</option><option value='1998'>Năm 1998</option><option value='1999'>Năm 1999</option><option value='2000'>Năm 2000</option><option value='2001'>Năm 2001</option><option value='2002'>Năm 2002</option><option value='2003'>Năm 2003</option><option value='2004'>Năm 2004</option><option value='2005'>Năm 2005</option><option value='2006'>Năm 2006</option><option value='2007'>Năm 2007</option><option value='2008'>Năm 2008</option><option value='2009'>Năm 2009</option><option value='2010'>Năm 2010</option><option value='2011'>Năm 2011</option><option value='2012'>Năm 2012</option><option value='2013'>Năm 2013</option><option value='2014'>Năm 2014</option><option value='2015'>Năm 2015</option><option value='2016'>Năm 2016</option><option value='2017'>Năm 2017</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='col-md-1'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Đến:</label>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='thang_ket_thuc' id='thang_ket_thuc_" + count_hoc_tap + "'>";
        html += "<option value='0'>--Chọn Tháng--</option>";
        html += "<option value='1'>Tháng 1</option>";
        html += "<option value='2'>Tháng 2</option>";
        html += "<option value='3'>Tháng 3</option>";
        html += "<option value='4'>Tháng 4</option>";
        html += "<option value='5'>Tháng 5</option>";
        html += "<option value='6'>Tháng 6</option>";
        html += "<option value='7'>Tháng 7</option>";
        html += "<option value='8'>Tháng 8</option>";
        html += "<option value='9'>Tháng 9</option>";
        html += "<option value='10'>Tháng 10</option>";
        html += "<option value='11'>Tháng 11</option>";
        html += "<option value='12'>Tháng 12</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='col-md-2'>";
        html += "<select class='form-control col-md-2' class='nam_ket_thuc' id='nam_ket_thuc_" + count_hoc_tap + "'>";
        html += "<option value='0'>--Chọn Năm--</option>";
        html += "<option value='1960'>Năm 1960</option><option value='1961'>Năm 1961</option><option value='1962'>Năm 1962</option><option value='1963'>Năm 1963</option><option value='1964'>Năm 1964</option><option value='1965'>Năm 1965</option><option value='1966'>Năm 1966</option><option value='1967'>Năm 1967</option><option value='1968'>Năm 1968</option><option value='1969'>Năm 1969</option><option value='1970'>Năm 1970</option><option value='1971'>Năm 1971</option><option value='1972'>Năm 1972</option><option value='1973'>Năm 1973</option><option value='1974'>Năm 1974</option><option value='1975'>Năm 1975</option><option value='1976'>Năm 1976</option><option value='1977'>Năm 1977</option><option value='1978'>Năm 1978</option><option value='1979'>Năm 1979</option><option value='1980'>Năm 1980</option><option value='1981'>Năm 1981</option><option value='1982'>Năm 1982</option><option value='1983'>Năm 1983</option><option value='1984'>Năm 1984</option><option value='1985'>Năm 1985</option><option value='1986'>Năm 1986</option><option value='1987'>Năm 1987</option><option value='1988'>Năm 1988</option><option value='1989'>Năm 1989</option><option value='1990'>Năm 1990</option><option value='1991'>Năm 1991</option><option value='1992'>Năm 1992</option><option value='1993'>Năm 1993</option><option value='1994'>Năm 1994</option><option value='1995'>Năm 1995</option><option value='1996'>Năm 1996</option><option value='1997'>Năm 1997</option><option value='1998'>Năm 1998</option><option value='1999'>Năm 1999</option><option value='2000'>Năm 2000</option><option value='2001'>Năm 2001</option><option value='2002'>Năm 2002</option><option value='2003'>Năm 2003</option><option value='2004'>Năm 2004</option><option value='2005'>Năm 2005</option><option value='2006'>Năm 2006</option><option value='2007'>Năm 2007</option><option value='2008'>Năm 2008</option><option value='2009'>Năm 2009</option><option value='2010'>Năm 2010</option><option value='2011'>Năm 2011</option><option value='2012'>Năm 2012</option><option value='2013'>Năm 2013</option><option value='2014'>Năm 2014</option><option value='2015'>Năm 2015</option><option value='2016'>Năm 2016</option><option value='2017'>Năm 2017</option>";
        html += "</select>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<label for='birthday' class='col-md-2 control-label'>Tốt nghiệp loại</label>";
        html += "<div class='col-md-3'>";
        html += "<select class='form-control' class='loai_tot_nghiep' id='loai_tot_nghiep_" + count_hoc_tap + "'>";
        html += "<option value='0'>--Chọn loại tốt nghiệp--</option>";
        html += "<option value='1'>Trung bình</option>";
        html += "<option value='2'>Trung bình khá</option>";
        html += "<option value='3'>Khá</option>";
        html += "<option value='4'>Giỏi</option>";
        html += "<option value='5'>Xuất sắc</option>";
        html += "</select>";
        html += "</div>";
        html += "<label for='chuyen_nganh' class='col-md-2 control-label'><div id='loai_tot_nghiep_" + count_hoc_tap + "_label'>Chuyên ngành</div></label>";
        html += "<div class='col-md-5'>";
        html += "<input type='text' class='form-control' class='chuyen_nganh' id='chuyen_nganh_" + count_hoc_tap + "'>";
        html += "</div>";

        html += "</div>";
        html += "</div>";
        html += "<div class='form-group'>";
        html += "<div class='col-md-8'>";
        html += "<p id='truong_hoc_" + count_hoc_tap + "_txt' class='truong-hoc-hide'></p>";
        html += "</div>";

        html += "<div class='col-md-4'>";
        html += "<div class='btn btn-danger pull-right hoc_tap_delete-btn' id='delete_" + count_hoc_tap + "'>Hủy bỏ</div>";
        html += "<div class='btn btn-primary pull-right hoc_tap_success-btn' id='success_" + count_hoc_tap + "'>Hoàn thành</div>";
        html += "<div class='btn btn-primary pull-right hoc_tap_edit-btn' id='edit_" + count_hoc_tap + "' style='display:none;'>Chỉnh sửa</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";

        $(html).appendTo('#qua_trinh_hoc_tap>.panel-body');
        addEventToQuaTrinhHocTap();
    });

    $('.hoc_tap_delete-btn').click(function () {
        var id_obj = $(this).attr('id');
        id_obj = id_obj.substring(7, id_obj.length);
        $('#hoc_tap_' + id_obj).remove();
        count_hoc_tap--;
    });

    $('#success_0').click(function () {
        $('#hoc_tap_0_content').fadeOut("slow", function () {});
        $('#truong_hoc_0_txt').html(' - ' + $('#truong_hoc_0').val() + ' ( ' + $('#nam_bat_dau_0').val() + ' - ' + $('#nam_ket_thuc_0').val() + ' )');
        $(this).hide();
        $('#edit_0').show();
    });

    $('.hoc_tap_edit-btn').click(function () {
        var id_obj = $(this).attr('id');
        id_obj = id_obj.substring(5, id_obj.length);
        $('#hoc_tap_' + id_obj + '_content').show();
        $(this).hide();
        $('#success_' + id_obj).show();
    });

    $('.check_box').change(function () {
        var id_obj = $(this).attr('name');
        id_obj = id_obj.substring(9, id_obj.length);
        switch (this.value) {
            case '0':
                $('#loai_tot_nghiep_0_label').show();
                $('#chuyen_nganh_0').show();
                break;
            case '1':
                $('#loai_tot_nghiep_0_label').show();
                $('#chuyen_nganh_0').show();
                break;
            case '2':
                $('#loai_tot_nghiep_0_label').hide();
                $('#chuyen_nganh_0').hide();
                break;
            default:
                $('#loai_tot_nghiep_0_label').show();
                $('#chuyen_nganh_0').show();
                break;
        }
    });

    function addEventToQuaTrinhHocTap() {
        $('.hoc_tap_delete-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(7, id_obj.length);
            $('#hoc_tap_' + id_obj).remove();
            count_hoc_tap--;
        });

        $('.hoc_tap_success-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(8, id_obj.length);
            $('#hoc_tap_' + id_obj + '_content').fadeOut("slow", function () {});
            $('#truong_hoc_' + id_obj + '_txt').html(' - ' + $('#truong_hoc_' + id_obj).val() + ' ( ' + $('#nam_bat_dau_' + id_obj).val() + ' - ' + $('#nam_ket_thuc_' + id_obj).val() + ' )');
            $(this).hide();
            $('#edit_' + id_obj).show();
        });

        $('.hoc_tap_edit-btn').click(function () {
            var id_obj = $(this).attr('id');
            id_obj = id_obj.substring(5, id_obj.length);
            $('#hoc_tap_' + id_obj + '_content').show();
            $(this).hide();
            $('#success_' + id_obj).show();
        });
        $('.check_box').off('change');
        $('.check_box').change(function () {
            var id_obj = $(this).attr('name');
            id_obj = id_obj.substring(9, id_obj.length);
            switch (this.value) {
                case '0':
                    $('#loai_tot_nghiep_' + id_obj + '_label').show();
                    $('#chuyen_nganh_' + id_obj + '').show();
                    break;
                case '1':
                    $('#loai_tot_nghiep_' + id_obj + '_label').show();
                    $('#chuyen_nganh_' + id_obj + '').show();
                    break;
                case '2':
                    $('#loai_tot_nghiep_' + id_obj + '_label').hide();
                    $('#chuyen_nganh_' + id_obj + '').hide();
                    break;
                default:
                    $('#loai_tot_nghiep_' + id_obj + '_label').show();
                    $('#chuyen_nganh_' + id_obj + '').show();
                    break;
            }
        });
    }

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
            url: site_link + "/getDistrict/" + citId,
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
            url: site_link + "/getTown/" + districtId,
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

        alert(1);
        return false;
        $("#create-company").submit();
    });
});