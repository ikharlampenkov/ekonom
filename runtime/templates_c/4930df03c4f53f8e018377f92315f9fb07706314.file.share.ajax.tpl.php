<?php /* Smarty version Smarty-3.0.9, created on 2011-12-27 00:23:21
         compiled from "F:\www\ekonom\application/views/scripts\catalog/share.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271644ef8ad89b2b218-78840902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4930df03c4f53f8e018377f92315f9fb07706314' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/share.ajax.tpl',
      1 => 1324920013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271644ef8ad89b2b218-78840902',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="share-form">
    <form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'share','idProduct'=>$_smarty_tpl->getVariable('product')->value->id));?>
" method="POST" class="b-form">
        <fieldset class="main">
            <div class="field">
                <label for="share_email">Электронная почта друга</label>
                <input type="email" id="share_email" value="" name="share[email]"/>
                <p class="help">Укажите элетронную почту, куда отправить приглашение.</p>
            </div>
            <div class="field">
                <label for="share_name">Ваше имя</label>
                <input type="text" id="share_name" value="" name="share[name]"/>
            </div>
            <div class="field">
                <label for="share_text">Комментарий</label>
                <textarea id="share_text" name="share[text]" cols="30" rows="4"></textarea>
            </div>
        </fieldset>
        <fieldset class="submit">
            <input type="submit" value="Отправить" />
        </fieldset>
    </form>
</div>