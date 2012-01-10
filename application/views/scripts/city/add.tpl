<h1 class="heading">Добавить город</h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'add'])}" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$city->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Код города</td>
            <td class="ttovar"><input name="data[phone_code]" value="{$city->phoneCode}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Телефон</td>
            <td class="ttovar"><input name="data[phone_number]" value="{$city->phoneNumber}"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>