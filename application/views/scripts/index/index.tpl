{if $bannerList!==false}
{*
<div id="slider">

    <ul id="slides">
        {foreach from=$bannerList item=banner}
            <li class="slide">
                <img src="/banners/{$banner->getBanner()->img->getName()}" alt="{$banner->getBanner()->title}">

                <p class="description"><a href="http://{$banner->getBanner()->link}">{$banner->getBanner()->title}</a></p>
            </li>
        {/foreach}
    </ul>
    <a href="#previous" class="previous"></a>
    <a href="#next" class="next"></a>

    <div id="shadow"></div>

</div>

<script type="text/javascript">
    var changeTime = {$mainPlace->changeTime};
</script>
*}
<div id="slider-wrapper">
    <div id="slider">
        <ul id="slides">
            {foreach from=$bannerList item=banner}
                <li class="slide">
                    <img src="/banners/{$banner->getBanner()->img->getName()}" alt="{$banner->getBanner()->title}">

                    <p class="description"><a href="http://{$banner->getBanner()->link}">{$banner->getBanner()->title}</a></p>
                </li>
            {/foreach}
        </ul>
    </div>
    <div id="shadow"></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    $('#slider').easySlider({
    auto: true,
    pause: {$mainPlace->changeTime}*1000,
    continuous: true,
    prevId: 'previous',
    prevText: '',
    nextId: 'next',
    nextText: ''
    });
    });
</script>
{/if}


<article id="main-content">
{if $productList !== false}

    <h1 class="heading">Акции города</h1>

    <div id="product-list-place">
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
            var updatePlusOne = function () {
            gapi.plusone.go();
            };

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

    {*
    <div id="paginator">
    <a href="/actions?page=1">&larr;</a>
    <ul class="pages-list">
    <li><a href="/actions?page=1">1</a></li>
    <li><a href="/actions?page=2" class="active">2</a></li>
    <li><a href="/actions?page=3">3</a></li>
    </ul>
    <a href="/actions?page=3">&rarr;</a>
    </div>
    *}
    </div>
{/if}

    <aside>
        <div id="banners" class="clearfix">
        {if $bannerListLeft!==false}
            {foreach from=$bannerListLeft item=banner}
                <div class="banner size490_84">
                    <a href="http://{$banner->getBanner()->link}"><img src="/banners/{$banner->getBanner()->img->getName()}"/></a>
                </div>
            {/foreach}
        {/if}
        {if $bannerListRight!==false}
            {foreach from=$bannerListRight item=banner}
                <div class="banner size490_84">
                    <a href="http://{$banner->getBanner()->link}"><img src="/banners/{$banner->getBanner()->img->getName()}"/></a>
                </div>
            {/foreach}
        {/if}

        </div>

        <div id="share">
                    <span class="share42">
                        <script type="text/javascript">
                            //<!--
                            share42('/i/');
                            //-->
                        </script>

                    {*
<a target="_blank" title="Поделиться в Facebook" class="facebook" href="#" rel="nofollow"
onclick="window.open('http://www.facebook.com/sharer.php?u=http://ekonom.pro/&amp;t=Ekonom.pro', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
</a>
<a target="_blank" title="Добавить в Twitter" class="twitter" href="#" rel="nofollow"
onclick="window.open('http://twitter.com/share?text=Ekonom.pro&amp;url=http://ekonom.pro/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
</a>
<a target="_blank" title="Поделиться В Контакте" class="vkontakte" href="#" rel="nofollow"
onclick="window.open('http://vkontakte.ru/share.php?url=http://ekonom.pro/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
</a>
*}
                    </span>

            <div id="plusone">
                <g:plusone></g:plusone>
            </div>
            <script type="text/javascript">
                plusone();
            </script>
        </div>
    </aside>
</article>