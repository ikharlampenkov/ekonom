<article id="main-content">

<h1 class="heading">Редактировать комментарий</h1>

<form action="{$this->url(['controller' => $controller,'action' => 'editComments', 'idProduct' => $product->id, 'id' => $comment->id, 'rubric' => $cur_rubric->getId()])}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Пользователь</td>
            <td class="ttovar"><input name="data[name]" value="{$comment->user}"/></td>
        </tr>
        <tr>
            <td class="ttovar">Сообщение</td>
            <td class="ttovar"><textarea name="data[text]">{$comment->message}</textarea></td>
        </tr>
        <tr>
            <td class="ttovar">Модерация</td>
            <td class="ttovar"><input type="checkbox" name="data[is_moderate]" style="width: 14px;" {if $comment->isModerate}checked="checked" {/if}></textarea></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

</article>