<?php /* Smarty version Smarty-3.0.9, created on 2011-12-17 12:55:21
         compiled from "F:\www\ekonom\application/views/scripts\user/edit-role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:220404eec2ec9885608-70183750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '550c9c0b3fec2e2d85cc31229c0ef1b79116c8e7' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\user/edit-role.tpl',
      1 => 1324036073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220404eec2ec9885608-70183750',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Редактировать роль</h1>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editRole','id'=>$_smarty_tpl->getVariable('role')->value->id));?>
" method="post">
    <table>
        <tr>
            <td class="ttovar" width="200">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('role')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar" width="200">Русское название</td>
            <td class="ttovar"><input name="data[rtitle]" value="<?php echo $_smarty_tpl->getVariable('role')->value->rtitle;?>
"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>