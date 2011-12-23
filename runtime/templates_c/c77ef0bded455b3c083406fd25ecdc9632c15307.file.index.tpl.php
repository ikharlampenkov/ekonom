<?php /* Smarty version Smarty-3.0.9, created on 2011-12-23 23:41:14
         compiled from "F:\www\ekonom\application/views/scripts\about/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172484ef4af2ab84ef9-28851383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c77ef0bded455b3c083406fd25ecdc9632c15307' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\about/index.tpl',
      1 => 1324658471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172484ef4af2ab84ef9-28851383',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content">

<?php if ($_smarty_tpl->getVariable('authUserRole')->value=='admin'){?>

    <form action="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'index'));?>
" method="POST">
        <h1 class="heading">О нас</h1>

        <textarea name="data_about[content]" style="width: 100%; height: 200px;"><?php echo $_smarty_tpl->getVariable('contentAbout')->value->content;?>
</textarea>

        <h1 class="heading">Контактная информация</h1>

        <textarea name="data_contacts[content]" style="width: 100%; height: 200px;"><?php echo $_smarty_tpl->getVariable('contentContacts')->value->content;?>
</textarea>

        <input type="submit" value="Сохранить" class="button"/>

    </form>


    <?php }else{ ?>

    <h1 class="heading">О нас</h1>

    <p><?php echo $_smarty_tpl->getVariable('contentAbout')->value->content;?>
</p>

    <h1 class="heading">Контактная информация</h1>

    <p><?php echo $_smarty_tpl->getVariable('contentContacts')->value->content;?>
</p>
<?php }?>

</article>