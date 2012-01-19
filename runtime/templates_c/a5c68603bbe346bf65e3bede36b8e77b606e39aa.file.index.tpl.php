<?php /* Smarty version Smarty-3.0.9, created on 2012-01-10 22:57:06
         compiled from "F:\www\ekonom\application/views/scripts\city/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276704f0c5fd2004318-77430503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5c68603bbe346bf65e3bede36b8e77b606e39aa' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\city/index.tpl',
      1 => 1326211023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276704f0c5fd2004318-77430503',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Города</h1>


<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="4"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'add'));?>
">добавить</a></td>
    </tr>

<?php if ($_smarty_tpl->getVariable('cityList')->value!==false){?>
    <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cityList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
?>
        <tr>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('city')->value->title;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('city')->value->phoneCode;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('city')->value->phoneNumber;?>
</td>
            <td class="tedit"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('city')->value->id));?>
">редактировать</a><br/>
                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'delete','id'=>$_smarty_tpl->getVariable('city')->value->id));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('city')->value->id;?>
');" style="color: #830000">удалить</a></td>
        </tr>
    <?php }} ?>
<?php }?>

</table>