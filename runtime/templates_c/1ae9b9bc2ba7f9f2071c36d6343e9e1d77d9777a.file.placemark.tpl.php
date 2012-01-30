<?php /* Smarty version Smarty-3.0.9, created on 2012-01-23 20:09:20
         compiled from "F:\www\ekonom\application/views/scripts\banner/placemark.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199834f1d5c00e322b9-96234822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ae9b9bc2ba7f9f2071c36d6343e9e1d77d9777a' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\banner/placemark.tpl',
      1 => 1325169332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199834f1d5c00e322b9-96234822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Размещение баннеров. Площадка <?php echo $_smarty_tpl->getVariable('place')->value->title;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'viewPlace'));?>
">Все Площадки</a></h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'placemark','idPlace'=>$_smarty_tpl->getVariable('place')->value->id));?>
" method="post">
<table width="100%">
   <tr>
       <td class="ttovar_title">Пользователь</td>
       <td class="ttovar" style="width: 90px;">Разместить</td>
       <td class="ttovar"></td>
   </tr>

<?php if ($_smarty_tpl->getVariable('bannerList')->value!==false){?>
    <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
        <tr>
            <td class="ttovar_title"><?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
</td>
            <td class="ttovar"><input type="checkbox" name="data[<?php echo $_smarty_tpl->getVariable('banner')->value->id;?>
][place]" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('banner')->value->id;?>
<?php $_tmp1=ob_get_clean();?><?php if (isset($_smarty_tpl->getVariable('placeAcl',null,true,false)->value[$_tmp1])){?>checked="checked"<?php }?> /></td>
            <td class="ttovar"></td>
        </tr>
    <?php }} ?>
<?php }?>

</table>
        <input id="save" name="save" type="submit" value="Сохранить"/>
</form>