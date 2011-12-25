<?php /* Smarty version Smarty-3.0.9, created on 2011-12-25 23:25:10
         compiled from "F:\www\ekonom\application/views/scripts\catalog/child-block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120534ef74e66ae1ed7-91247609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9df79449238660fb8315d8c5e46bbc13abd1b136' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/child-block.tpl',
      1 => 1324830304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120534ef74e66ae1ed7-91247609',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subrubric')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
<li id="first_level_<?php echo $_smarty_tpl->getVariable('rubric')->value->id;?>
">
    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'company','action'=>'index','rubric'=>$_smarty_tpl->getVariable('rubric')->value->getId()));?>
"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a>
    <?php if ($_smarty_tpl->getVariable('rubric')->value->hasChild()){?>
        <ul class="submenu third-level">
        <?php $_template = new Smarty_Internal_Template("catalog/parent-block.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('subrubric',$_smarty_tpl->getVariable('rubric')->value->getChild()); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        </ul>
    <?php }?>
</li>

<?php }} ?>