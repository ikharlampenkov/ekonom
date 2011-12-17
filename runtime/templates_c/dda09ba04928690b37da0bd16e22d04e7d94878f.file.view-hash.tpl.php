<?php /* Smarty version Smarty-3.0.9, created on 2011-12-17 12:53:44
         compiled from "F:\www\ekonom\application/views/scripts\user/view-hash.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226034eec2e68073014-02574158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dda09ba04928690b37da0bd16e22d04e7d94878f' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\user/view-hash.tpl',
      1 => 1324100894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226034eec2e68073014-02574158',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-hash")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-hash"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<br/>
<h1 class="heading">Список атрибутов для пользователей</h1>

<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="4">
            <img src="/i/add.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addAttributeHash'));?>
">добавить</a></td>
    </tr>

<?php if ($_smarty_tpl->getVariable('attributeHashList')->value!==false){?>
    <?php  $_smarty_tpl->tpl_vars['attributeHash'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attributeHashList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['attributeHash']->key => $_smarty_tpl->tpl_vars['attributeHash']->value){
?>
        <tr>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->title;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->attributeKey;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->type->title;?>
</td>
            <td class="tedit">
                <img src="/i/edit.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editAttributeHash','key'=>$_smarty_tpl->getVariable('attributeHash')->value->attributeKey));?>
">редактировать</a><br/>
                <img src="/i/delete.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteAttributeHash','key'=>$_smarty_tpl->getVariable('attributeHash')->value->attributeKey));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('attributeHash')->value->title;?>
');" style="color: #830000">удалить</a>
            </td>
        </tr>
    <?php }} ?>
<?php }?>

</table>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-hash"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
