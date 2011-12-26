<?php /* Smarty version Smarty-3.0.9, created on 2011-12-27 00:10:00
         compiled from "F:\www\ekonom\application/views/scripts\company/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179614ef8aa687a5b27-13078702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d6ef4ca997c21602a120368d58adb0c88c68517' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/edit.tpl',
      1 => 1324919391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179614ef8aa687a5b27-13078702',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Редактировать компанию</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('company')->value->id));?>
" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('company')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Город</td>
            <td class="ttovar"><select name="data[city_id]">
                <option value="">--</option>
            <?php if (!empty($_smarty_tpl->getVariable('cityList',null,true,false)->value)){?>
                <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cityList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('city')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('company')->value->city->id==$_smarty_tpl->getVariable('city')->value->id){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('city')->value->title;?>
</option>
                <?php }} ?>
            <?php }?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Описание</td>
            <td class="ttovar"><textarea name="data[description]"><?php echo $_smarty_tpl->getVariable('company')->value->description;?>
</textarea></td>
        </tr>
        <tr>
            <td class="ttovar_title">Лого</td>
            <td class="ttovar">
            <?php if ($_smarty_tpl->getVariable('company')->value->file->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('company')->value->file->getName();?>
"/><?php }?><br/>
                <input type="file" name="file"/>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Email для заказов</td>
            <td class="ttovar"><input name="data[order_email]" value="<?php echo $_smarty_tpl->getVariable('company')->value->orderEmail;?>
"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>