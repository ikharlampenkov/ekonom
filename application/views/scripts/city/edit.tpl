<div class="page"><h1>Редактировать город</h1></div><br/>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $city->id])}" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$city->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Код города</td>
            <td class="ttovar"><input name="data[phone_code]" value="{$city->phoneCode}"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>