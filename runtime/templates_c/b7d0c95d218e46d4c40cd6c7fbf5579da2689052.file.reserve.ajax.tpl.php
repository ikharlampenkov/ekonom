<?php /* Smarty version Smarty-3.0.9, created on 2012-02-06 22:39:14
         compiled from "F:\www\ekonom\application/views/scripts\catalog/reserve.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:218364f2ff422d3cad1-88403642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7d0c95d218e46d4c40cd6c7fbf5579da2689052' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/reserve.ajax.tpl',
      1 => 1328541118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218364f2ff422d3cad1-88403642',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="reserve-form">
    <form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'reserve','idProduct'=>$_smarty_tpl->getVariable('product')->value->id));?>
" method="POST" class="b-form">
        <fieldset class="main">
            <div class="field">
                <label for="reserve_name">Ваше имя</label>
                <input type="text" id="reserve_name" value="" name="reserve[name]"/>
            </div>
            <div class="field">
                <label for="reserve_tel">Контактный телефон</label>
                <input type="tel" id="reserve_tel" value="" name="reserve[tel]"/>

                <p class="help">Укажите телефон, по которому с вам можно связаться для подтверждения заказа.</p>
            </div>
            <div class="field">
                <label for="reserve_email">Электронная почта друга</label>
                <input type="email" id="reserve_email" value="" name="reserve[email]"/>

                <p class="help">Укажите элетронную почту, по которой с вам можно связаться для подтверждения заказа.</p>
            </div>
        </fieldset>
        <fieldset class="submit">
            <input type="submit" value="Отправить"/>
        </fieldset>
    </form>
</div>