<?php /* Smarty version Smarty-3.0.9, created on 2011-12-25 23:01:13
         compiled from "F:\www\ekonom\application/views/scripts\user/edit-resource.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148784eeb71fe07f858-71706405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ccc328a57070777d46e6a91656dc5fcb2efd4d' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\user/edit-resource.tpl',
      1 => 1324107625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148784eeb71fe07f858-71706405',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Редактировать ресурс</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editResource','id'=>$_smarty_tpl->getVariable('resource')->value->id));?>
" method="post">
    <table>
        <tr>
            <td class="ttovar" width="200">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('resource')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar" width="200">Русское название</td>
            <td class="ttovar"><input name="data[rtitle]" value="<?php echo $_smarty_tpl->getVariable('resource')->value->rtitle;?>
"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>