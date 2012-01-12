<?php /* Smarty version Smarty-3.0.9, created on 2012-01-10 22:59:33
         compiled from "F:\www\ekonom\application/views/scripts\city/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312114f0c6065f2fec1-61373409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4711e375810acdb84af75df1630f88461af3fc17' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\city/edit.tpl',
      1 => 1326211166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312114f0c6065f2fec1-61373409',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Редактировать город</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('city')->value->id));?>
" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('city')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Код города</td>
            <td class="ttovar"><input name="data[phone_code]" value="<?php echo $_smarty_tpl->getVariable('city')->value->phoneCode;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Телефон</td>
            <td class="ttovar"><input name="data[phone_number]" value="<?php echo $_smarty_tpl->getVariable('city')->value->phoneNumber;?>
"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>