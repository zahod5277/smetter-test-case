<div class="form-group">
    <h6>Выберите дату, позязя</h6>
    <select name="flights_date" data-api="get/flights/seats" data-select id="flights_date" class="form-control">
        <option value="" disabled selected="selected">Нажмите для выбора</option>
        {foreach $dates as $date}
        <option value="{$date.id}">{$date.flight_date|date_format:'%d.%m.%Y в %H:%M'}</option>
        {/foreach}
    </select>
</div>