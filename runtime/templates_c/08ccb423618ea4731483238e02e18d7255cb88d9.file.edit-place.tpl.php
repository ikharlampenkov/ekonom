<?php /* Smarty version Smarty-3.0.9, created on 2012-01-06 23:43:13
         compiled from "F:\www\ekonom\application/views/scripts\banner/edit-place.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283644f0724a1abee45-71724248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08ccb423618ea4731483238e02e18d7255cb88d9' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\banner/edit-place.tpl',
      1 => 1325868129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283644f0724a1abee45-71724248',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Редактировать площадку</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editPlace','id'=>$_smarty_tpl->getVariable('place')->value->id));?>
" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('place')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Ширина</td>
            <td class="ttovar"><input name="data[width]" value="<?php echo $_smarty_tpl->getVariable('place')->value->width;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Высота</td>
            <td class="ttovar"><input name="data[height]" value="<?php echo $_smarty_tpl->getVariable('place')->value->height;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Время между сменой баннеров</td>
            <td class="ttovar"><input name="data[change_time]" value="<?php echo $_smarty_tpl->getVariable('place')->value->changeTime;?>
"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>