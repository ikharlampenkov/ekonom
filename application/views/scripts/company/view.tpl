<article id="main-content" class="item-description shop">
    <div class="inner">

        <h1 class="heading">{$company->title}</h1>

        <div class="clearfix">
        {if $galleryList !== false}



            <div class="gallery">
                {foreach from=$galleryList item=gallery name=_gallery}
                    {if $smarty.foreach._gallery.first}
                        <div class="big-image">
                            <img src="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getName()}" width="420" height="270" alt="{$gallery->title}" data-preview="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getPreview()}"/>
                            <h5 class="title">{$gallery->title}</h5>
                            <a href="#previous" class="previous"></a>
                            <a href="#next" class="next"></a>
                        </div>

                    <ul class="previews clearfix">
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
                <img class="shop-logo shadow-image" src="/files/{$company->file->getName()}" alt="Логотип магазина {$company->title}"/>

                <h3>Краткое описание магазина или товара</h3>

                <p>{$company->description}</p>

            {if $company->getAddressList() !== false}
                <h3>Адреса магазинов</h3>
                <ul class="addresses-list">
                    {foreach from=$company->getAddressList() item=address}
                        <li>
                            <span class="nobr">{$address->city->title}, {$address->address}</span>,<br/>
                            <span class="phone nobr">+7 {$address->phone}</span>
                        </li>
                    {/foreach}
                </ul>
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

    <ul id="actions" class="clearfix shop-actions">
        <li>
            <h3><a href="/item.html" class="various fancybox.ajax">Телефон LG Prada</a></h3>
            <a href="/item.html" class="various fancybox.ajax"><img src="/uploads/action1.png" alt=""></a>

            <div class="discount">20%</div>
        </li>
        <li>
            <h3><a href="/item.html" class="various fancybox.ajax">Суперджинсы</a></h3>
            <a href="/item.html" class="various fancybox.ajax"><img src="/uploads/action2.jpg" alt=""></a>

            <div class="discount">21%</div>
        </li>
        <li>
            <h3><a href="/item.html" class="various fancybox.ajax">Башмаки со скидкой</a></h3>
            <a href="/item.html" class="various fancybox.ajax"><img src="/uploads/action3.jpg" alt=""></a>

            <div class="discount">73%</div>
        </li>
        <li>
            <h3><a href="/item.html" class="various fancybox.ajax">Телефон LG Prada</a></h3>
            <a href="/item.html" class="various fancybox.ajax"><img src="/uploads/action1.png" alt=""></a>

            <div class="discount">20%</div>
        </li>
        <li>
            <h3><a href="/item.html" class="various fancybox.ajax">Суперджинсы</a></h3>
            <a href="/item.html" class="various fancybox.ajax"><img src="/uploads/action2.jpg" alt=""></a>

            <div class="discount">21%</div>
        </li>
        <li>
            <h3><a href="/item.html" class="various fancybox.ajax">Башмаки со скидкой</a></h3>
            <a href="/item.html" class="various fancybox.ajax"><img src="/uploads/action3.jpg" alt=""></a>

            <div class="discount">73%</div>
        </li>
        <li class="empty"></li>
    </ul>

    <div id="paginator">
        <a href="/actions?page=1">&larr;</a>
        <ul class="pages-list">
            <li><a href="/actions?page=1">1</a></li>
            <li><a href="/actions?page=2" class="active">2</a></li>
            <li><a href="/actions?page=3">3</a></li>
        </ul>
        <a href="/actions?page=3">&rarr;</a>
    </div>

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

    <a href="javascript:history.go(-1);" class="button back">Назад</a>

</article>

<aside id="sidebar">
    <section id="adv">
        <a href="http://yandex.ru">
            <img src="/uploads/banner.jpg" width="187" height="357"/>
        </a>
    </section>
</aside>

