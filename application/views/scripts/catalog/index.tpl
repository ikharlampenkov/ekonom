<h1 class="heading">Каталог</h1>


{if $path}
<div>
    {foreach from=$path item=prub name=_prub}
        <a href="{$this->url(['controller' => $controller,'action' => 'index', 'rubric' => $prub->getId()])}">{if !$prub->isRoot}{$prub->title}{else}<< Назад{/if}</a> {if !$smarty.foreach._prub.last}/{/if}
    {/foreach}
</div>
{/if}

{if !$cur_rubric->isRoot}
<h1>{$cur_rubric->title}</h1>
{/if}

{if $rubric_list}

<table width="100%">
    {if_allowed resource="{$controller}/addRubric"}
        <tr>
            <td colspan="3" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
                <a href="{$this->url(['controller' => $controller, 'action' => 'addRubric', 'rubric' => $cur_rubric->getId()])}">добавить рубрику</a>
            </td>
        </tr>
    {/if_allowed}
    {foreach from=$rubric_list item=rubric}
        <tr>
            <td class="ttovar" valign="middle"><a href="{$this->url(['controller' => $controller, 'action' => 'index', 'rubric' => $rubric->getId()])}" class="rmenu">{$rubric->title}</a>
            <td class="tedit" valign="middle">
                {if_allowed resource="{$controller}/editRubric"}
                    <a href="{$this->url(['controller' => $controller, 'action' => 'editRubric', 'id' => $rubric->getId(), 'rubric' => $cur_rubric->getId()])}">редактировать</a><br/>
                {/if_allowed}
                {if_allowed resource="{$controller}/deleteRubric"}
                    <a href="{$this->url(['controller' => $controller, 'action' => 'deleteRubric', 'id' => $rubric->getId(), 'rubric' => $cur_rubric->getId()])}" onclick="return confirmDelete('{$rubric->title}');" style="color:#830000">удалить</a>
                {/if_allowed}
            </td>
        </tr>
    {/foreach}
</table>
{/if}



<table width="100%">
{if_allowed resource="{$controller}/add"}
    <tr>
        <td colspan="5" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
            <a href="{$this->url(['controller' => $controller,'action' => 'add', 'rubric' => $cur_rubric->getId()])}">добавить товар</a>
        </td>
    </tr>
{/if_allowed}
{if $product_list}
    {foreach from=$product_list item=product}
        <tr>
            <td class="ttovar">{if $product->img->getName()}<img src="/files/{$product->img->getPreview()}"/>{else}&nbsp;{/if}</td>
            <td class="ttovar">{$product->title}</td>
            <td class="ttovar">{$product->shortText}</td>
            <td class="ttovar">{$product->price}</td>
            <td class="tedit">
                {if_allowed resource="{$controller}/edit"}
                    <a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $product->getId(), 'rubric' => $cur_rubric->getId()])}">редактировать</a><br/>
                {/if_allowed}
                {if_allowed resource="{$controller}/delete"}
                    <a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $product->getId(), 'rubric' => $cur_rubric->getId()])}" onclick="return confirmDelete('{$product->title}');" style="color: #830000">удалить</a>
                {/if_allowed}
            </td>
        </tr>
    {/foreach}
{/if}
</table>

{if_allowed resource="{$controller}/index" priv="show-attribute-hash"}
<br/>
<h1 class="heading">Список аттрибутов для товара</h1>

<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="4"><a href="{$this->url(['controller' => $controller,'action' => 'addAttributeHash'])}">добавить</a></td>
    </tr>

    {if $attributeHashList!==false}
        {foreach from=$attributeHashList item=attributeHash}
            <tr>
                <td class="ttovar">{$attributeHash->attributeKey}</td>
                <td class="ttovar">{$attributeHash->title}</td>
                <td class="ttovar">{$attributeHash->type->title}</td>
                <td class="tedit">
                    <a href="{$this->url(['controller' => $controller,'action' => 'editAttributeHash', 'key' => $attributeHash->attributeKey])}">редактировать</a><br/>
                    <a href="{$this->url(['controller' => $controller,'action' => 'deleteAttributeHash', 'key' => $attributeHash->attributeKey])}" onclick="return confirmDelete('{$attributeHash->attributeKey}');" style="color: #830000">удалить</a>
                </td>
            </tr>
        {/foreach}
    {/if}

</table>
{/if_allowed}

{if_allowed resource="{$controller}/index" priv="show-attribute-type"}
<br/>
<h1 class="heading">Типы аттрибутов</h1>

<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3"><a href="{$this->url(['controller' => $controller,'action' => 'addAttributeType'])}">добавить</a></td>
    </tr>

    {if $attributeTypeList!==false}
        {foreach from=$attributeTypeList item=attributeType}
            <tr>
                <td class="ttovar">{$attributeType->title}</td>
                <td class="ttovar">{$attributeType->handler}</td>
                <td class="tedit">
                    <a href="{$this->url(['controller' => $controller,'action' => 'editAttributeType', 'id' => $attributeType->id])}">редактировать</a><br/>
                    <a href="{$this->url(['controller' => $controller,'action' => 'deleteAttributeType', 'id' => $attributeType->id])}" onclick="return confirmDelete('{$attributeType->id}');" style="color: #830000">удалить</a>
                </td>
            </tr>
        {/foreach}
    {/if}

</table>
{/if_allowed}