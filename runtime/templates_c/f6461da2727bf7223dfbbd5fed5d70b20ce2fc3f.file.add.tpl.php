<?php /* Smarty version Smarty-3.0.9, created on 2012-01-23 20:08:32
         compiled from "F:\www\ekonom\application/views/scripts\banner/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:258514f1d5bd0ee9ad4-22151513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6461da2727bf7223dfbbd5fed5d70b20ce2fc3f' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\banner/add.tpl',
      1 => 1325169332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258514f1d5bd0ee9ad4-22151513',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Добавить баннер</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'add'));?>
" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Ссылка</td>
            <td class="ttovar"><input name="data[link]" value="<?php echo $_smarty_tpl->getVariable('banner')->value->link;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Файл</td>
            <td class="ttovar"><input type="file" name="img"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>