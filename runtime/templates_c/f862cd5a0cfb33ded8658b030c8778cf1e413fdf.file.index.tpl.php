<?php /* Smarty version Smarty-3.0.9, created on 2011-12-30 22:36:31
         compiled from "F:\www\ekonom\application/views/scripts\search/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171724efdda7f47b904-58271613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f862cd5a0cfb33ded8658b030c8778cf1e413fdf' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\search/index.tpl',
      1 => 1325259387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171724efdda7f47b904-58271613',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

    <h1 class="heading">Результаты поиска: <?php echo $_smarty_tpl->getVariable('query')->value;?>
</h1>

<?php if ($_smarty_tpl->getVariable('productList')->value){?>
    <ul id="companies" class="clearfix shop-actions">
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

                <div class="discount"><?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount')->value;?>
<?php }?><?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount_type')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount_type')->value;?>
<?php }?></div>
            </li>
        <?php }} ?>
        <li>&nbsp;</li>
        <li class="empty"></li>
    </ul>
<?php }else{ ?>
<h1 class="heading">Ничего не найдено</h1>
<?php }?>

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