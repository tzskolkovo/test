'use strict';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
'use strict';

$(document).ready(function () {

    Foundation.Abide.defaults.patterns['tel'] = /^\+7 \d{3} \d{3}-\d{2}-\d{2}$/;
    Foundation.Abide.defaults.patterns['date'] = /^\d{1,2}\.\d{1,2}\.\d{4}$/;

    $(document).foundation();

    $('[type="tel"]').mask('+7 000 000-00-00');
    $('[name^="date-"]').mask('00.00.2000');

    $('.ajax-form[data-abide]').on('formvalid.zf.abide', sendForm).on('submit', function (event) {
        return false;
    });

    function sendForm(event) {
        event.preventDefault();
        var _ = $(this);
        var data = _.serialize();
        _.addClass('form-sending');
        $.ajax({
            url: _.attr('action'),
            method: "POST",
            dataType: 'json',
            data: data,
            success: function success() {
                setTimeout(function () {
                    _.removeClass('form-sending');
                    $.notify('Ваша заявка принята!', 'success');
                    _.trigger('reset');
                }, 350);
            },
            error: function error(response) {
                setTimeout(function () {
                    _.removeClass('form-sending');
                    $.each(response.responseJSON, function(k, v) {
                        $.notify(k + ': '+ v.join(','), 'error');
                    });
                }, 350);
            }
        });
    }
});