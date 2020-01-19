{extends 'base.tpl'}
{block 'CONTENT'}
    <div class="container">
        <div>
            <select name="flights_from" id="flights" class="form-control">
                {foreach $flights as $flight}
                    <option value="{$flight.flight_code}">{$flight.flight_from} -> {$flight.flight_to}</option>
                {/foreach}
            </select>
        </div>
        <div class="plane">
        </div>
    </div>
{/block}