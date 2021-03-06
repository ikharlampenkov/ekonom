<article id="main-content" class="item-description shop">
    <div class="inner">

        <h1 class="heading">{$company->title} {if $company->constantDiscount != '' && $company->constantDiscount > 0}<span class="constant-discount">постоянная скидка <span class="constant-discount-red">{$company->constantDiscount}%</span>{/if}</span></h1>

        <div class="clearfix">
        {if $galleryList !== false}

            <div class="gallery-company">
                {foreach from=$galleryList item=gallery name=_gallery}
                    {if $smarty.foreach._gallery.first}
                        <div class="big-image">
                            <img src="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getName()}" width="420" height="270" alt="{$gallery->title}" data-preview="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getPreview()}"/>
                            <h5 class="title">{$gallery->title}</h5>
                            <a href="#previous" class="previous"></a>
                            <a href="#next" class="next"></a>
                        </div>

                    <ul class="previews-company clearfix">
                        {else}
                        <li>
                            <a href="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getName()}" title="{$gallery->title}">
                                <img src="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getPreview()}" alt="{$gallery->title}" class="shadow-image"/>
                            </a>
                        </li>
                    {/if}
                    {if $smarty.foreach._gallery.last}
                    </ul>
                    {/if}
                {/foreach}
            </div>
        {/if}

            <div class="information">
                <img class="shop-logo shadow-image" src="{if $company->file->getName()}/files/{$company->file->getPreview()}{else}/i/no_foto.png{/if}" alt="Логотип магазина {$company->title}"/>

                <h3>Описание</h3>

                <p>{$company->description}</p>

            {if $company->getAddressList() !== false}
                <h3>Адреса</h3>
                <ul class="addresses-list">
                    {foreach from=$company->getAddressList() item=address}
                        <li>
                            <span class="nobr">{$address->city->title}, {$address->address}</span>,<br/>
                            <span class="phone nobr">{$address->phone}</span>
                        </li>
                    {/foreach}
                </ul>
            {/if}

            {if $company->ofSite}
                <h3>Официальный сайт</h3>

                <p><a href="http://{$company->ofSite}" target="_blank">{$company->ofSite}</a></p>
            {/if}

            </div>

            <div id="share" class="clear">
                <script type="text/javascript">
                    //<!--
                    share42('/i/');
                    //-->
                </script>

                <div id="plusone">
                    <g:plusone></g:plusone>
                </div>


                <script type="text/javascript">//<!--
                window.___gcfg = { lang: 'ru' };

                (function () {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                })();
                //-->
                </script>
            </div>
        </div>
    </div>

{if $productList}
    <ul id="actions" class="clearfix shop-actions">
        {foreach from=$productList item=product}
            <li>
                <h3><a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax">{$product->shortTitle|truncate:25:"...":true}</a></h3>
                <a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax"><img src="{if $product->img->getName()}/files/{$product->img->getPreview()}{else}/i/no_foto.png{/if}" alt="{$product->shortTitle}"></a>

                {if $product->searchAttribute('discount')}
                    <div class="discount">{$product->getAttribute('discount')->value}{if $product->searchAttribute('discount_type')}{$product->getAttribute('discount_type')->value}{/if}</div>
                {/if}
            </li>
        {/foreach}
        <li>&nbsp;</li>
        <li class="empty"></li>
    </ul>

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

    <a href="javascript:history.go(-1);" class="button back">Назад</a>

</article>

<aside id="sidebar">
{if $bannerList!==false}

{*
    {foreach from=$bannerList item=banner}
        <section id="adv">
            <a href="http://{$banner->getBanner()->link}">
                <img src="/banners/{$banner->getBanner()->img->getName()}" width="187" height="357" alt="{$banner->getBanner()->title}"/>
            </a>
        </section>
    {/foreach}
    *}

    <div id="slider-wrapper-r">
        <div id="slider-r">
            <ul id="slides">
                {foreach from=$bannerList item=banner}
                    <li class="slide">
                        <a href="http://{$banner->getBanner()->link}">
                            <img src="/banners/{$banner->getBanner()->img->getName()}" alt="{$banner->getBanner()->title}">
                        </a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
        $('#slider-r').easySlider({
        auto: true,
        pause: {$topPlace->changeTime}*1000,
        continuous: true,
        controlsShow: false,
        prevId: 'previous',
        prevText: '',
        nextId: 'next',
        nextText: ''
        });
        });
    </script>
{/if}
    <br/>
{if $bannerListBottom!==false}
    <div id="slider-wrapper-rb">
        <div id="slider-rb">
            <ul id="slides-b">
                {foreach from=$bannerListBottom item=banner}
                    <li class="slide">
                        <a href="http://{$banner->getBanner()->link}">
                            <img src="/banners/{$banner->getBanner()->img->getName()}" width="187" height="357" alt="{$banner->getBanner()->title}"/>
                        </a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
        $('#slider-rb').easySlider({
        auto: true,
        pause: {$bottomPlace->changeTime}*1000,
        continuous: true,
        controlsShow: false,
        prevId: 'previous',
        prevText: '',
        nextId: 'next',
        nextText: ''
        });
        });
    </script>
{/if}
</aside>