<?php /* Smarty version Smarty-3.0.9, created on 2011-12-18 19:05:31
         compiled from "F:\www\ekonom\application/views/scripts\user/show-role-acl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:256524eec3ece33c082-02272469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1cd2f2ba3c0923bb94a9e4f4ff2770329493840' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\user/show-role-acl.tpl',
      1 => 1324107625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '256524eec3ece33c082-02272469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Права для роли <?php echo $_smarty_tpl->getVariable('role')->value->rtitle;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index'));?>
">Все роли</a></h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'showRoleAcl','idRole'=>$_smarty_tpl->getVariable('role')->value->id));?>
" method="post">
<table width="100%">
   <tr>
       <td class="ttovar_title">Ресурс</td>
       <td class="ttovar" style="width: 90px;">Разрешение</td>
       <td class="ttovar">Уточнение привелегий</td>
   </tr>

<?php if ($_smarty_tpl->getVariable('userResourceList')->value!==false){?>
    <?php  $_smarty_tpl->tpl_vars['resource'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('userResourceList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['resource']->key => $_smarty_tpl->tpl_vars['resource']->value){
?>
        <tr>
            <td class="ttovar_title"><?php if ($_smarty_tpl->getVariable('resource')->value->rtitle!=''){?><?php echo $_smarty_tpl->getVariable('resource')->value->rtitle;?>
 (<?php echo $_smarty_tpl->getVariable('resource')->value->title;?>
)<?php }else{ ?><?php echo $_smarty_tpl->getVariable('resource')->value->title;?>
<?php }?></td>
            <td class="ttovar"><input type="checkbox" name="data[<?php echo $_smarty_tpl->getVariable('resource')->value->id;?>
][is_allow]" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('resource')->value->id;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('resource')->value->id;?>
<?php $_tmp2=ob_get_clean();?><?php if (isset($_smarty_tpl->getVariable('roleAcl',null,true,false)->value[$_tmp1])&&$_smarty_tpl->getVariable('roleAcl')->value[$_tmp2]->isAllow){?>checked="checked"<?php }?> /></td>
            <td class="ttovar"><input name="data[<?php echo $_smarty_tpl->getVariable('resource')->value->id;?>
][privileges]" value="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('resource')->value->id;?>
<?php $_tmp3=ob_get_clean();?><?php if (isset($_smarty_tpl->getVariable('roleAcl',null,true,false)->value[$_tmp3])){?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('resource')->value->id;?>
<?php $_tmp4=ob_get_clean();?><?php echo $_smarty_tpl->getVariable('roleAcl')->value[$_tmp4]->privileges;?>
<?php }else{ ?>show<?php }?>"/></td>
        </tr>
    <?php }} ?>
<?php }?>

</table>
        <input id="save" name="save" type="submit" value="Сохранить"/>
</form>