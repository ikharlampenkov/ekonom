<!-- Этот блок должен отдаваться аяксом при нажатии на акцию -->
<div id="item" class="item-description">
    <h1 class="heading">{$product->title}</h1>

    <div class="inner">
        <div class="clearfix">
            <article class="information">
                <section class="naming">
                    <h3>{$product->title}</h3>

                {if $product->searchAttribute('terms_of_stock')}
                    <p>{$product->getAttribute('terms_of_stock')->value}</p>
                {/if}
                </section>

                <section class="description">
                    <h3>Краткое описание магазина или товара</h3>

                    <p>Prada – всемирно известный Дом Моды, выпускающий коллекции модной одежды и аксессуаров.</p>
                </section>

                <section class="discount clearfix">
                {if $product->searchAttribute('discount')}
                    <h5>Скидка: {$product->getAttribute('discount')->value}</h5>
                {/if}
                    <del class="old-price">{$product->price} р</del>
                {if $product->searchAttribute('second_price')}
                    <ins class="new-price">{$product->getAttribute('second_price')->value} р</ins>
                {/if}
                </section>

                <section class="comments">
                    <h3>Комментарии</h3>
                    <ul class="comments-list">
                        <li>
                            <article class="comment">
                                <header>Я</header>
                                <div class="content">
                                    Отличные часы! Только жутко дорого, ага.
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="comment">
                                <header>Вася Пупкин</header>
                                <div class="content">
                                    Да ну нафиг! За такие смешные деньги не бывает швейцарских часов.
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="comment">
                                <header>Блондинко</header>
                                <div class="content">
                                    А мне нравятся парни со стильными часами:)
                                </div>
                            </article>
                        </li>
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
                </section>
            </article>

            <aside class="addons">
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

                <a href="/reserve.html" class="button reserve">Отложить</a>
                <a href="/share.html" class="button share-with-friend">Поделиться</a>
            </aside>

        </div>

        <div class="controls">
            <div class="clearfix">
                <span class="share42">
                        <a target="_blank" title="Поделиться в Facebook" class="facebook" href="#" rel="nofollow"
                           onclick="window.open('http://www.facebook.com/sharer.php?u={ url }&amp;t={ title }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Добавить в Twitter" class="twitter" href="#" rel="nofollow"
                           onclick="window.open('http://twitter.com/share?text={ title }&amp;url={ url }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Поделиться В Контакте" class="vkontakte" href="#" rel="nofollow"
                           onclick="window.open('http://vkontakte.ru/share.php?url={ url }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
                        </a>
                    </span>

                <div id="plusone">
                    <g:plusone></g:plusone>
                </div>

                <a href="/add-comment.html" class="button add-comment">Комментировать</a>
            </div>
        </div>

        <!-- this block is expected by ajax-form.js -->
        <div id="form-placeholder">

        </div>
    </div>
</div>