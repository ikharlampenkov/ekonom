<?php /* Smarty version Smarty-3.0.9, created on 2011-12-25 20:34:43
         compiled from "F:\www\ekonom\application/views/scripts\catalog/view-sub-menu.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37854ef7267315c6f9-18627020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75280f7c76d8e5b51962a67ed7518c82f3183211' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/view-sub-menu.ajax.tpl',
      1 => 1324816053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37854ef7267315c6f9-18627020',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubricList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
<li id="second_level_<?php echo $_smarty_tpl->getVariable('rubric')->value->id;?>
" onmouseover="mainMenu.showSubMenu('<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewSubMenu','rubric'=>$_smarty_tpl->getVariable('rubric')->value->id));?>
', <?php echo $_smarty_tpl->getVariable('rubric')->value->id;?>
)">
    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'index','rubric'=>$_smarty_tpl->getVariable('rubric')->value->getId()));?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a>
    <ul class="submenu third-level"></ul>
</li>

<?php }} ?>