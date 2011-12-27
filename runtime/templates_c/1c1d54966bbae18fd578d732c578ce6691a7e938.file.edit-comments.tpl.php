<?php /* Smarty version Smarty-3.0.9, created on 2011-12-27 21:18:49
         compiled from "F:\www\ekonom\application/views/scripts\catalog/edit-comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139154ef9d3c970c781-90643744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c1d54966bbae18fd578d732c578ce6691a7e938' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/edit-comments.tpl',
      1 => 1324995525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139154ef9d3c970c781-90643744',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

<h1 class="heading">Редактировать комментарий</h1>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editComments','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'id'=>$_smarty_tpl->getVariable('comment')->value->id,'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Пользователь</td>
            <td class="ttovar"><input name="data[name]" value="<?php echo $_smarty_tpl->getVariable('comment')->value->user;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar">Сообщение</td>
            <td class="ttovar"><textarea name="data[text]"><?php echo $_smarty_tpl->getVariable('comment')->value->message;?>
</textarea></td>
        </tr>
        <tr>
            <td class="ttovar">Модерация</td>
            <td class="ttovar"><input type="checkbox" name="data[is_moderate]" style="width: 14px;" <?php if ($_smarty_tpl->getVariable('comment')->value->isModerate){?>checked="checked" <?php }?>></textarea></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

</article>