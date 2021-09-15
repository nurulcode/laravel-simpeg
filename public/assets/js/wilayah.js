$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: '/provinsi',
        success: function (response) {
            // console.log(response);
            $('#provinsi').append(`<option value="0" disabled selected>--Select--</option>`);
            response.forEach(element => {
                $('#provinsi').append(`<option value="${element.id}">${element.nama}</option>`);
            });
        }
    });

    $('#provinsi').change(function (e) {
        $('#kabupaten').empty();
        $('#kecamatan').empty();
        $('#kelurahan').empty();
        let id = $(this).val();
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: '/kabupaten/' + id,
            success: function (response) {
                $('#kabupaten').append(`<option value="0" disabled selected>--Select--</option>`);
                response.forEach(element => {
                    $('#kabupaten').append(`<option value="${element.id}">${element.nama}</option>`);
                });
            }
        });
    });

    $('#kabupaten').change(function (e) {
        $('#kecamatan').empty();
        $('#kelurahan').empty();
        let id = $(this).val();
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: '/kecamatan/' + id,
            success: function (response) {
                $('#kecamatan').append(`<option value="0" disabled selected>--Select--</option>`);
                response.forEach(element => {
                    $('#kecamatan').append(`<option value="${element.id}">${element.nama}</option>`);
                });
            }
        });
    });

    $('#kecamatan').change(function (e) {
        $('#kelurahan').empty();
        let id = $(this).val();
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: '/kelurahan/' + id,
            success: function (response) {
                $('#kelurahan').append(`<option value="0" disabled selected>--Select--</option>`);
                response.forEach(element => {
                    $('#kelurahan').append(`<option value="${element.id}">${element.nama}</option>`);
                });
            }
        });
    });

});
