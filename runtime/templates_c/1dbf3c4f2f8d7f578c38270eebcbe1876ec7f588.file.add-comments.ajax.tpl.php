<?php /* Smarty version Smarty-3.0.9, created on 2012-01-07 12:51:08
         compiled from "F:\www\ekonom\application/views/scripts\catalog/add-comments.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170824f07dd4cd4d363-04117626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dbf3c4f2f8d7f578c38270eebcbe1876ec7f588' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/add-comments.ajax.tpl',
      1 => 1325915369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170824f07dd4cd4d363-04117626',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="add-comment-form">
    <form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addComments','idProduct'=>$_smarty_tpl->getVariable('product')->value->id));?>
" method="POST" class="b-form">
        <fieldset class="main">
            <div class="field">
                <label for="comment_name">Ваше имя</label>
                <input type="text" id="comment_name" value="" name="comment[name]"/>
            </div>
            <div class="field">
                <label for="comment_text">Комментарий</label>
                <textarea id="comment_text" name="comment[text]" cols="30" rows="4"></textarea>
            </div>
            <div class="field">
                <label for="comment_captcha">Введите текст с картинки</label>
                <img src="/kcaptcha/?<?php echo session_name();?>
=<?php echo session_id();?>
">
                <input type="text" id="comment_captcha" value="" name="comment[captcha]"/>
            </div>
        </fieldset>
        <fieldset class="submit">
            <input type="submit" value="Отправить" />
        </fieldset>
    </form>
</div>