<?php /* Smarty version Smarty-3.0.9, created on 2011-12-25 23:41:27
         compiled from "F:\www\ekonom\application/views/scripts\company/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:289454ef75237da1234-62017290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4528c0f58b5ad95b2e77897251943699034d7647' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/index.tpl',
      1 => 1324831284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289454ef75237da1234-62017290',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
if (!is_callable('smarty_modifier_capitalize')) include 'F:\www\ekonom\library\Smarty\plugins\modifier.capitalize.php';
if (!is_callable('smarty_block_if_object_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_object_allowed.php';
?><article id="main-content">



    <h1 class="heading">Компании<?php if (isset($_smarty_tpl->getVariable('rubric',null,true,false)->value)){?>.<?php echo $_smarty_tpl->getVariable('rubric')->value->title;?>
<?php }?></h1>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'add'));?>
">добавить компанию</a>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <ul id="companies" class="clearfix">
    <?php if ($_smarty_tpl->getVariable('companyList')->value!==false){?>
        <?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companyList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?>
            <?php ob_start();?><?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('controller')->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('if_object_allowed', array('type'=>$_tmp1,'object'=>($_smarty_tpl->tpl_vars['company']->value),'priv'=>"moderate")); $_block_repeat=true; smarty_block_if_object_allowed(array('type'=>$_tmp1,'object'=>($_smarty_tpl->tpl_vars['company']->value),'priv'=>"moderate"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li>
                    <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'view','id'=>$_smarty_tpl->getVariable('company')->value->id));?>
" class="various fancybox.ajax"><?php echo $_smarty_tpl->getVariable('company')->value->title;?>
</a></h3>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'view','id'=>$_smarty_tpl->getVariable('company')->value->id));?>
" class="various fancybox.ajax"><img src="/files/<?php echo $_smarty_tpl->getVariable('company')->value->file->getName();?>
" alt="<?php echo $_smarty_tpl->getVariable('company')->value->title;?>
"></a>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <div class="discount">A</div>

                    <ul id="company_action_<?php echo $_smarty_tpl->getVariable('company')->value->id;?>
" class="company_action_menu">

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/viewAddress")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/viewAddress"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'viewGallery','idCompany'=>$_smarty_tpl->getVariable('company')->value->id));?>
">галерея</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/viewAddress"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/viewAddress")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/viewAddress"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'viewAddress','idcompany'=>$_smarty_tpl->getVariable('company')->value->id));?>
">адреса</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/viewAddress"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/showAcl")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/showAcl"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'showAcl','idCompany'=>$_smarty_tpl->getVariable('company')->value->id));?>
">права</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/showAcl"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('company')->value->id));?>
">редактировать</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'delete','id'=>$_smarty_tpl->getVariable('company')->value->id));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('company')->value->id;?>
');" style="color: #830000">удалить</a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/delete"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </ul>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                </li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_object_allowed(array('type'=>$_tmp1,'object'=>($_smarty_tpl->tpl_vars['company']->value),'priv'=>"moderate"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php }} ?>
    <?php }?>
    </ul>
</article>


