<div id="share-form">
    <form action="{$this->url(['controller' => $controller,'action' => 'share', 'idProduct' => $product->id])}" method="POST" class="b-form">
        <fieldset class="main">
            <div class="field">
                <label for="share_email">Электронная почта друга</label>
                <input type="email" id="share_email" value="" name="share[email]"/>
                <p class="help">Укажите элетронную почту, куда отправить приглашение.</p>
            </div>
            <div class="field">
                <label for="share_name">Ваше имя</label>
                <input type="text" id="share_name" value="" name="share[name]"/>
            </div>
            <div class="field">
                <label for="share_text">Комментарий</label>
                <textarea id="share_text" name="share[text]" cols="30" rows="4"></textarea>
            </div>
        </fieldset>
        <fieldset class="submit">
            <input type="submit" value="Отправить" />
        </fieldset>
    </form>
</div>