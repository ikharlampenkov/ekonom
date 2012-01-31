<?php /* Smarty version Smarty-3.0.9, created on 2012-01-30 22:12:27
         compiled from "F:\www\ekonom\application/views/scripts\search/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82924f26b35b09cdf1-01258323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f862cd5a0cfb33ded8658b030c8778cf1e413fdf' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\search/index.tpl',
      1 => 1327248188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82924f26b35b09cdf1-01258323',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

    <h1 class="heading">Результаты поиска: <?php echo $_smarty_tpl->getVariable('query')->value;?>
</h1>

<?php if ($_smarty_tpl->getVariable('productList')->value||$_smarty_tpl->getVariable('companyList')->value||$_smarty_tpl->getVariable('rubricList')->value){?>

    <?php if ($_smarty_tpl->getVariable('productList')->value||$_smarty_tpl->getVariable('rubricList')->value){?>
    <h1 class="heading">Товары:</h1>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('rubricList')->value!==false){?>
        <ul style="list-style: none;">
            <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubricList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
                <li>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'index','rubric'=>$_smarty_tpl->getVariable('rubric')->value->getId()));?>
" class="rmenu"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a>
                </li>
            <?php }} ?>
        </ul>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('productList')->value!==false){?>
        <ul id="companies" class="clearfix shop-actions">
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                <li>
                    <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><?php echo $_smarty_tpl->getVariable('product')->value->shortTitle;?>
</a></h3>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><img src="<?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?>/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
<?php }else{ ?>/i/no_foto.png<?php }?>" alt="<?php echo $_smarty_tpl->getVariable('product')->value->shortTitle;?>
"></a>

                    <div class="discount"><?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount')->value;?>
<?php }?><?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount_type')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount_type')->value;?>
<?php }?></div>
                </li>
            <?php }} ?>
            <li>&nbsp;</li>
            <li class="empty"></li>
        </ul>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('companyList')->value!==false){?>

    <h1 class="heading">Организации:</h1>

        <ul id="companies" class="clearfix">

            <?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companyList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?>
                <li>
                    <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'company','action'=>'view','id'=>$_smarty_tpl->getVariable('company')->value->id));?>
" class=""><?php echo $_smarty_tpl->getVariable('company')->value->title;?>
</a></h3>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'company','action'=>'view','id'=>$_smarty_tpl->getVariable('company')->value->id));?>
" class=""><img src="<?php if ($_smarty_tpl->getVariable('company')->value->file->getName()){?>/files/<?php echo $_smarty_tpl->getVariable('company')->value->file->getPreview();?>
<?php }else{ ?>/i/no_foto.png<?php }?>" alt="<?php echo $_smarty_tpl->getVariable('company')->value->title;?>
"></a>
                </li>
            <?php }} ?>

        </ul>
    <?php }?>
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
        afterShow: updatePlusOne,
        afterShow: function () {
        $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
        }
        });
        });
    </script>