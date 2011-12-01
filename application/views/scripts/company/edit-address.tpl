<div class="page"><h1>Редактировать адрес</h1></div><br/>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'editAddress', 'id' => $address->id])}" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Город</td>
            <td class="ttovar"><select name="data[city]">
                <option value="">--</option>
            {if !empty($cityList)}
                {foreach from=$cityList item=city}
                    <option value="{$city->id}" {if is_object($address->city) && $address->city->id == $city->id}selected="selected"{/if}>{$city->title}</option>
                {/foreach}
            {/if}
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Адрес</td>
            <td class="ttovar"><input name="data[address]" value="{$address->address}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Телефон</td>
            <td class="ttovar"><input name="data[phone]" value="{$address->phone}"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>