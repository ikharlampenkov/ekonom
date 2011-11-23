<div class="page"><h1>Города</h1></div><br/>


<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3"><a href="{$this->url(['controller' => $controller,'action' => 'add'])}">добавить</a></td>
    </tr>

{if $cityList!==false}
    {foreach from=$cityList item=city}
        <tr>
            <td class="ttovar">{$city->title}</td>
            <td class="ttovar">{$city->phoneCode}</td>
            <td class="tedit"><a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $city->id])}">редактировать</a><br/>
                <a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $city->id])}" onclick="return confirmDelete('{$city->id}');" style="color: #830000">удалить</a></td>
        </tr>
    {/foreach}
{/if}

</table>