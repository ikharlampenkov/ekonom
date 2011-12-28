<h1 class="heading">Размещение баннеров. Площадка {$place->title} <a href="{$this->url(['controller' => $controller, 'action'=> 'viewPlace'])}">Все Площадки</a></h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller, 'action' => 'placemark', 'idPlace' => $place->id])}" method="post">
<table width="100%">
   <tr>
       <td class="ttovar_title">Пользователь</td>
       <td class="ttovar" style="width: 90px;">Разместить</td>
       <td class="ttovar"></td>
   </tr>

{if $bannerList!==false}
    {foreach from=$bannerList item=banner}
        <tr>
            <td class="ttovar_title">{$banner->title}</td>
            <td class="ttovar"><input type="checkbox" name="data[{$banner->id}][place]" {if isset($placeAcl[{$banner->id}])}checked="checked"{/if} /></td>
            <td class="ttovar"></td>
        </tr>
    {/foreach}
{/if}

</table>
        <input id="save" name="save" type="submit" value="Сохранить"/>
</form>