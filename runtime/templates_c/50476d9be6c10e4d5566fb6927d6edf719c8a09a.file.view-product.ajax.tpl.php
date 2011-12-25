<?php /* Smarty version Smarty-3.0.9, created on 2011-12-26 00:25:47
         compiled from "F:\www\ekonom\application/views/scripts\catalog/view-product.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155924ef75c9ba59556-82268560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50476d9be6c10e4d5566fb6927d6edf719c8a09a' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/view-product.ajax.tpl',
      1 => 1324833941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155924ef75c9ba59556-82268560',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Этот блок должен отдаваться аяксом при нажатии на акцию -->
<div id="item" class="item-description">
    <h1 class="heading"><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</h1>

    <div class="inner">
        <div class="clearfix">
            <article class="information">
                <section class="naming">
                    <h3><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</h3>

                    <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('terms_of_stock')){?>
                    <p><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('terms_of_stock')->value;?>
</p>
                    <?php }?>
                </section>

                <section class="description">
                    <h3>Краткое описание магазина или товара</h3>

                    <p>Prada – всемирно известный Дом Моды, выпускающий коллекции модной одежды и аксессуаров.</p>
                </section>

                <section class="discount clearfix">
                    <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount')){?>
                        <h5>Скидка: <?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount')->value;?>
</h5>
                    <?php }?>
                    <del class="old-price"><?php echo $_smarty_tpl->getVariable('product')->value->price;?>
 р</del>
                    <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('second_price')){?>
                    <ins class="new-price"><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('second_price')->value;?>
 р</ins>
                    <?php }?>
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
                <div class="gallery">
                    <div class="big-image">
                        <img src="/uploads/gallery.jpg" width="420" height="270" alt="Комментарий к первому фото" data-preview="/uploads/gallery_preview.jpg" />
                        <h5 class="title">Комментарий к первому фото</h5>
                        <a href="#previous" class="previous"></a>
                        <a href="#next" class="next"></a>
                    </div>

                    <ul class="previews clearfix">
                        <li>
                            <a href="/uploads/gallery1.jpg" title="Комментарий ко второму фото">
                                <img src="/uploads/gallery1_preview.jpg" alt="Превью второго фото" class="shadow-image"/>
                            </a>
                        </li>
                        <li>
                            <a href="/uploads/gallery2.jpg" title="Комментарий ко второму фото">
                                <img src="/uploads/gallery2_preview.jpg" alt="Превью второго фото" class="shadow-image"/>
                            </a>
                        </li>
                        <li>
                            <a href="/uploads/gallery3.jpg" title="Комментарий ко второму фото">
                                <img src="/uploads/gallery3_preview.jpg" alt="Превью второго фото" class="shadow-image"/>
                            </a>
                        </li>
                    </ul>
                </div>

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