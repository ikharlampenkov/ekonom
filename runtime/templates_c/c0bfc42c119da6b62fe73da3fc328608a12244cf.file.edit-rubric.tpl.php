<?php /* Smarty version Smarty-3.0.9, created on 2011-12-18 20:20:28
         compiled from "F:\www\ekonom\application/views/scripts\catalog/edit-rubric.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70194eede89c5139f4-94995904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0bfc42c119da6b62fe73da3fc328608a12244cf' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/edit-rubric.tpl',
      1 => 1324100894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70194eede89c5139f4-94995904',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Добавить рубрику</h1>

    <form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editRubric','id'=>$_smarty_tpl->getVariable('rubric')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
" method="post">
        <table width="100%">
            <tr>
                <td width="200" class="ttovar" >Название</td>
                <td class="ttovar" ><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
" /></td>
            </tr>
            <tr>
                <td class="ttovar" >Рубрика</td>
                <td class="ttovar" ><select name="data[parent]">
                        <?php  $_smarty_tpl->tpl_vars['rub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_tree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rub']->key => $_smarty_tpl->tpl_vars['rub']->value){
?>
                            <option value="<?php echo $_smarty_tpl->getVariable('rub')->value->id;?>
" <?php if ((isset($_smarty_tpl->getVariable('rubric',null,true,false)->value)&&$_smarty_tpl->getVariable('rub')->value->id==$_smarty_tpl->getVariable('rubric')->value->parent)||(!isset($_smarty_tpl->getVariable('rubric',null,true,false)->value)&&$_smarty_tpl->getVariable('rub')->value->id==$_smarty_tpl->getVariable('cur_rubric')->value->getId())){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('rub')->value->title;?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>