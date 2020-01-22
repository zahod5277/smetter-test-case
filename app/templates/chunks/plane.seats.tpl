<div class="cockpit">
    <h1>Забейте местечко</h1>
</div>
<div class="exit exit--front fuselage">
</div>
<ol class="cabin fuselage">
    {foreach 1..10 as $i}
        <li class="plane__row row--{$i}">
            <ol class="seats" type="A">
                {foreach ['A', 'B', 'C', 'D', 'E', 'F'] as $seat_row}
                    {var $current_seat = $i~$seat_row}
                    {var $attrs = 'data-seat id="'~$current_seat~'"'}
                    {var $label = $current_seat}

                    {foreach $seats as $seat}
                        {if $seat.seat == $current_seat}
                            {var $attrs = 'data-seat data-occupied disabled id="'~$current_seat~'"'}
                            {var $label = 'Occupied'}
                        {/if}
                    {/foreach}
                    <li class="seat">
                        <input type="checkbox" {$attrs}/>
                        <label for="{$label}">{$label}</label>
                    </li>
                {/foreach}
            </ol>
        </li>
    {/foreach}
</ol>
<div class="exit exit--back fuselage">

</div>