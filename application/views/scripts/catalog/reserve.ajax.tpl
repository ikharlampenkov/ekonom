<div id="reserve-form">
    <form action="{$this->url(['controller' => $controller,'action' => 'reserve', 'idProduct' => $product->id])}" method="POST" class="b-form">
        <fieldset class="main">
            <div class="field">
                <label for="reserve_name">Ваше имя</label>
                <input type="text" id="reserve_name" value="" name="reserve[name]"/>
            </div>
            <div class="field">
                <label for="reserve_tel">Контактный телефон</label>
                <input type="tel" id="reserve_tel" value="" name="reserve[tel]"/>

                <p class="help">Укажите телефон, по которому с вам можно связаться для подтверждения заказа.</p>
            </div>
            <div class="field">
                <label for="reserve_email">Электронная почта</label>
                <input type="email" id="reserve_email" value="" name="reserve[email]"/>

                <p class="help">Укажите электронную почту, по которой с вам можно связаться для подтверждения заказа.</p>
            </div>
        </fieldset>
        <fieldset class="submit">
            <input type="submit" value="Отправить"/>
        </fieldset>
    </form>
</div>