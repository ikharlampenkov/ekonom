<?php /* Smarty version Smarty-3.0.9, created on 2011-12-26 00:13:14
         compiled from "F:\www\ekonom\application/views/scripts\catalog/edit-attribute-hash.tpl" */ ?>
<?php /*%%SmartyHeaderCode:318144ef759aa8f4429-90021333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdac397dd5e94fe02ce8b945e33c254b7697dbb8' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/edit-attribute-hash.tpl',
      1 => 1324219071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318144ef759aa8f4429-90021333',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

<h1 class="heading">Редактировать атрибут</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editAttributeHash','key'=>$_smarty_tpl->getVariable('hash')->value->attributeKey));?>
" method="post">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Ключ</td>
            <td class="ttovar"><input name="data[attribute_key]" value="<?php echo $_smarty_tpl->getVariable('hash')->value->attributeKey;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Описание</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('hash')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Тип</td>
            <td class="ttovar">
                <select name="data[type_id]">
                <?php  $_smarty_tpl->tpl_vars['attributeType'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attributeTypeList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['attributeType']->key => $_smarty_tpl->tpl_vars['attributeType']->value){
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('attributeType')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('attributeType')->value->id==$_smarty_tpl->getVariable('hash')->value->type->id){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('attributeType')->value->title;?>
</option>
                <?php }} ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Список значений (через ||)</td>
            <td class="ttovar"><input name="data[list_value]" value="<?php echo $_smarty_tpl->getVariable('hash')->value->getValueList(true);?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Обязательное</td>
            <td class="ttovar"><input type="checkbox" name="data[required]" <?php if ($_smarty_tpl->getVariable('hash')->value->isRequired){?>checked="checked" <?php }?> style="width: 14px;"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Порядок сортировки</td>
            <td class="ttovar"><input name="data[sort_order]" value="<?php echo $_smarty_tpl->getVariable('hash')->value->sortOrder;?>
"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

</article>