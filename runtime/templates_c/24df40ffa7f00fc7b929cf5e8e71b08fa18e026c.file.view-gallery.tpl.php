<?php /* Smarty version Smarty-3.0.9, created on 2011-12-18 23:33:05
         compiled from "F:\www\ekonom\application/views/scripts\company/view-gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210304eee15c152b380-60768388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24df40ffa7f00fc7b929cf5e8e71b08fa18e026c' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/view-gallery.tpl',
      1 => 1324225980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210304eee15c152b380-60768388',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><article id="main-content">

    <h1 class="heading">Компания <?php echo $_smarty_tpl->getVariable('company')->value->title;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index'));?>
">Все компании</a></h1>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addGallery','idCompany'=>$_smarty_tpl->getVariable('company')->value->id));?>
">добавить фото</a>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <ul id="gallery" class="clearfix">
    <?php if ($_smarty_tpl->getVariable('galleryList')->value!==false){?>
        <?php  $_smarty_tpl->tpl_vars['gallery'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('galleryList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->key => $_smarty_tpl->tpl_vars['gallery']->value){
?>
                <li>
                    <h3><a href="#"><?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
</a></h3> 
                    <img src="/gallery<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getSubPath();?>
/<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getPreview();?>
" alt="<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
">

                    <div class="discount">A</div>

                    <ul id="gallery_action_<?php echo $_smarty_tpl->getVariable('gallery')->value->id;?>
" class="gallery_action_menu">

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editGallery','idCompany'=>$_smarty_tpl->getVariable('company')->value->id,'id'=>$_smarty_tpl->getVariable('gallery')->value->id));?>
">редактировать</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteGallery','idCompany'=>$_smarty_tpl->getVariable('company')->value->id,'id'=>$_smarty_tpl->getVariable('gallery')->value->id));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
');" style="color: #830000">удалить</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </ul>
                </li>
        <?php }} ?>
    <?php }?>
    </ul>

</article>