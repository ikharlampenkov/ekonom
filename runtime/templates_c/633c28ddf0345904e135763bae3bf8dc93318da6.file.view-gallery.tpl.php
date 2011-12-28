<?php /* Smarty version Smarty-3.0.9, created on 2011-12-27 01:05:11
         compiled from "F:\www\ekonom\application/views/scripts\catalog/view-gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200614ef8b7573013d1-69410309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '633c28ddf0345904e135763bae3bf8dc93318da6' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/view-gallery.tpl',
      1 => 1324905358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200614ef8b7573013d1-69410309',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><article id="main-content">

    <h1 class="heading">Продукт <?php echo $_smarty_tpl->getVariable('product')->value->title;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index','rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">Все акции</a></h1>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addGallery','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
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

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editGallery")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editGallery"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editGallery','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'id'=>$_smarty_tpl->getVariable('gallery')->value->id,'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">редактировать</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editGallery"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteGallery")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteGallery"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteGallery','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'id'=>$_smarty_tpl->getVariable('gallery')->value->id,'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
');" style="color: #830000">удалить</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteGallery"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </ul>
                </li>
        <?php }} ?>
    <?php }?>
    </ul>

</article>