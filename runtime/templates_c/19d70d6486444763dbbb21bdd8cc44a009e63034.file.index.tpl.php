<?php /* Smarty version Smarty-3.0.9, created on 2011-12-23 23:17:46
         compiled from "F:\www\ekonom\application/views/scripts\content-page/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173644ef4a9aa56bdf1-49294645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19d70d6486444763dbbb21bdd8cc44a009e63034' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\content-page/index.tpl',
      1 => 1324656378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173644ef4a9aa56bdf1-49294645',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><article id="main-content">

<h1 class="heading">Контентные страницы</h1>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'add'));?>
">добавить страницу</a>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<table width="100%">
<?php if ($_smarty_tpl->getVariable('contentPageList')->value){?>
    <?php  $_smarty_tpl->tpl_vars['contentPage'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contentPageList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contentPage']->key => $_smarty_tpl->tpl_vars['contentPage']->value){
?>
        <tr>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('contentPage')->value->pageTitle;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('contentPage')->value->title;?>
</td>
            <td class="tedit">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','title'=>$_smarty_tpl->getVariable('contentPage')->value->pageTitle));?>
">редактировать</a><br/>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'delete','title'=>$_smarty_tpl->getVariable('contentPage')->value->pageTitle));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('contentPage')->value->title;?>
');" style="color: #830000">удалить</a>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </td>
        </tr>
    <?php }} ?>
<?php }?>
</table>