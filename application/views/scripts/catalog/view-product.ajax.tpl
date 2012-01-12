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

                    <p>{$product->fullText}</p>
                </section>

                <section class="discount clearfix">
                {if $product->searchAttribute('discount')}
                    <h5>Скидка: <span class="constant-discount-red">{$product->getAttribute('discount')->value}{if $product->searchAttribute('discount_type')}{$product->getAttribute('discount_type')->value}{/if}</span></h5>
                {/if}
                    <del class="old-price">{$product->price} р</del>
                {if $product->searchAttribute('second_price')}
                    <ins class="new-price">{$product->getAttribute('second_price')->value}&nbsp;р</ins>
                {/if}
                </section>

            {if $commentsList !== false}
                <section class="comments">
                    <h3>Комментарии</h3>
                    <ul class="comments-list">
                        {foreach from=$commentsList item=comment}
                            <li>
                                <article class="comment">
                                    <header>{$comment->user}</header>
                                    <div class="content">
                                        {$comment->message}
                                    </div>
                                </article>
                            </li>
                        {/foreach}
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
                </section>
            {/if}
            </article>

            <aside class="addons">
            {if $galleryList !== false}
                <div class="gallery">
                    {foreach from=$galleryList item=gallery name=_gallery}
                        {if $smarty.foreach._gallery.first}
                            <div class="big-image">
                                <a href='/gallery{$gallery->file->getSubPath()}/{$gallery->file->getName()}' class='cloud-zoom' id='zoom1' rel="position: inside">
                                    <img src="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getName()}" width="420" height="270" alt="{$gallery->title}" data-preview="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getPreview()}"/>
                                </a>
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
            {*
                <script type="text/javascript" language="javascript" src="/js/cloud-zoom.1.0.2.min.js"></script>
                *}
            {/if}

                <a href="{$this->url(['controller' => $controller,'action' => 'reserve', 'idProduct' => $product->id])}" class="button reserve">Отложить</a>
                <a href="{$this->url(['controller' => $controller,'action' => 'share', 'idProduct' => $product->id])}" class="button share-with-friend">Поделиться</a>

                <div class="product-like">Нравиться? <a href="{$this->url(['controller' => $controller,'action' => 'addLike', 'idProduct' => $product->id, 'like' => 1, 'unlike' => 0])}" class="like">Да</a> {if is_object($productLike)}{$productLike->like}{/if} / <a href="{$this->url(['controller' => $controller,'action' => 'addLike', 'idProduct' => $product->id, 'like' => 0, 'unlike' => 1])}" class="unlike">Нет</a> {if is_object($productLike)}{$productLike->unlike}{/if}</div>
            </aside>
        </div>


        <div class="controls">
            <div class="clearfix">
                <span class="share42">
                    <a target="_blank" title="Поделиться в Facebook" class="facebook" href="#" rel="nofollow"
                       onclick="window.open('http://www.facebook.com/sharer.php?u={$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}&amp;t={$product->title}', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                    </a>
                    <a target="_blank" title="Поделиться в Моем Мире@Mail.Ru" class="mail-ru" href="#" rel="nofollow"
                       onclick="window.open('http://connect.mail.ru/share?url={$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}&amp;title={$product->title}', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
                    </a>
                    <a target="_blank" title="Добавить в Одноклассники" class="odnoklassniki" href="#" rel="nofollow"
                       onclick="window.open('http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st._surl={$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}&amp;title={$product->title}', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
                    </a>
                    <a target="_blank" title="Добавить в Twitter" class="twitter" href="#" rel="nofollow"
                       onclick="window.open('http://twitter.com/share?text={$product->title}&amp;url={$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                    </a>
                    <a target="_blank" title="Поделиться В Контакте" class="vkontakte" href="#" rel="nofollow"
                       onclick="window.open('http://vkontakte.ru/share.php?url={$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
                    </a>
                    </span>

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
            {*
                            <script type="text/javascript">
                                plusone();
                            </script>
            *}

                <a href="{$this->url(['controller' => $controller,'action' => 'addComments', 'idProduct' => $product->id])}" class="button add-comment">Комментировать</a>
            </div>
        </div>

        <!-- this block is expected by ajax-form.js -->
        <div id="form-placeholder">

        </div>

    </div>
</div>