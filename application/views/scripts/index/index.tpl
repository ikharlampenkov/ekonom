{if $bannerList!==false}
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
{/if}


<article id="main-content">
{if $productList !== false}
    <h1 class="heading">Акции города</h1>

    <ul id="actions" class="clearfix">
        {foreach from=$productList item=product}
            <li>
                <h3><a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax">{$product->title}</a></h3>
                <a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax"><img src="{if $product->img->getName()}/files/{$product->img->getPreview()}{else}/i/no_foto.png{/if}" alt="{$product->title}"></a>

                {if $product->searchAttribute('discount')}
                    <div class="discount">{$product->getAttribute('discount')->value}{if $product->searchAttribute('discount_type')}{$product->getAttribute('discount_type')->value}{/if}</div>
                {/if}
            </li>
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
        afterShow: updatePlusOne
        });
        });
    </script>

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
                        <a target="_blank" title="Поделиться в Facebook" class="facebook" href="#" rel="nofollow"
                           onclick="window.open('http://www.facebook.com/sharer.php?u=http://ekonom.pro/&amp;t=Ekonom.pro', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Добавить в Twitter" class="twitter" href="#" rel="nofollow"
                           onclick="window.open('http://twitter.com/share?text=Ekonom.pro&amp;url=http://ekonom.pro/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Поделиться В Контакте" class="vkontakte" href="#" rel="nofollow"
                           onclick="window.open('http://vkontakte.ru/share.php?url=http://ekonom.pro/', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
                        </a>
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