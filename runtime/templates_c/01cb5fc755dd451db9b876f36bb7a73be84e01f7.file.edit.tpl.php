<?php /* Smarty version Smarty-3.0.9, created on 2011-12-16 23:04:43
         compiled from "F:\www\ekonom\application/views/scripts\catalog/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67974eeb6c1bef4c99-79610010%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01cb5fc755dd451db9b876f36bb7a73be84e01f7' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/edit.tpl',
      1 => 1324051481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67974eeb6c1bef4c99-79610010',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_object_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_object_allowed.php';
?><div class="page"><h1>Редактировать товар</h1></div><br/>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('product')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar">Компания</td>
            <td class="ttovar">
                <select name="data[company]">
                <?php if ($_smarty_tpl->getVariable('companyList')->value!==false){?>
                    <?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companyList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?>
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_object_allowed', array('type'=>"Company",'object'=>($_smarty_tpl->tpl_vars['company']->value),'priv'=>"moderate")); $_block_repeat=true; smarty_block_if_object_allowed(array('type'=>"Company",'object'=>($_smarty_tpl->tpl_vars['company']->value),'priv'=>"moderate"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <option value="<?php echo $_smarty_tpl->getVariable('company')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('company')->value->id==$_smarty_tpl->getVariable('product')->value->company->id){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('company')->value->title;?>
</option>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_object_allowed(array('type'=>"Company",'object'=>($_smarty_tpl->tpl_vars['company']->value),'priv'=>"moderate"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    <?php }} ?>
                <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar">Рисунок</td>
            <td class="ttovar"><?php if (isset($_smarty_tpl->getVariable('product',null,true,false)->value)&&$_smarty_tpl->getVariable('product')->value->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getName();?>
"/><br/><?php }?>
                <input type="file" name="img"/></td>
        </tr>
        <tr>
            <td class="ttovar">Рубрика</td>
            <td class="ttovar"><select name="data[rubric]">
            <?php  $_smarty_tpl->tpl_vars['rub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_tree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rub']->key => $_smarty_tpl->tpl_vars['rub']->value){
?>
                <option value="<?php echo $_smarty_tpl->getVariable('rub')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('rub')->value->id==$_smarty_tpl->getVariable('product')->value->rubric->id){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('rub')->value->title;?>
</option>
            <?php }} ?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar">Цена</td>
            <td class="ttovar"><input id="price" name="data[price]" value="<?php echo $_smarty_tpl->getVariable('product')->value->price;?>
" onchange="checkNum('price');"/></td>
        </tr>
        <tr>
            <td class="ttovar">Текст</td>
            <td class="ttovar"><textarea name="data[short_text]"><?php echo $_smarty_tpl->getVariable('product')->value->shortText;?>
</textarea></td>
        </tr>
        <tr>
            <td class="ttovar">Полный текст</td>
            <td class="ttovar"><textarea name="data[full_text]"><?php echo $_smarty_tpl->getVariable('product')->value->fullText;?>
</textarea></td>
        </tr>

    <?php if ($_smarty_tpl->getVariable('attributeHashList')->value!==false){?>
        <?php  $_smarty_tpl->tpl_vars['attributeHash'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attributeHashList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['attributeHash']->key => $_smarty_tpl->tpl_vars['attributeHash']->value){
?>
            <tr>
                <td class="ttovar_title"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->title;?>
</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->type->getHTMLFrom($_smarty_tpl->tpl_vars['attributeHash']->value,$_smarty_tpl->getVariable('product')->value);?>
</td>
            </tr>
        <?php }} ?>
    <?php }?>

    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>