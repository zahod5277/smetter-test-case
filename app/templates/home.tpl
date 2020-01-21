{extends 'base.tpl'}
{block 'CONTENT'}
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <h6>Выберите рейс, плиз</h6>
                    <select data-select data-api="get/flights/dates" data-params name="flights" id="flights"
                            class="form-control">
                        <option value="" disabled selected="selected">Нажмите для выбора</option>
                        {foreach $flights as $flight}
                            <option value="{$flight.flight_code}">{$flight.flight_from} -> {$flight.flight_to}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-4" data-flights-date>

            </div>
            <div class="plane">
            </div>
        </div>
    </div>
{/block}