<?php /* Smarty version Smarty-3.0.9, created on 2011-12-17 14:00:08
         compiled from "F:\www\ekonom\application/views/scripts\company/show-acl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217574eec3df8cd4fa0-92292973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fb919e54d42945bae039d05312e0bf139248419' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/show-acl.tpl',
      1 => 1324105181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217574eec3df8cd4fa0-92292973',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Права для компании <?php echo $_smarty_tpl->getVariable('company')->value->title;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index'));?>
">Все компании</a></h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'showAcl','idCompany'=>$_smarty_tpl->getVariable('company')->value->id));?>
" method="post">
<table width="100%">
   <tr>
       <td class="ttovar_title">Пользователь</td>
       <td class="ttovar" style="width: 90px;">Модератор</td>
       <td class="ttovar"></td>
   </tr>

<?php if ($_smarty_tpl->getVariable('userList')->value!==false){?>
    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('userList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
        <tr>
            <td class="ttovar_title"><?php if ($_smarty_tpl->getVariable('user')->value->searchAttribute('name')){?><?php echo $_smarty_tpl->getVariable('user')->value->getAttribute('name')->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('user')->value->login;?>
<?php }?></td>
            <td class="ttovar"><input type="checkbox" name="data[<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
][is_moderate]" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('user')->value->id;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('user')->value->id;?>
<?php $_tmp2=ob_get_clean();?><?php if (isset($_smarty_tpl->getVariable('companyAcl',null,true,false)->value[$_tmp1])&&$_smarty_tpl->getVariable('companyAcl')->value[$_tmp2]->isModerate){?>checked="checked"<?php }?> /></td>
            <td class="ttovar"></td>
        </tr>
    <?php }} ?>
<?php }?>

</table>
        <input id="save" name="save" type="submit" value="Сохранить"/>
</form>