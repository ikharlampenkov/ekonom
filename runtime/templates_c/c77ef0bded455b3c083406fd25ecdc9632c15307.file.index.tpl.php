<?php /* Smarty version Smarty-3.0.9, created on 2012-01-07 12:53:10
         compiled from "F:\www\ekonom\application/views/scripts\about/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:263894f07ddc66c7003-90013537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c77ef0bded455b3c083406fd25ecdc9632c15307' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\about/index.tpl',
      1 => 1324996297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263894f07ddc66c7003-90013537',
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

        <?php echo $_smarty_tpl->getVariable('ckeditorAbout')->value;?>


        <h1 class="heading">Контактная информация</h1>

        <?php echo $_smarty_tpl->getVariable('ckeditorContacts')->value;?>
 

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