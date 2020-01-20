{extends 'base.tpl'}
{block 'CONTENT'}
    <div class="container mt-5">
        <div class="col-12 col-sm-4">
            <h6>Выберите рейс, плиз</h6>
            <select data-select data-api="get/flights/dates" data-params name="flights" id="flights" class="form-control">
                <option value="" disabled selected="selected">Нажмите для выбора</option>
                {foreach $flights as $flight}
                    <option value="{$flight.flight_code}">{$flight.flight_from} -> {$flight.flight_to}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-12 col-sm-8">

        </div>
        <div class="plane">
        </div>
    </div>
{/block}