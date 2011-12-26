<article id="main-content">

    <h1 class="heading">Каталог</h1>

    <div class="page_block">
    {if_allowed resource="{$controller}/index" priv="show-attribute-hash"}
        <a href="{$this->url(['controller' => $controller, 'action' => 'viewHash'])}">Список атрибутов</a>
    {/if_allowed}

    {if_allowed resource="{$controller}/index" priv="show-attribute-type"}
        <a href="{$this->url(['controller' => $controller, 'action' => 'viewAttributeType'])}">Типы атрибутов</a>
    {/if_allowed}
    </div>
    <br/>


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


{if_allowed resource="{$controller}/addRubric"}
    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller, 'action' => 'addRubric', 'rubric' => $cur_rubric->getId()])}">добавить рубрику</a>
    </div>
{/if_allowed}

{if $rubric_list}
    <table width="100%">
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


{if_allowed resource="{$controller}/add"}
    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'add', 'rubric' => $cur_rubric->getId()])}">добавить товар</a>
    </div>
{/if_allowed}

    <table width="100%">
    {if $product_list}
        {foreach from=$product_list item=product}
            <tr>
                <td class="ttovar">{if $product->img->getName()}<img src="/files/{$product->img->getPreview()}"/>{else}&nbsp;{/if}</td>
                <td class="ttovar">{$product->title}</td>
                <td class="ttovar">{$product->shortText}</td>
                <td class="ttovar">{$product->price}</td>
                <td class="tedit">
                    {if_allowed resource="{$controller}/viewGallery"}
                        <li class="action"><a href="{$this->url(['controller' => $controller,'action' => 'viewGallery', 'idProduct' => $product->id, 'rubric' => $cur_rubric->getId()])}">галерея</a></li>
                    {/if_allowed}

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

</article>