$('#poli_id').click(function() {
    // console.log('hahaha');
    let poliId = $(this).val();
    $('#ruang').empty();
    $('#kamar').empty();
    $('#ranjang').empty();
    $('#kelas').val('');
    $('#kelas_id').val('');
    $.ajax({
        type: 'GET',
        url: '/ruang/' + poliId,
        success: function(response) {
            $('#ruang').append(`<option value="0" disabled selected>--Select--</option>`);
            response.forEach(element => {
                $('#ruang').append(`<option value="${element['id']}">${element['uraian']}</option>`);
            });
        }
    });
});

$('#ruang').change(function(e) {
    $('#kamar').empty();
    $('#ranjang').empty();
    let ruangId = $(this).val();
    $.ajax({
        type: 'GET',
        url: '/kamar/' + ruangId,
        success: function(response) {
            $('#kelas').val(response.kelas.uraian)
            $('#kelas_id').val(response.kelas.id)
            $('#kamar').append(`<option value="0" disabled selected>--Select--</option>`);
            response.data.forEach(element => {
                $('#kamar').append(`<option value="${element['id']}">${element['uraian']}</option>`);
            });
        }
    });
});

$('#kamar').change(function(e) {
    let kamarId = $(this).val();
    $('#ranjang').empty();
    $.ajax({
        type: 'GET',
        url: '/ranjang/' + kamarId,
        success: function(response) {
            $('#ranjang').append(`<option value="0" disabled selected>--Select--</option>`);
            response.forEach(element => {
                $('#ranjang').append(`<option value="${element['id']}">${element['ranjang']}</option>`);
            });
        }
    });
});