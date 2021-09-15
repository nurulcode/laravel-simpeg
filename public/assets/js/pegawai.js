$(document).ready(function() {
    $('#pegawai').select2({
        placeholder: 'Loading...',
        ajax: {
            url: '/kepegawaian/pegawai/detail',
            delay: 450,
            processResults: function({ data }) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: `${item.nama}`,
                            id: item.id,
                        }
                    })
                };
            },

            cache: true
        }
    });
})