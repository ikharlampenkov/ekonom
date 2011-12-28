<?php /* Smarty version Smarty-3.0.9, created on 2011-12-27 22:47:41
         compiled from "F:\www\ekonom\application/views/scripts\company/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312024ef9e89ddda937-84367624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a2d248229c0e6452704f9a7ccc41e7a5c93b3ee' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\company/view.tpl',
      1 => 1325000853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312024ef9e89ddda937-84367624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<article id="main-content" class="item-description shop">
    <div class="inner">

        <h1 class="heading"><?php echo $_smarty_tpl->getVariable('company')->value->title;?>
</h1>

        <div class="clearfix">
        <?php if ($_smarty_tpl->getVariable('galleryList')->value!==false){?>



            <div class="gallery">
                <?php  $_smarty_tpl->tpl_vars['gallery'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('galleryList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['gallery']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['gallery']->iteration=0;
 $_smarty_tpl->tpl_vars['gallery']->index=-1;
if ($_smarty_tpl->tpl_vars['gallery']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->key => $_smarty_tpl->tpl_vars['gallery']->value){
 $_smarty_tpl->tpl_vars['gallery']->iteration++;
 $_smarty_tpl->tpl_vars['gallery']->index++;
 $_smarty_tpl->tpl_vars['gallery']->first = $_smarty_tpl->tpl_vars['gallery']->index === 0;
 $_smarty_tpl->tpl_vars['gallery']->last = $_smarty_tpl->tpl_vars['gallery']->iteration === $_smarty_tpl->tpl_vars['gallery']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_gallery']['first'] = $_smarty_tpl->tpl_vars['gallery']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['_gallery']['last'] = $_smarty_tpl->tpl_vars['gallery']->last;
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['_gallery']['first']){?>
                        <div class="big-image">
                            <img src="/gallery<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getSubPath();?>
/<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getName();?>
" width="420" height="270" alt="<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
" data-preview="/gallery<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getSubPath();?>
/<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getPreview();?>
"/>
                            <h5 class="title"><?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
</h5>
                            <a href="#previous" class="previous"></a>
                            <a href="#next" class="next"></a>
                        </div>

                    <ul class="previews clearfix">
                        <?php }else{ ?>
                        <li>
                            <a href="/gallery<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getSubPath();?>
/<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getName();?>
" title="<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
">
                                <img src="/gallery<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getSubPath();?>
/<?php echo $_smarty_tpl->getVariable('gallery')->value->file->getPreview();?>
" alt="<?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
" class="shadow-image"/>
                            </a>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['_gallery']['last']){?>
                    </ul>
                    <?php }?>
                <?php }} ?>
            </div>
        <?php }?>

            <div class="information">
                <img class="shop-logo shadow-image" src="/files/<?php echo $_smarty_tpl->getVariable('company')->value->file->getName();?>
" alt="Логотип магазина <?php echo $_smarty_tpl->getVariable('company')->value->title;?>
"/>

                <h3>Краткое описание магазина</h3>

                <p><?php echo $_smarty_tpl->getVariable('company')->value->description;?>
</p>

            <?php if ($_smarty_tpl->getVariable('company')->value->getAddressList()!==false){?>
                <h3>Адреса магазинов</h3>
                <ul class="addresses-list">
                    <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('company')->value->getAddressList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
?>
                        <li>
                            <span class="nobr"><?php echo $_smarty_tpl->getVariable('address')->value->city->title;?>
, <?php echo $_smarty_tpl->getVariable('address')->value->address;?>
</span>,<br/>
                            <span class="phone nobr">+7 <?php echo $_smarty_tpl->getVariable('address')->value->phone;?>
</span>
                        </li>
                    <?php }} ?>
                </ul>
            <?php }?>
            </div>

            <div id="share" class="clear">
                <script type="text/javascript">
                    //<!--
                    share42('/i/');
                    //-->
                </script>

                <div id="plusone">
                    <g:plusone></g:plusone>
                </div>


                <script type="text/javascript">//<!--
                window.___gcfg = { lang: 'ru' };

                (function () {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                })();
                //-->
                </script>
            </div>
        </div>
    </div>

<?php if ($_smarty_tpl->getVariable('productList')->value){?>
    <ul id="actions" class="clearfix shop-actions">
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
        <li>
            <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</a></h3>
            <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><img src="<?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?>/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
<?php }else{ ?>/uploads/action1.png<?php }?>" alt="<?php echo $_smarty_tpl->getVariable('product')->value->title;?>
"></a>

            <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount')){?>
            <div class="discount"><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount')->value;?>
<?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount_type')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount_type')->value;?>
<?php }?></div>
            <?php }?>
        </li>
        <?php }} ?>
        <li>&nbsp;</li>
        <li class="empty"></li>
    </ul>
<?php }?>

    <script type="text/javascript">
        var updatePlusOne = function () {
        gapi.plusone.go();
        };

        $(document).ready(function () {
        $(".various").fancybox({
        maxWidth    : 800,
        maxHeight    : 600,
        fitToView    : false,
        width        : 800,
        autoSize    : false,
        closeClick    : false,
        openEffect    : 'none',
        closeEffect    : 'none',
        padding: 0,
        scrolling: 'no',
        afterShow: updatePlusOne
        });
        });
    </script>

    <a href="javascript:history.go(-1);" class="button back">Назад</a>

</article>

<aside id="sidebar">
    <section id="adv">
        <a href="http://yandex.ru">
            <img src="/uploads/banner.jpg" width="187" height="357"/>
        </a>
    </section>
</aside>

