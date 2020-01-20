let App = {

    options: {
    },

    init: function () {

    },
}

$(document).ready(function () {
    $('body').on('change', '[data-select]', function (e) {
        e.preventDefault();
        let api = $(this).data('api'),
            params;
        if (api == 'get/flights/dates'){
            params = $(this).val();
        }

        $.post(
            'index.php', {
                api: api,
                params: params
            },
            function (resp) {
                $('[data-select-parent="'+api+'"]').html(resp);
            });
    });
    $('body').on('click', '[data-backward]', function(e){
        e.preventDefault();
    });
});