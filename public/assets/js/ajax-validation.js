$('#form').submit(function (e) {
    e.preventDefault();
    let form = $(this);

    $.ajax({
        url: form.attr('action'),
        method: "post",
        data: form.serialize(),
        beforeSend: function (xhr) {
            form.find('help-block').detach()
            form.find('form-group').removeClass('has-error')
        },

    }).done(response => {
        console.log('success');
    }).fail(xhr => {
        let response = xhr.responseJSON
        let errors = response.errors

        if ($.isEmptyObject(errors) === false) {
            $.each(errors, (key, value) => {
                $(`#${key}`)
                    .closest('.form-group')
                    .addClass('has-error')
                    .append(`<span class="help-block><strong>${value.join(", ")}</strong></span>`)
            })
        }
    })
});
