<?php /* Smarty version Smarty-3.0.9, created on 2011-12-18 21:37:53
         compiled from "F:\www\ekonom\application/views/scripts\catalog/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70784eedfac14f5048-71959659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a943f4c37583ea01c7979b69872ea4115840ecec' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/index.tpl',
      1 => 1324219071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70784eedfac14f5048-71959659',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><article id="main-content">

<h1 class="heading">Каталог</h1>


<?php if ($_smarty_tpl->getVariable('path')->value){?>
<div>
    <?php  $_smarty_tpl->tpl_vars['prub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('path')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['prub']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['prub']->iteration=0;
if ($_smarty_tpl->tpl_vars['prub']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['prub']->key => $_smarty_tpl->tpl_vars['prub']->value){
 $_smarty_tpl->tpl_vars['prub']->iteration++;
 $_smarty_tpl->tpl_vars['prub']->last = $_smarty_tpl->tpl_vars['prub']->iteration === $_smarty_tpl->tpl_vars['prub']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_prub']['last'] = $_smarty_tpl->tpl_vars['prub']->last;
?>
        <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index','rubric'=>$_smarty_tpl->getVariable('prub')->value->getId()));?>
"><?php if (!$_smarty_tpl->getVariable('prub')->value->isRoot){?><?php echo $_smarty_tpl->getVariable('prub')->value->title;?>
<?php }else{ ?><< Назад<?php }?></a> <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['_prub']['last']){?>/<?php }?>
    <?php }} ?>
</div>
<?php }?>

<?php if (!$_smarty_tpl->getVariable('cur_rubric')->value->isRoot){?>
<h1><?php echo $_smarty_tpl->getVariable('cur_rubric')->value->title;?>
</h1>
<?php }?>

<?php if ($_smarty_tpl->getVariable('rubric_list')->value){?>

<table width="100%">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/addRubric")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/addRubric"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <tr>
            <td colspan="3" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addRubric','rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">добавить рубрику</a>
            </td>
        </tr>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/addRubric"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php  $_smarty_tpl->tpl_vars['rubric'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rubric_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rubric']->key => $_smarty_tpl->tpl_vars['rubric']->value){
?>
        <tr>
            <td class="ttovar" valign="middle"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index','rubric'=>$_smarty_tpl->getVariable('rubric')->value->getId()));?>
" class="rmenu"><?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
</a>
            <td class="tedit" valign="middle">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editRubric")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editRubric"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editRubric','id'=>$_smarty_tpl->getVariable('rubric')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">редактировать</a><br/>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editRubric"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteRubric")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteRubric"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteRubric','id'=>$_smarty_tpl->getVariable('rubric')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
');" style="color:#830000">удалить</a>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteRubric"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </td>
        </tr>
    <?php }} ?>
</table>
<?php }?>



<table width="100%">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <tr>
        <td colspan="5" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
            <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'add','rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">добавить товар</a>
        </td>
    </tr>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php if ($_smarty_tpl->getVariable('product_list')->value){?>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
        <tr>
            <td class="ttovar"><?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?><img src="/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
"/><?php }else{ ?>&nbsp;<?php }?></td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('product')->value->shortText;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('product')->value->price;?>
</td>
            <td class="tedit">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('product')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">редактировать</a><br/>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'delete','id'=>$_smarty_tpl->getVariable('product')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('product')->value->title;?>
');" style="color: #830000">удалить</a>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </td>
        </tr>
    <?php }} ?>
<?php }?>
</table>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-hash")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-hash"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<br/>
<h1 class="heading">Список аттрибутов для товара</h1>

<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="4"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addAttributeHash'));?>
">добавить</a></td>
    </tr>

    <?php if ($_smarty_tpl->getVariable('attributeHashList')->value!==false){?>
        <?php  $_smarty_tpl->tpl_vars['attributeHash'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attributeHashList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['attributeHash']->key => $_smarty_tpl->tpl_vars['attributeHash']->value){
?>
            <tr>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->attributeKey;?>
</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->title;?>
</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeHash')->value->type->title;?>
</td>
                <td class="tedit">
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editAttributeHash','key'=>$_smarty_tpl->getVariable('attributeHash')->value->attributeKey));?>
">редактировать</a><br/>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteAttributeHash','key'=>$_smarty_tpl->getVariable('attributeHash')->value->attributeKey));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('attributeHash')->value->attributeKey;?>
');" style="color: #830000">удалить</a>
                </td>
            </tr>
        <?php }} ?>
    <?php }?>

</table>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-hash"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-type")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-type"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<br/>
<h1 class="heading">Типы аттрибутов</h1>

<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addAttributeType'));?>
">добавить</a></td>
    </tr>

    <?php if ($_smarty_tpl->getVariable('attributeTypeList')->value!==false){?>
        <?php  $_smarty_tpl->tpl_vars['attributeType'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attributeTypeList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['attributeType']->key => $_smarty_tpl->tpl_vars['attributeType']->value){
?>
            <tr>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeType')->value->title;?>
</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('attributeType')->value->handler;?>
</td>
                <td class="tedit">
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editAttributeType','id'=>$_smarty_tpl->getVariable('attributeType')->value->id));?>
">редактировать</a><br/>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteAttributeType','id'=>$_smarty_tpl->getVariable('attributeType')->value->id));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('attributeType')->value->id;?>
');" style="color: #830000">удалить</a>
                </td>
            </tr>
        <?php }} ?>
    <?php }?>

</table>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/index",'priv'=>"show-attribute-type"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


</article>