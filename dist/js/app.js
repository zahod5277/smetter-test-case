let App = {

    options: {
        book_form: '[data-book-form]',
    },

    init: function () {
        var $this = this;
    },
    book_seat: function (id,el) {
        $('[data-seat]').attr('disabled', true);
        $(el).attr('disabled', false);
        $('label[for="' + id + '"]').toggleClass('seat__booking');
        $(App.options.book_form).addClass('form__book--visible');
        if (($('input[data-seat]:checked').length == 0)) {
            $('[data-seat]:not([data-occupied])').attr('disabled', false);
            $(App.options.book_form).removeClass('form__book--visible');
        }

    },
    ajax: function (api, params, el) {
        $.post(
            'index.php', {
                api: api,
                params: params
            },
            function (resp) {
                $(el).html(resp);
            });
    },
    reload_seats: function(){
        console.log('reload plane');
    }
}


$(document).ready(function () {
    App.init();

    $('body').on('change', '[data-select]', function (e) {
        e.preventDefault();
        let api = $(this).data('api'),
            params = $(this).val();
        switch (api) {
            case 'get/flights/dates':
                App.ajax(api, params, '[data-flights-date]');
                break;
            case 'get/flights/seats':
                App.ajax(api, params, '[data-flights-seats]');
                break;
            default:
                break;
        }
    });
    $('body').on('change', '[data-seat]', function (e) {
        var id = $(this).attr('id');
        App.book_seat(id,this);
    });

    $(document).off('submit', '[data-form]').on('submit', '[data-form]', function (e) {
        e.preventDefault();
        let api = $(this).data('api'),
            params = {
                name: $('[name="name"]',this).val(),
                passport: $('[name="passport"]',this).val(),
                flight: $('[name="flights_date"]').val(),
                seat: $('[data-seat]:checked').attr('id')
            }
        App.ajax(api,params,'[data-info]');
        App.reload_seats();

        return false;
    });
});