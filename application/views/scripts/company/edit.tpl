<h1 class="heading">Редактировать компанию</h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $company->id])}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$company->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Город</td>
            <td class="ttovar"><select name="data[city_id]">
                <option value="">--</option>
            {if !empty($cityList)}
                {foreach from=$cityList item=city}
                    <option value="{$city->id}" {if $company->city->id == $city->id}selected="selected"{/if}>{$city->title}</option>
                {/foreach}
            {/if}
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Описание</td>
            <td class="ttovar"><textarea name="data[description]">{$company->description}</textarea></td>
        </tr>
        <tr>
            <td class="ttovar_title">Лого</td>
            <td class="ttovar">
            {if $company->file->getName()}<img src="/files/{$company->file->getName()}"/>{/if}<br/>
                <input type="file" name="file"/>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Email для заказов</td>
            <td class="ttovar"><input name="data[order_email]" value="{$company->orderEmail}"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>