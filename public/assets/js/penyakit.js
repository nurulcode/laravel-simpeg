$(document).ready(function () {
    $('#penyakit').select2({
        placeholder: 'Loading...',
        ajax: {
            url: '/master/penyakit/detail',
            delay: 450,
            processResults: function ({data}) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: `${item.icd} - ${item.uraian}`,
                            id: item.id,
                        }
                    })
                };
            },

            cache: true
        }
    });
})
