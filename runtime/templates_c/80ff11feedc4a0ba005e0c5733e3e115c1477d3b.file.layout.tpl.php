<?php /* Smarty version Smarty-3.0.9, created on 2012-01-10 23:03:48
         compiled from "F:\www\ekonom\application/layouts/scripts\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:216474f0c6164d87683-90501810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80ff11feedc4a0ba005e0c5733e3e115c1477d3b' => 
    array (
      0 => 'F:\\www\\ekonom\\application/layouts/scripts\\layout.tpl',
      1 => 1326211425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '216474f0c6164d87683-90501810',
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
    <script type="text/javascript" language="javascript" src="/js/jquery.timers.js"></script>

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

    <script type="text/javascript" language="javascript" src="/js/share42.js"></script>

    <!-- Google plusone -->
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>
<body>
<div id="page">
    <header>
        <a href="/"><h1 id="logo"><span>Ekonom.pro &mdash; Экономь профессионально.</span></h1></a>

        <div id="choose-city-form">
            <h4><label for="city_name">Выбрать город</label></h4>

            <form id="form_city_name" class="b-form" action="/index/chooseCity" method="post">
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

        <?php if ($_smarty_tpl->getVariable('authUserRole')->value!='guest'){?>
            <div id="logout-link">
                Пользователь: <?php echo $_smarty_tpl->getVariable('authUser')->value;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'login','action'=>'logout'));?>
">Выход</a>
            </div>
        <?php }?>

            <h4><label for="search_query">Поиск по сайту</label></h4>

            <form action="/search" method="get">
                <fieldset>
                    <input type="text" name="query" id="search_query" placeholder="Я ищу:">
                    <input type="submit" value="Найти" id="submit">
                </fieldset>
            </form>
        </div>
    </header>

    <div id="content" class="clearfix">
        <nav id="main-nav">
            <ul>
                <li>
                    <a href="/catalog">Выбрать</a>
                    <ul class="first-level submenu">
                    <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('headRubricList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'index','rubric'=>$_smarty_tpl->getVariable('rubric')->value->getId()));?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a>
                            <?php if ($_smarty_tpl->getVariable('rubric')->value->hasChild()){?>
                                <ul class="submenu second-level">
                                <?php $_template = new Smarty_Internal_Template("catalog/child-block.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('subrubric',$_smarty_tpl->getVariable('rubric')->value->getChild());$_template->assign('controllerRub','catalog'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
                                </ul>
                            <?php }?>
                        </li>
                    <?php }} ?>
                    </ul>
                </li>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"company/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"company/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/company/">Компании</a>
                    <ul class="first-level submenu">
                        <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('headRubricList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                            <li id="first_level_<?php echo $_smarty_tpl->getVariable('rubric')->value->id;?>
">
                                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'company','action'=>'index','rubric'=>$_smarty_tpl->getVariable('rubric')->value->getId()));?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a>
                                <?php if ($_smarty_tpl->getVariable('rubric')->value->hasChild()){?>
                                    <ul class="submenu second-level">
                                    <?php $_template = new Smarty_Internal_Template("catalog/child-block.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('subrubric',$_smarty_tpl->getVariable('rubric')->value->getChild());$_template->assign('controllerRub','company'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
                                    </ul>
                                <?php }?>
                            </li>
                        <?php }} ?>
                    </ul>
                </li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"company/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <li><a href="/about/">О нас</a></li>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"city/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"city/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/city/">Города</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"city/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"contentPage/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"contentPage/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/contentPage/">Контентные страницы</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"contentPage/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"banner/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"banner/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/banner/">Баннеры</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"banner/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"user/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"user/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><a href="/user/">Пользователи</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"user/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </ul>
        </nav>
        <script type="text/javascript">
            $('#main-nav > ul > li:first-child').hover(
                    function () {
            $(this).closest('nav').css('borderRadius', '0 0 20px 0');
            }, function () {
            $(this).closest('nav').css('borderRadius', '0 0 20px 20px');
            }
            );
        </script>

    <?php echo $_smarty_tpl->getVariable('this')->value->layout()->content;?>


    </div>

</div>

<footer>
    <div id="footer-inner" class="clearfix">
        <p id="copyright">Ekonom.pro &copy; 2011</p>

        <p id="conditions">
            <a href="/conditions">Общие условия пользования сайтом</a><br/>

            <!-- Yandex.Metrika informer -->
            <a href="http://metrika.yandex.ru/stat/?id=11564479&amp;from=informer"
               target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/11564479/3_0_FFFFFFFF_EFEFEFFF_0_pageviews"
                                                   style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try { Ya.Metrika.informer( { i:this,id:11564479,type:0,lang:'ru' } );return false } catch(e) { } "/></a>
            <!-- /Yandex.Metrika informer -->

            <!-- Yandex.Metrika counter -->

        <div style="display:none;">
            <script type="text/javascript">
                (function (w, c) {
                (w[c] = w[c] || []).push(function() {
                try {
                w.yaCounter11564479 = new Ya.Metrika( { id:11564479, enableAll: true, trackHash:true, webvisor:true } );
                }
                catch(e) { }
                });
                })(window, "yandex_metrika_callbacks");
            </script>
        </div>
        <script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
        <noscript>
            <div><img src="//mc.yandex.ru/watch/11564479" style="position:absolute; left:-9999px;" alt=""/></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->

        </p>

        <div id="phone" class="nobr"><?php echo $_smarty_tpl->getVariable('bottomCityNumber')->value;?>
</div>
    </div>
</footer>
</body>
</html>