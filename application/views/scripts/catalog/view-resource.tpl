{if_allowed resource="{$controller}/index" priv="show-resource"}
<h1 class="heading">Ресурсы</h1>

<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3">
            <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'addResource'])}">добавить</a></td>
    </tr>

{if $userResourceList!==false}
    {foreach from=$userResourceList item=resource}
        <tr>
            <td class="ttovar">{$resource->rtitle}</td>
            <td class="ttovar">{$resource->title}</td>
            <td class="tedit">
                <img src="/i/edit.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'editResource', 'id' => $resource->id])}">редактировать</a><br/>
                <img src="/i/delete.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'deleteResource', 'id' => $resource->id])}" onclick="return confirmDelete('{$resource->rtitle}');" style="color: #830000">удалить</a></td>
        </tr>
    {/foreach}
{/if}

</table>
{/if_allowed}