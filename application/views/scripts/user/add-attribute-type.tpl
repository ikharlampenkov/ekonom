<h1 class="heading">Добавить тип атрибута</h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'addAttributeType'])}" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$type->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Описание</td>
            <td class="ttovar"><input name="data[description]" value="{$type->description}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Обработчик</td>
            <td class="ttovar"><input name="data[handler]" value="{$type->handler}"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>