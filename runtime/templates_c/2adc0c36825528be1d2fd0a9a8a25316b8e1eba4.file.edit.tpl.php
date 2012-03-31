<?php /* Smarty version Smarty-3.0.9, created on 2012-02-06 23:42:12
         compiled from "F:\www\ekonom\application/views/scripts\banner/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265694f3002e47709f3-62121449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2adc0c36825528be1d2fd0a9a8a25316b8e1eba4' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\banner/edit.tpl',
      1 => 1328545902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265694f3002e47709f3-62121449',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Редактировать баннер</h1>

<?php if (isset($_smarty_tpl->getVariable('exception_msg',null,true,false)->value)){?>
<div>Ошибка: <?php echo $_smarty_tpl->getVariable('exception_msg')->value;?>
</div><br/>
<?php }?>

<form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('banner')->value->id));?>
" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="<?php echo $_smarty_tpl->getVariable('banner')->value->title;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Город</td>
            <td class="ttovar"><select name="data[city_id]">
            <?php if (!empty($_smarty_tpl->getVariable('cityList',null,true,false)->value)){?>
                <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cityList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('city')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('banner')->value->city->id==$_smarty_tpl->getVariable('city')->value->id){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('city')->value->title;?>
</option>
                <?php }} ?>
            <?php }?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar_title">Ссылка</td>
            <td class="ttovar"><input name="data[link]" value="<?php echo $_smarty_tpl->getVariable('banner')->value->link;?>
"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Файл</td>
            <td class="ttovar"><?php if ($_smarty_tpl->getVariable('banner')->value->img->getName()){?><img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->img->getName();?>
"/><?php }?><br/>
                <input type="file" name="img"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>