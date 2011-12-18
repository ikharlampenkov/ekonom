<?php /* Smarty version Smarty-3.0.9, created on 2011-12-18 23:07:09
         compiled from "F:\www\ekonom\application/views/scripts\company/add-gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327324eee0fad90fd11-10460639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12057dd814e4da6628fcd8a285097da7ce8dc950' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/add-gallery.tpl',
      1 => 1324224422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327324eee0fad90fd11-10460639',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

    <h1 class="heading">Добавить фото</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addGallery','idCompany'=>$_smarty_tpl->getVariable('company')->value->id));?>
" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Файл</td>
            <td class="ttovar"><input type="file" name="file"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

</article>