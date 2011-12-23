<?php /* Smarty version Smarty-3.0.9, created on 2011-12-23 22:04:23
         compiled from "F:\www\ekonom\application/views/scripts\index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:122054ef498776ced41-74590526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94b43447258ea62d6154766d1bbba1c4afdc3e80' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\index/index.tpl',
      1 => 1324652660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122054ef498776ced41-74590526',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="slider">

    <ul id="slides">
        <li class="slide">
            <img src="/uploads/slide1.jpg" alt="Слайд №2">

            <p class="description"><a href="http://yandex.ru">Абонемент на 1 занятие в неделю в спорткомплексе Олимпийский</a>.</p>
        </li>
        <li class="slide">
            <img src="/uploads/slide1.jpg" alt="Слайд №1">

            <p class="description"><a href="http://google.ru">Абонемент на 2 занятие в неделю в спорткомплексе Олимпийский</a>.</p>
        </li>
    </ul>
    <a href="#previous" class="previous"></a>
    <a href="#next" class="next"></a>

    <div id="shadow"></div>
</div>


<article id="main-content">
    <h1 class="heading">Акции города</h1>

    <ul id="actions" class="clearfix">
        <li>
            <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'actions','action'=>'view','id'=>'1'));?>
" class="various fancybox.ajax">Телефон LG Prada</a></h3>
            <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'actions','action'=>'view','id'=>'1'));?>
" class="various fancybox.ajax"><img src="/uploads/action1.png" alt=""></a>

            <div class="discount">20%</div>
        </li>
        <li>
            <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'actions','action'=>'view','id'=>'1'));?>
" class="various fancybox.ajax">Суперджинсы</a></h3>
            <img src="/uploads/action2.jpg" alt="">

            <div class="discount">21%</div>
        </li>
        <li>
            <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'actions','action'=>'view','id'=>'1'));?>
" class="various fancybox.ajax">Башмаки со скидкой</a></h3>
            <img src="/uploads/action3.jpg" alt="">

            <div class="discount">73%</div>
        </li>
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

    <div id="paginator">
        <a href="/actions?page=1">&larr;</a>
        <ul class="pages-list">
            <li><a href="/actions?page=1">1</a></li>
            <li><a href="/actions?page=2" class="active">2</a></li>
            <li><a href="/actions?page=3">3</a></li>
        </ul>
        <a href="/actions?page=3">&rarr;</a>
    </div>

    <aside>
        <div id="banners" class="clearfix">
            <div class="banner size490_84">
                <a href="http://yandex.ru"><img src="/uploads/banner.png"/></a>
            </div>
            <div class="banner size490_84">
                <a href="http://yandex.ru"><img src="/uploads/banner.png"/></a>
            </div>
        </div>

        <div id="share">
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
            <script type="text/javascript">
                plusone();
            </script>
        </div>
    </aside>
</article>