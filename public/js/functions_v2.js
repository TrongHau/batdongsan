$(".select-province" ).change(function() {
    if($(this).val()) {
        var divParent = $(this).parent().parent().parent().parent().parent().parent().parent();
        getDistrict($(this).val(), '', divParent);
    }
});
function getDistrict(province_id, district_id = '', divParent) {
    $.ajax({
        url: "/get_district",
        type: "POST",
        dataType: "json",
        data: {province_id: province_id},
        beforeSend: function () {
        },
        success: function(data) {
            divParent.find('.select-district').html('<option value="">--Chọn Quận/Huyện--</option>');
            divParent.find('.select-ward').html('<option value="">--Chọn Phường/Xã--</option>');
            divParent.find('.select-street').html('<option value="">--Chọn Đường/Phố--</option>');
            if(district_id) {
                $.each(data.data, function (index, value) {
                    if(district_id == value.id){
                        divParent.find('.select-district').append('<option selected value="' + value.id + '">' + value._name + '</option>');
                    }else{
                        divParent.find('.select-district').append('<option value="' + value.id + '">' + value._name + '</option>');
                    }
                });
            }else{
                $.each(data.data, function (index, value) {
                    divParent.find('.select-district').append('<option value="' + value.id + '">' + value._name + '</option>');
                });
            }
        }
    });
}
$(".select-district").change(function() {
    if($(this).val()) {
        var divParent = $(this).parent().parent().parent().parent().parent().parent().parent();
        getWard($(this).val(), '', '', divParent);
    }
});
function getWard(district_id, ward_id = '', street_id = '', divParent) {
    $.ajax({
        url: "/get_ward",
        type: "POST",
        dataType: "json",
        data: {district_id: district_id, province_id: $(".select-province").val()},
        beforeSend: function () {
        },
        success: function(data) {
            divParent.find('.select-ward').html('<option value="">--Chọn Phường/Xã--</option>');
            divParent.find('.select-street').html('<option value="">--Chọn Đường/Phố--</option>');
            if(ward_id) {
                $.each(data.data.ward, function (index, value) {
                    if(ward_id == value.id){
                        divParent.find('.select-ward').append('<option selected value="' + value.id + '">' + value._name + '</option>');
                    }else {
                        divParent.find('.select-ward').append('<option value="' + value.id + '">' + value._name + '</option>');
                    }
                });
            }else{
                $.each(data.data.ward, function (index, value) {
                    divParent.find('.select-ward').append('<option value="' + value.id + '">' + value._name + '</option>');
                });
            }
            if(street_id) {
                $.each(data.data.street, function (index, value) {
                    if(street_id == value.id) {
                        divParent.find('.select-street').append('<option selected value="' + value.id + '">' + value._name + '</option>');
                    }else {
                        divParent.find('.select-street').append('<option value="' + value.id + '">' + value._name + '</option>');
                    }
                });
            }else {
                $.each(data.data.street, function (index, value) {
                    divParent.find('.select-street').append('<option value="' + value.id + '">' + value._name + '</option>');
                });
            }
        }
    });
}
function alertModal(content) {
    $("#myModal .modal-body").html('<div class="modal_content_csn">' + content + '</div>');
    $("#myModal").modal();
}
function successModal(content) {
    $("#myModal .modal-body").html('<div class="modal_content_csn">' + content + '</div>');
    $("#myModal").modal();
}
function searchAdvance() {
    if($('#search-advance-method').val() == -1) {
        alertModal('Vui lòng chọn loại nhà đất tìm kiếm');
        return false;
    }
    window.location.href = window.location.origin + '/tim-kiem-nang-cao/' + $('#search-advance-method').val()+ '/' + ($('.select-province').val() ?  $('.select-province').val() : -1) + '/' + ($('.select-district').val() ? $('.select-district').val() : -1) + '/' + ($('.select-ward').val() ? $('.select-ward').val() : -1) + '/' + ($('.select-street').val() ? $('.select-street').val() : -1) + '/' + $('#search-advance-area').val() + '/' + $('#search-advance-price').val() + '/' + $('#search-advance-bed_room').val() + '/' + $('#search-advance-toilet').val() + '/' + $('#search-advance-ddlHomeDirection').val()+ ($('#tu-khoa').val() ? '/' + $('#tu-khoa').val() : '');

}