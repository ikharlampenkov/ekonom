<?php /* Smarty version Smarty-3.0.9, created on 2011-12-23 23:18:33
         compiled from "F:\www\ekonom\application/views/scripts\content-page/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:240564ef4a9d95e34a2-48421580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '839c289df6b720c342dbf52af6f901788ba98b9c' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\content-page/add.tpl',
      1 => 1324657111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '240564ef4a9d95e34a2-48421580',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

    <h1 class="heading">Добавить контентную страницу</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
    <div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div>
    <br/>
<?php }?>

    <form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'add'));?>
" method="post">
        <table width="100%">
            <tr>
                <td class="ttovar_title">Ключ</td>
                <td class="ttovar"><input name="data[page_title]" value="<?php echo $_smarty_tpl->getVariable('contentPage')->value->pageTitle;?>
"/></td>
            </tr>
            <tr>
                <td class="ttovar_title">Название</td>
                <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('contentPage')->value->title;?>
"/></td>
            </tr>

            <tr>
                <td class="ttovar_title">Описание</td>
                <td class="ttovar"><textarea name="data[content]"><?php echo $_smarty_tpl->getVariable('contentPage')->value->content;?>
</textarea></td>
            </tr>

        </table>
        <input id="save" name="save" type="submit" value="Сохранить"/>
    </form>

</article>