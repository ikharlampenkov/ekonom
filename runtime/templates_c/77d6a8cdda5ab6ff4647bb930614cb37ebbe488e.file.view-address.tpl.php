<?php /* Smarty version Smarty-3.0.9, created on 2011-12-17 12:48:21
         compiled from "F:\www\ekonom\application/views/scripts\company/view-address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:256024eec2d250e16c1-23041579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77d6a8cdda5ab6ff4647bb930614cb37ebbe488e' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/view-address.tpl',
      1 => 1324100894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '256024eec2d250e16c1-23041579',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Компания <?php echo $_smarty_tpl->getVariable('company')->value->title;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index'));?>
">Все компании</a></h1>



<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addAddress'));?>
">добавить адрес</a></td>
    </tr>

<?php if ($_smarty_tpl->getVariable('addressList')->value!==false){?>
    <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('addressList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
?>
        <tr>

            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('address')->value->city->title;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('address')->value->address;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('address')->value->phone;?>
</td>
            <td class="tedit">
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editAddress','id'=>$_smarty_tpl->getVariable('address')->value->id));?>
">редактировать</a><br/>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteAddress','id'=>$_smarty_tpl->getVariable('address')->value->id));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('address')->value->id;?>
');" style="color: #830000">удалить</a>
            </td>

        </tr>
    <?php }} ?>
<?php }?>

</table>