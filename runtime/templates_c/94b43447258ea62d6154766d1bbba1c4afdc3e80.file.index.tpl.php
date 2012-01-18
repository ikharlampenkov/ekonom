<?php /* Smarty version Smarty-3.0.9, created on 2012-01-18 23:59:54
         compiled from "F:\www\ekonom\application/views/scripts\index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34454f16fa8a047967-68055046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94b43447258ea62d6154766d1bbba1c4afdc3e80' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\index/index.tpl',
      1 => 1326905989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34454f16fa8a047967-68055046',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('bannerList')->value!==false){?>
<div id="slider-wrapper">
    <div id="slider">
        <ul id="slides">
            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
            <li class="slide">
                <img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->img->getName();?>
" alt="<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->title;?>
">

                <p class="description"><a href="http://<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->link;?>
"><?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->title;?>
</a></p>
            </li>
            <?php }} ?>
        </ul>
    </div>
    <div id="shadow"></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    $('#slider').easySlider({
    auto: true,
    pause: <?php echo $_smarty_tpl->getVariable('mainPlace')->value->changeTime;?>
*1000,
    continuous: true,
    prevId: 'previous',
    prevText: '',
    nextId: 'next',
    nextText: ''
    });
    });
</script>
<?php }?>


<article id="main-content">
<?php if ($_smarty_tpl->getVariable('productList')->value!==false){?>
    <h1 class="heading">Акции города</h1>

    <ul id="actions" class="clearfix">
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
            <li>
                <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</a></h3>
                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><img src="<?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?>/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
<?php }else{ ?>/i/no_foto.png<?php }?>" alt="<?php echo $_smarty_tpl->getVariable('product')->value->title;?>
"></a>

                <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount')){?>
                    <div class="discount"><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount')->value;?>
<?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount_type')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount_type')->value;?>
<?php }?></div>
                <?php }?>
            </li>
        <?php }} ?>
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
<?php }?>

    <aside>
        <div id="banners" class="clearfix">
        <?php if ($_smarty_tpl->getVariable('bannerListLeft')->value!==false){?>
            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerListLeft')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
                <div class="banner size490_84">
                    <a href="http://<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->link;?>
"><img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->img->getName();?>
"/></a>
                </div>
            <?php }} ?>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('bannerListRight')->value!==false){?>
            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerListRight')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
                <div class="banner size490_84">
                    <a href="http://<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->link;?>
"><img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->img->getName();?>
"/></a>
                </div>
            <?php }} ?>
        <?php }?>

        </div>

        <div id="share">
                    <span class="share42">
                        <script type="text/javascript">
                            //<!--
                            share42('/i/');
                            //-->
                        </script>
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