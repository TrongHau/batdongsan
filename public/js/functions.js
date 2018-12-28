$(".select-province" ).change(function() {
    if($(this).val()) {
        getDistrict($(this).val());
    }
});
function getDistrict(province_id, district_id = '') {
    $.ajax({
        url: "/get_district",
        type: "POST",
        dataType: "json",
        data: {province_id: province_id},
        beforeSend: function () {
        },
        success: function(data) {
            $('.select-district').html('<option value="">--Chọn Quận/Huyện--</option>');
            $('.select-ward').html('<option value="">--Chọn Phường/Xã--</option>');
            $('.select-street').html('<option value="">--Chọn Đường/Phố--</option>');
            if(district_id) {
                $.each(data.data, function (index, value) {
                    if(district_id == value.id){
                        $('.select-district').append('<option selected value="' + value.id + '">' + value._name + '</option>');
                    }else{
                        $('.select-district').append('<option value="' + value.id + '">' + value._name + '</option>');
                    }
                });
            }else{
                $.each(data.data, function (index, value) {
                    $('.select-district').append('<option value="' + value.id + '">' + value._name + '</option>');
                });
            }
        }
    });
}
$(".select-district").change(function() {
    if($(this).val()) {
        getWard($(this).val());
    }
});
function getWard(district_id, ward_id = '', street_id = '') {
    $.ajax({
        url: "/get_ward",
        type: "POST",
        dataType: "json",
        data: {district_id: district_id, province_id: $(".select-province").val()},
        beforeSend: function () {
        },
        success: function(data) {
            $('.select-ward').html('<option value="">--Chọn Phường/Xã--</option>');
            $('.select-street').html('<option value="">--Chọn Đường/Phố--</option>');
            if(ward_id) {
                $.each(data.data.ward, function (index, value) {
                    if(ward_id == value.id){
                        $('.select-ward').append('<option selected value="' + value.id + '">' + value._name + '</option>');
                    }else {
                        $('.select-ward').append('<option value="' + value.id + '">' + value._name + '</option>');
                    }
                });
            }else{
                $.each(data.data.ward, function (index, value) {
                    $('.select-ward').append('<option value="' + value.id + '">' + value._name + '</option>');
                });
            }
            if(street_id) {
                $.each(data.data.street, function (index, value) {
                    if(street_id == value.id) {
                        $('.select-street').append('<option selected value="' + value.id + '">' + value._name + '</option>');
                    }else {
                        $('.select-street').append('<option value="' + value.id + '">' + value._name + '</option>');
                    }
                });
            }else {
                $.each(data.data.street, function (index, value) {
                    $('.select-street').append('<option value="' + value.id + '">' + value._name + '</option>');
                });
            }
        }
    });
}
function alertModal(content) {
    $("#myModal .modal-body").html('<i class="material-icons modal_icon_csn">error_outline</i><div class="modal_content_csn">' + content + '</div>');
    $("#myModal").modal();
}
function successModal(content) {
    $("#myModal .modal-body").html('<i class="material-icons modal_icon_csn">check_circle_outline</i><div class="modal_content_csn">' + content + '</div>');
    $("#myModal").modal();
}