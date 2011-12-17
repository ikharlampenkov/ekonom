<?php /* Smarty version Smarty-3.0.9, created on 2011-12-16 22:39:56
         compiled from "F:\www\ekonom\application/layouts/scripts\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267684eeb664cda05a9-56379428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a469eeb31924a87f6bbe033e82fdfe3e13335576' => 
    array (
      0 => 'F:\\www\\ekonom\\application/layouts/scripts\\admin.tpl',
      1 => 1324049994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267684eeb664cda05a9-56379428',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="<?php echo $_smarty_tpl->getVariable('description')->value;?>
"/>
    <meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('keywords')->value;?>
"/>
    <meta name="author-corporate" content=""/>
    <meta name="publisher-email" content=""/>

    <link rel="stylesheet" type="text/css" href="/css/main2.css"/>
    <script type="text/javascript" language="javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>

</head>

<body>

<table style="width: 100%; height: 100%;" cellpadding="0" cellspacing="0" border="0" align="center">
    <tr>
        <td style="height: 60px; vertical-align: top;">

            <table style="width: 100%; height: 60px; background-color:#69aefc;">
                <tr>
                    <td style="padding-left: 25px; vertical-align: middle;"><a href="/" style="color: #ffffff; text-decoration: none; font-size: 26px;"><?php echo $_smarty_tpl->getVariable('title')->value;?>
</a></td>
                    <td width="300" valign="middle" style="color:white">
                        Пользователь: <?php echo $_smarty_tpl->getVariable('authUser')->value;?>
 &nbsp; / &nbsp; <a href="/login/logout/" style="color:black">Выйти</a>
                    </td>
                </tr>
            </table>


        </td>
    </tr>
    <tr>
        <td>

            <table border="0" cellpadding="20" width="100%">
                <tr>
                    <td width="230">

                        <table border="0" cellpadding="10" cellspacing="10" width="100%" height="100%"
                               style="background-color:#f0f0f0">
                            <tr>
                                <td><h1>Меню:</h1></td>
                            </tr>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"city/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"city/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <tr>
                                <td><a href="/city/" class="menu">Города</a></td>
                            </tr>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"city/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"company/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"company/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <tr>
                                <td><a href="/company/" class="menu">Компании</a></td>
                            </tr>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"company/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <tr>
                                <td><a href="/catalog/" class="menu">Каталог</a></td>
                            </tr>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"user/index")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"user/index"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <tr>
                                <td><a href="/user/" class="menu">Пользователи</a></td>
                            </tr>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"user/index"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                        </table>

                    </td>
                    <td>
                    <?php echo $_smarty_tpl->getVariable('this')->value->layout()->content;?>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>


</body>
</html>
