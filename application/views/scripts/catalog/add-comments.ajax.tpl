<div id="add-comment-form">
    <form action="{$this->url(['controller' => $controller,'action' => 'addComments', 'idProduct' => $product->id])}" method="POST" class="b-form">
        <fieldset class="main">
            <div class="field">
                <label for="comment_name">Ваше имя</label>
                <input type="text" id="comment_name" value="" name="comment[name]"/>
            </div>
            <div class="field">
                <label for="comment_text">Комментарий</label>
                <textarea id="comment_text" name="comment[text]" cols="30" rows="4"></textarea>
            </div>
        </fieldset>
        <fieldset class="submit">
            <input type="submit" value="Отправить" />
        </fieldset>
    </form>
</div>