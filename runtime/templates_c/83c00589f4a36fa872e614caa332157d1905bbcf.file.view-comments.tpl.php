<?php /* Smarty version Smarty-3.0.9, created on 2011-12-27 21:12:24
         compiled from "F:\www\ekonom\application/views/scripts\catalog/view-comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93114ef9d2482b0840-56783489%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83c00589f4a36fa872e614caa332157d1905bbcf' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/view-comments.tpl',
      1 => 1324995141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93114ef9d2482b0840-56783489',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'F:\www\ekonom\library\Smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><article id="main-content">

    <h1 class="heading">Продукт <?php echo $_smarty_tpl->getVariable('product')->value->title;?>
 <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index','rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">Все акции</a></h1>


    <table>
        <tr>
            <td class="ttovar">Дата</td>
            <td class="ttovar">Пользователь</td>
            <td class="ttovar">Сообщение</td>
            <td class="ttovar">Модерация</td>
            <td class="ttovar">&nbsp;</td>
        </tr>
    <?php if ($_smarty_tpl->getVariable('commentsList')->value!==false){?>
        <?php  $_smarty_tpl->tpl_vars['comments'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('commentsList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comments']->key => $_smarty_tpl->tpl_vars['comments']->value){
?>
            <tr>
                <td class="ttovar"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('comments')->value->dateCreate,"%d.%m.%Y");?>
</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('comments')->value->user;?>
</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('comments')->value->message;?>
</td>
                <td class="ttovar"><?php echo $_smarty_tpl->getVariable('comments')->value->isModerate;?>
</td>

                <td class="tedit">

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editComments")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editComments"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <img src="/i/edit.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'editComments','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'id'=>$_smarty_tpl->getVariable('comments')->value->id,'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
">редактировать</a><br/>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/editComments"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteComments")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteComments"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <img src="/i/delete.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'deleteComments','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'id'=>$_smarty_tpl->getVariable('comments')->value->id,'rubric'=>$_smarty_tpl->getVariable('cur_rubric')->value->getId()));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('comments')->value->title;?>
');" style="color: #830000">удалить</a>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>($_smarty_tpl->getVariable('controller')->value)."/deleteComments"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </td>
            </tr>
        <?php }} ?>
    <?php }?>
    </table>

</article>