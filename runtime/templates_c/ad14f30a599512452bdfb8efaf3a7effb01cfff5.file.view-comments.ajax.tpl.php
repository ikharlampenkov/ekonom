<?php /* Smarty version Smarty-3.0.9, created on 2012-01-07 12:49:53
         compiled from "F:\www\ekonom\application/views/scripts\catalog/view-comments.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206554f07dd010badb4-13665188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad14f30a599512452bdfb8efaf3a7effb01cfff5' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/view-comments.ajax.tpl',
      1 => 1324996299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206554f07dd010badb4-13665188',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('commentsList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>
<li>
    <article class="comment">
        <header><?php echo $_smarty_tpl->getVariable('comment')->value->user;?>
</header>
        <div class="content">
            <?php echo $_smarty_tpl->getVariable('comment')->value->message;?>

        </div>
    </article>
</li>
<?php }} ?>