$(document).ready(function () {
    $('#no_rekam_medis').select2({
        ajax: {
            url: '/pasien/data',
            delay: 450,
            processResults: function ({
                data
            }) {
                return {
                    results: $.map(data, function (item) {
                        // console.log(item);
                        return {
                            text: `${item.no_rekam_medis} / ${item.nama} `,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true
        },
        placeholder: 'Pilih - No Rekam Medis',
        minimumInputLength: 1,
    });
})
