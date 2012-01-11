<?php /* Smarty version Smarty-3.0.9, created on 2012-01-06 23:59:37
         compiled from "F:\www\ekonom\application/views/scripts\error/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100324f0728791d4e45-66453055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '100324f0728791d4e45-66453055',
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