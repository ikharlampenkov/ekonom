<?php /* Smarty version Smarty-3.0.9, created on 2011-12-17 13:35:16
         compiled from "F:\www\ekonom\application/layouts/scripts\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203684eec38244728f2-88504572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80ff11feedc4a0ba005e0c5733e3e115c1477d3b' => 
    array (
      0 => 'F:\\www\\ekonom\\application/layouts/scripts\\layout.tpl',
      1 => 1324103547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203684eec38244728f2-88504572',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><!DOCTYPE html>
<html>
<head>
    <title>Ekonom.pro - Экономь профессионально.</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <!-- This script describes some html5 specific things for IE8- -->
    <!--[if lte IE 8]>
    <script type="text/javascript" src="/js/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui-timepicker-addon.css"/>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/jquery-ui.js"></script>

    <!-- fancybox assets -->
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.0.4" type="text/css" media="screen"/>
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.js?v=2.0.4"></script>

    <link rel="stylesheet" href="/css/main.css"/>
    <!-- Include last! It overrides default fancybox styles -->
    <script type="text/javascript" src="/js/ajax-form.js"></script>
    <!-- read comments in js files for better understanding of its purpose -->
    <script type="text/javascript" src="/js/gallery.js"></script>
    <script type="text/javascript" src="/js/slider.js"></script>

    <script type="text/javascript" language="javascript" src="/js/func.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <!-- Google plusone -->
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>
<body>
<div id="page">
    <header>
        <a href="/"><h1 id="logo"><span>Ekonom.pro &mdash; Экономь профессионально.</span></h1></a>

        <div id="choose-city-form">
            <h4><label for="city_name">Выбрать город</label></h4>

            <form class="b-form" action="/choose-city" method="post">
                <select name="city_name" id="city_name">
                <?php if (!empty($_smarty_tpl->getVariable('headCityList',null,true,false)->value)){?>
                    <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('headCityList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
?>
                        <option value="<?php echo $_smarty_tpl->getVariable('city')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('city')->value->id==$_smarty_tpl->getVariable('curCity')->value){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->getVariable('city')->value->title;?>
</option>
                    <?php }} ?>
                <?php }?>
                </select>
            </form>
        </div>

        <div id="search-form">
            <h4><label for="search_query">Поиск по сайту</label></h4>

            <form action="/search" method="get">
                <fieldset>
                    <input type="text" name="query" id="search_query" placeholder="Я ищу:">
                    <input type="submit" value="Найти" id="submit">
                </fieldset>
            </form>
        </div>
    </header>

    <div id="content">
        <nav id="main-nav">
            <ul>
                <li><a href="/actions/">Акции</a></li>
                <li><a href="/sales/">Распродажи</a></li>
                <li><a href="/coupons/">Купоны</a></li>
                <li><a href="/company/">Компании</a></li>
                <li><a href="/about/">О нас</a></li>
                <li><a href="/contacts">Контактная информация</a></li>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"city/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"city/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/city/">Города</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"city/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"company/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"company/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/company/">Компании</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"company/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/catalog/">Каталог</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"user/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"user/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/user/">Пользователи</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"user/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </ul>
        </nav>


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


        <?php echo $_smarty_tpl->getVariable('this')->value->layout()->content;?>




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
    </div>
</div>

<footer>
    <div id="footer-inner" class="clearfix">
        <p id="copyright">Ekonom.pro &copy; 2011</p>

        <p id="conditions"><a href="/conditions">Общие условия пользования сайтом</a></p>

        <div id="phone" class="nobr">+7 (3842) 33-86-86</div>
    </div>
</footer>
</body>
</html>