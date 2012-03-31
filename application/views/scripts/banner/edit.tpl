<h1 class="heading">Редактировать баннер</h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $banner->id])}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$banner->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Город</td>
            <td class="ttovar"><select name="data[city_id]">
            {if !empty($cityList)}
                {foreach from=$cityList item=city}
                    <option value="{$city->id}" {if $banner->city->id == $city->id}selected="selected"{/if}>{$city->title}</option>
                {/foreach}
            {/if}
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar">Мультигород</td>
            <td class="ttovar"><input type="checkbox" style="width: 14px;" name="data[multi_city]" {if $banner->multiCity}checked="checked"{/if}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Ссылка</td>
            <td class="ttovar"><input name="data[link]" value="{$banner->link}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Файл</td>
            <td class="ttovar">{if $banner->img->getName()}<img src="/banners/{$banner->img->getName()}"/>{/if}<br/>
                <input type="file" name="img"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>