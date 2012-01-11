<?php /* Smarty version Smarty-3.0.9, created on 2012-01-06 23:44:28
         compiled from "F:\www\ekonom\application/views/scripts\banner/view-place.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317244f0724ec1aca44-86300396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '745bad7d02d157fda699307c36362385ac7b42a3' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\banner/view-place.tpl',
      1 => 1325868265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317244f0724ec1aca44-86300396',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><article id="main-content">

<h1 class="heading">Площадки</h1>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addPlace'));?>
">добавить площадку</a>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/add"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <tr>
        </td>
    </tr>

    <table width="100%">
<?php if ($_smarty_tpl->getVariable('placeList')->value!==false){?>
    <?php  $_smarty_tpl->tpl_vars['place'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('placeList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['place']->key => $_smarty_tpl->tpl_vars['place']->value){
?>
        <tr>

            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('place')->value->title;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('place')->value->width;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('place')->value->height;?>
</td>
            <td class="ttovar"><?php echo $_smarty_tpl->getVariable('place')->value->changeTime;?>
</td>
            <td class="tedit">
                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'placemark','id'=>$_smarty_tpl->getVariable('place')->value->id));?>
">размещение</a><br/>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editPlace','id'=>$_smarty_tpl->getVariable('place')->value->id));?>
">редактировать</a><br/>
                    <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deletePlace','id'=>$_smarty_tpl->getVariable('place')->value->id));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('place')->value->title;?>
');" style="color: #830000">удалить</a>
            </td>

        </tr>
    <?php }} ?>
<?php }?>

</table>

</article>