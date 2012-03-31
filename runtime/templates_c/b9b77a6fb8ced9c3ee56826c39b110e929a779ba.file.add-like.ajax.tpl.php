<?php /* Smarty version Smarty-3.0.9, created on 2012-01-23 20:03:03
         compiled from "F:\www\ekonom\application/views/scripts\catalog/add-like.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165804f1d5a876cc5d1-32622524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9b77a6fb8ced9c3ee56826c39b110e929a779ba' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/add-like.ajax.tpl',
      1 => 1326374663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165804f1d5a876cc5d1-32622524',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
Нравиться? <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addLike','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'like'=>1,'unlike'=>0));?>
" class="like">Да</a> <?php if (is_object($_smarty_tpl->getVariable('productLike')->value)){?><?php echo $_smarty_tpl->getVariable('productLike')->value->like;?>
<?php }?> / <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addLike','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'like'=>0,'unlike'=>1));?>
" class="unlike">Нет</a> <?php if (is_object($_smarty_tpl->getVariable('productLike')->value)){?><?php echo $_smarty_tpl->getVariable('productLike')->value->unlike;?>
<?php }?>