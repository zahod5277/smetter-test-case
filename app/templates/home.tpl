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
            <div class="col-12 col-sm-4 form__book" data-book-form>
                <form action="" data-api="put/flight/seat" method="POST" data-form>
                    <h6>Введите данные по-братски</h6>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Имя Фамилия">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="passport" placeholder="Серия и номер паспорта">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Забронить резко</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12" data-info>

            </div>
            <div class="col-12 plane" data-flights-seats>

            </div>
        </div>
    </div>
{/block}