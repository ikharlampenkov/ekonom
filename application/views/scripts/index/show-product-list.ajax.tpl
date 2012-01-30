<ul id="actions" class="clearfix">
{foreach from=$productList item=product}
    {if $authUserRole!='companyadmin' || ($authUserRole=='companyadmin' && $product->company->getId()==$curCompany)}
        <li>
            <h3><a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax">{$product->shortTitle}</a></h3>
            <a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax"><img src="{if $product->img->getName()}/files/{$product->img->getPreview()}{else}/i/no_foto.png{/if}" alt="{$product->shortTitle}"></a>

            <div class="discount">{if $product->searchAttribute('discount')}{$product->getAttribute('discount')->value}{/if}{if $product->searchAttribute('discount_type')}{$product->getAttribute('discount_type')->value}{/if}</div>

            {if_allowed resource="catalog/edit"}
                <ul id="company_action_{$product->id}" class="company_action_menu">
                    {if_allowed resource="catalog/viewGallery"}
                        <li class="action"><a href="{$this->url(['controller' => 'catalog','action' => 'viewGallery', 'idProduct' => $product->id, 'rubric' => $product->getRubric()->getId()])}">галерея</a></li>
                    {/if_allowed}
                    {if_allowed resource="catalog/viewComments"}
                        <li class="action"><a href="{$this->url(['controller' => 'catalog','action' => 'viewComments', 'idProduct' => $product->id, 'rubric' => $product->getRubric()->getId()])}">комментарии</a></li>
                    {/if_allowed}
                    {if_allowed resource="catalog/edit"}
                        <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="{$this->url(['controller' => 'catalog','action' => 'edit', 'id' => $product->getId(), 'rubric' => $product->getRubric()->getId()])}">редактировать</a></li>
                    {/if_allowed}
                    {if_allowed resource="catalog/delete"}
                        <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="{$this->url(['controller' => 'catalog','action' => 'delete', 'id' => $product->getId(), 'rubric' => $product->getRubric()->getId()])}" onclick="return confirmDelete('{$product->title}');" style="color: #830000">удалить</a></li>
                    {/if_allowed}
                </ul>
            {/if_allowed}

        </li>
    {/if}
{/foreach}
</ul>


<script type="text/javascript">
    $(document).ready(function () {
    $(".various").fancybox({
    maxWidth    : 800,
    maxHeight    : 600,
    fitToView    : false,
    width        : 800,
    autoSize    : false,
    closeClick    : false,
    openEffect    : 'none',
    closeEffect    : 'none',
    padding: 0,
    scrolling: 'no',
    afterShow: updatePlusOne,
    afterShow: function () {
    $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
    }
    });
    });
</script>

{if $pagerCount>1}
<div id="paginator">
    <ul class="pages-list">
        {section name="_pager" loop=$pagerCount start=1}
            <li><a href="/index/showProductList/pager/{$smarty.section._pager.iteration-1}/" {if $smarty.section._pager.iteration-1==$curPager}class="active"{/if}>{$smarty.section._pager.iteration}</a></li>
        {/section}
    </ul>
</div>
{/if}