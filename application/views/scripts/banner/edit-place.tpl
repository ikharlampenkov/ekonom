<h1 class="heading">Редактировать площадку</h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'editPlace', 'id' => $place->id])}" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$place->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Ширина</td>
            <td class="ttovar"><input name="data[width]" value="{$place->width}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Высота</td>
            <td class="ttovar"><input name="data[height]" value="{$place->height}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Время между сменой баннеров</td>
            <td class="ttovar"><input name="data[change_time]" value="{$place->changeTime}"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>