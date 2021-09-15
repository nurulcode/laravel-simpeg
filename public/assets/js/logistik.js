$('#logistik').select2({
    placeholder: 'Loading...',
    ajax: {
        url: '/master/logistik/detail',
        delay: 450,
        processResults: function ({
            data
        }) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: `${item.jenis} - ( ${item.uraian} ) `,
                        id: item.id,
                    }
                })
            };
        },

        cache: true
    }
});
