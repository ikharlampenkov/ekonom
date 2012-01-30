<h1 class="heading">Города</h1>


<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="4"><a href="{$this->url(['controller' => $controller,'action' => 'add'])}">добавить</a></td>
    </tr>

{if $cityList!==false}
    {foreach from=$cityList item=city}
        <tr>
            <td class="ttovar">{$city->title}</td>
            <td class="ttovar">{$city->phoneCode}</td>
            <td class="ttovar">{$city->phoneNumber}</td>
            <td class="tedit">
                {if_allowed resource="{$controller}/showAcl"}
                <a href="{$this->url(['controller' => $controller,'action' => 'showAcl', 'idCity' => $city->id])}">права</a>
                {/if_allowed}
                <a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $city->id])}">редактировать</a><br/>
                <a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $city->id])}" onclick="return confirmDelete('{$city->id}');" style="color: #830000">удалить</a></td>
        </tr>
    {/foreach}
{/if}

</table>