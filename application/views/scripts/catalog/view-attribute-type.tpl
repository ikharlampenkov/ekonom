{if_allowed resource="{$controller}/index" priv="show-attribute-type"}
<h1 class="heading">Типы атрибутов</h1>

<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3">
            <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'addAttributeType'])}">добавить</a></td>
    </tr>

{if $attributeTypeList!==false}
    {foreach from=$attributeTypeList item=attributeType}
        <tr>
            <td class="ttovar">{$attributeType->title}</td>
            <td class="ttovar">{$attributeType->handler}</td>
            <td class="tedit">
                <img src="/i/edit.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'editAttributeType', 'id' => $attributeType->id])}">редактировать</a><br/>
                <img src="/i/delete.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'deleteAttributeType', 'id' => $attributeType->id])}" onclick="return confirmDelete('{$attributeType->title}');" style="color: #830000">удалить</a>
            </td>
        </tr>
    {/foreach}
{/if}

</table>
{/if_allowed}