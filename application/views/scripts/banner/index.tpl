<article id="main-content">


    <h1 class="heading">Баннеры</h1>

    <div class="page_block">
    {if_allowed resource="{$controller}/index" priv="show-place"}
        <a href="{$this->url(['controller' => $controller, 'action' => 'viewPlace'])}">Площадки</a>
    {/if_allowed}
    </div>
    <br/>

{if_allowed resource="{$controller}/add"}
    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller, 'action' => 'add'])}">добавить баннер</a>
    </div>
{/if_allowed}

    <table width="100%">

    {if $bannerList!==false}
        {foreach from=$bannerList item=banner}
            <tr>
                <td class="ttovar">{if $banner->img->getName()}<img src="/banners/{$banner->img->getPreview()}"/>{/if}</td>
                <td class="ttovar">{$banner->title}</td>
                <td class="ttovar">{$banner->link}</td>
                <td class="ttovar">{$banner->city->title}</td>
                <td class="tedit">
                    {if_allowed resource="{$controller}/edit"}
                        <a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $banner->id])}">редактировать</a><br/>
                    {/if_allowed}
                    {if_allowed resource="{$controller}/delete"}
                        <a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $banner->id])}" onclick="return confirmDelete('{$banner->title}');" style="color: #830000">удалить</a>
                    {/if_allowed}
                </td>

            </tr>
        {/foreach}
    {/if}

    </table>

</article>