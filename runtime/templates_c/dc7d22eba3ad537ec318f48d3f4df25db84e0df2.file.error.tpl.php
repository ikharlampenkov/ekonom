<?php /* Smarty version Smarty-3.0.9, created on 2011-12-16 21:52:11
         compiled from "F:\www\ekonom\application/views/scripts\error/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204714eeb5b1b5f8515-50620110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc7d22eba3ad537ec318f48d3f4df25db84e0df2' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\error/error.tpl',
      1 => 1322059425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204714eeb5b1b5f8515-50620110',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>An error occurred</h1>

<h2><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h2>

<?php if ((isset($_smarty_tpl->getVariable('this',null,true,false)->value->exception))){?>

<h3>Exception information:</h3>

<p>
    <b>Message:</b> <?php echo $_smarty_tpl->getVariable('exception')->value->getMessage();?>

</p>

<h3>Stack trace:</h3>
  <pre><?php echo $_smarty_tpl->getVariable('exception')->value->getTraceAsString();?>

  </pre>

<h3>Request Parameters:</h3>
  <pre><?php echo $_smarty_tpl->getVariable('this')->value->escape(var_export($_smarty_tpl->getVariable('request')->value->getParams(),true));?>

  </pre>

<?php }?>