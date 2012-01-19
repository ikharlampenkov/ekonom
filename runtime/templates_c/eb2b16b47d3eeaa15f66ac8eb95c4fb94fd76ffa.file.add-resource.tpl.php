<?php /* Smarty version Smarty-3.0.9, created on 2012-01-10 23:04:56
         compiled from "F:\www\ekonom\application/views/scripts\user/add-resource.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317154f0c61a80109d6-79504000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb2b16b47d3eeaa15f66ac8eb95c4fb94fd76ffa' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\user/add-resource.tpl',
      1 => 1324107625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317154f0c61a80109d6-79504000',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Добавить ресурс</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addResource'));?>
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