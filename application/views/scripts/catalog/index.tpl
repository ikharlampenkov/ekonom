<div class="page"><h1>Каталог</h1></div><br/>


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
            <tr><td colspan="3" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
                <a href="{$this->url(['controller' => $controller, 'action' => 'addRubric', 'rubric' => $cur_rubric->getId()])}">добавить рубрику</a>
            </td></tr>
            {foreach from=$rubric_list item=rubric}
                <tr>
                    <td class="ttovar" valign="middle"><a href="{$this->url(['controller' => $controller, 'action' => 'index', 'rubric' => $rubric->getId()])}" class="rmenu">{$rubric->title}</a>
                    <td class="tedit"  valign="middle">
                        <a href="{$this->url(['controller' => $controller, 'action' => 'editRubric', 'id' => $rubric->getId(), 'rubric' => $cur_rubric->getId()])}">редактировать</a><br/>
                        <a href="{$this->url(['controller' => $controller, 'action' => 'deleteRubric', 'id' => $rubric->getId(), 'rubric' => $cur_rubric->getId()])}" onclick="return confirmDelete('{$rubric->title}');" style="color:#830000">удалить</a>
                    </td>
                </tr>
            {/foreach}
        </table>
    {/if}



    <table width="100%">
        <tr>
            <td colspan="5" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
            <a href="{$this->url(['controller' => $controller,'action' => 'add', 'rubric' => $cur_rubric->getId()])}">добавить товар</a>
        </td>
        </tr>
        {if $product_list}
            {foreach from=$product_list item=product}
                <tr>
                    <td class="ttovar" >{if $product->img->getName()}<img src="/files/{$product->img->getPreview()}" />{else}&nbsp;{/if}</td>
                    <td class="ttovar" >{$product->title}</td>
                    <td class="ttovar" >{$product->shortText}</td>
                    <td class="ttovar" >{$product->price}</td>
                    <td class="tedit" >
                        <a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $product->getId(), 'rubric' => $cur_rubric->getId()])}">редактировать</a><br />
                        <a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $product->getId(), 'rubric' => $cur_rubric->getId()])}" onclick="return confirmDelete('{$product->title}');" style="color: #830000">удалить</a>
                    </td>
                </tr>
            {/foreach}
        {/if}
    </table>