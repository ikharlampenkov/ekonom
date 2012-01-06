<?php /* Smarty version Smarty-3.0.9, created on 2012-01-06 22:23:05
         compiled from "F:\www\ekonom\application/views/scripts\company/edit-gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241444f0711d92c8174-69752439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd492600fb384683736d6bc2f2539f0a0da3fef35' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/edit-gallery.tpl',
      1 => 1324225170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241444f0711d92c8174-69752439',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

<h1 class="heading">Редактировать фото</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editGallery','idCompany'=>$_smarty_tpl->getVariable('company')->value->id,'id'=>$_smarty_tpl->getVariable('gallery')->value->id));?>
" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Файл</td>
            <td class="ttovar">
            <?php if ($_smarty_tpl->getVariable('gallery')->value->file->getName()){?>
                <img src="/gallery<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getSubPath();?>
/<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getName();?>
" alt="<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
"><br/>
            <?php }?>
                <input type="file" name="file"/>
            </td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

</article>