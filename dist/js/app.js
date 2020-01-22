let App = {
    book_seat: function (id,el) {

        $('[data-seat]').attr('disabled', true);
        $(el).attr('disabled', false);
        $('label[for="' + id + '"]').toggleClass('seat__booking');
        $('[data-book-form]').addClass('form__book--visible');

        if (($('input[data-seat]:checked').length == 0)) {
            $('[data-seat]:not([data-occupied])').attr('disabled', false);
            $('[data-book-form]').removeClass('form__book--visible');
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
                if (api == 'put/flight/seat'){
                    App.reload_seats();
                }
            });
    },
    reload_seats: function(){
        let api = 'get/flights/seats',
            params = $('[data-api="get/flights/seats"]').val();
        App.ajax(api, params, '[data-flights-seats]');
    }
}


$(document).ready(function () {
    $('body').on('change', '[data-select]', function (e) {
        e.preventDefault();
        let api = $(this).data('api'),
            params = $(this).val();
        switch (api) {
            case 'get/flights/dates':
                $('.plane').hide();
                App.ajax(api, params, '[data-flights-date]');
                break;
            case 'get/flights/seats':
                App.ajax(api, params, '[data-flights-seats]');
                $('.plane').show();
                break;
            default:
                break;
        }
    });
    $('body').on('change', '[data-seat]', function (e) {
        let id = $(this).attr('id');
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
            };
        App.ajax(api,params,'[data-info]');

        return false;
    });

    $('body').on('click', '.seat', function(){
        if ($('input',this).is('[data-occupied]')){
            let api = 'get/flights/seat/info',
                params = {
                    seat: $('input',this).attr('id'),
                    flight: $('[data-api="get/flights/seats"]').val()
                };
            App.ajax(api,params,'[data-info]');
        }
    });
});