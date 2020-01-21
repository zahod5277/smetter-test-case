let App = {

    options: {
    },

    init: function () {

    },
    getFlightsDate: function(){

    },
    ajax: function(api,params,el){
        $.post(
            'index.php', {
                api: api,
                params: params
            },
            function (resp) {
                $(el).html(resp);
            });
    }
}


$(document).ready(function () {
    $('body').on('change', '[data-select]', function (e) {
        e.preventDefault();
        let api = $(this).data('api'),
            params;
        switch (api){
            case 'get/flights/dates':
                params = $(this).val();
                App.ajax(api,params,'[data-flights-date]');
                break;
            default:
                break;
        }

    });
});