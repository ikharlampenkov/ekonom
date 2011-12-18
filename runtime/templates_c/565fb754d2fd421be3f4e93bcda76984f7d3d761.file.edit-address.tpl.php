<?php /* Smarty version Smarty-3.0.9, created on 2011-12-18 19:34:04
         compiled from "F:\www\ekonom\application/views/scripts\company/edit-address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:223024eedddbc0bdc01-00992822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '565fb754d2fd421be3f4e93bcda76984f7d3d761' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/edit-address.tpl',
      1 => 1324100894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223024eedddbc0bdc01-00992822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Редактировать адрес</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editAddress','id'=>$_smarty_tpl->getVariable('address')->value->id));?>
" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Город</td>
            <td class="ttovar"><select name="data[city]">
                <option value="">--</option>
            <?php if (!empty($_smarty_tpl->getVariable('cityList',null,true,false)->value)){?>
                <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cityList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('city')->value->id;?>
" <?php if (is_object($_smarty_tpl->getVariable('address')->value->city)&&$_smarty_tpl->getVariable('address')->value->city->id==$_smarty_tpl->getVariable('city')->value->id){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('city')->value->title;?>
</option>
                <?php }} ?>
            <?php }?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Адрес</td>
            <td class="ttovar"><input name="data[address]" value="<?php echo $_smarty_tpl->getVariable('address')->value->address;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Телефон</td>
            <td class="ttovar"><input name="data[phone]" value="<?php echo $_smarty_tpl->getVariable('address')->value->phone;?>
"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>