<article id="main-content">

<h1 class="heading">Контентные страницы</h1>


{if_allowed resource="{$controller}/add"}
    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'add'])}">добавить страницу</a>
    </div>
{/if_allowed}


<table width="100%">
{if $contentPageList}
    {foreach from=$contentPageList item=contentPage}
        <tr>
            <td class="ttovar">{$contentPage->pageTitle}</td>
            <td class="ttovar">{$contentPage->title}</td>
            <td class="tedit">
                {if_allowed resource="{$controller}/edit"}
                    <a href="{$this->url(['controller' => $controller, 'action' => 'edit', 'title' => $contentPage->pageTitle])}">редактировать</a><br/>
                {/if_allowed}
                {if_allowed resource="{$controller}/delete"}
                    <a href="{$this->url(['controller' => $controller, 'action' => 'delete', 'title' => $contentPage->pageTitle])}" onclick="return confirmDelete('{$contentPage->title}');" style="color: #830000">удалить</a>
                {/if_allowed}
            </td>
        </tr>
    {/foreach}
{/if}
</table>