<?php /* Smarty version Smarty-3.0.9, created on 2012-02-06 21:10:40
         compiled from "F:\www\ekonom\application/views/scripts\index/show-product-list.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:311434f2fdf605d9791-77155777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '898c0f378fd93e61d9863a07c19225c322d67c3d' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\index/show-product-list.ajax.tpl',
      1 => 1327932875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311434f2fdf605d9791-77155777',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><ul id="actions" class="clearfix">
<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
    <?php if ($_smarty_tpl->getVariable('authUserRole')->value!='companyadmin'||($_smarty_tpl->getVariable('authUserRole')->value=='companyadmin'&&$_smarty_tpl->getVariable('product')->value->company->getId()==$_smarty_tpl->getVariable('curCompany')->value)){?>
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

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <ul id="company_action_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" class="company_action_menu">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/viewGallery")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/viewGallery"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <li class="action"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewGallery','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
">галерея</a></li>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/viewGallery"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/viewComments")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/viewComments"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <li class="action"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewComments','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
">комментарии</a></li>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/viewComments"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'edit','id'=>$_smarty_tpl->getVariable('product')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
">редактировать</a></li>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/delete")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/delete"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'delete','id'=>$_smarty_tpl->getVariable('product')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('product')->value->title;?>
');" style="color: #830000">удалить</a></li>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/delete"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </ul>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


        </li>
    <?php }?>
<?php }} ?>
</ul>


<script type="text/javascript">
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

<?php if ($_smarty_tpl->getVariable('pagerCount')->value>1){?>
<div id="paginator">
    <ul class="pages-list">
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['name'] = "_pager";
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('pagerCount')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total']);
?>
            <li><a href="/index/showProductList/pager/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['_pager']['iteration']-1;?>
/" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['_pager']['iteration']-1==$_smarty_tpl->getVariable('curPager')->value){?>class="active"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['_pager']['iteration'];?>
</a></li>
        <?php endfor; endif; ?>
    </ul>
</div>
<?php }?>