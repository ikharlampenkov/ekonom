<?php /* Smarty version Smarty-3.0.9, created on 2011-12-29 21:18:41
         compiled from "F:\www\ekonom\application/views/scripts\catalog/view-product.ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156624efc76c1e64d21-28535693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50476d9be6c10e4d5566fb6927d6edf719c8a09a' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\catalog/view-product.ajax.tpl',
      1 => 1325168311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156624efc76c1e64d21-28535693',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Этот блок должен отдаваться аяксом при нажатии на акцию -->
<div id="item" class="item-description">
    <h1 class="heading"><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</h1>

    <div class="inner">
        <div class="clearfix">
            <article class="information">
                <section class="naming">
                    <h3><?php echo $_smarty_tpl->getVariable('product')->value->title;?>
</h3>

                <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('terms_of_stock')){?>
                    <p><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('terms_of_stock')->value;?>
</p>
                <?php }?>
                </section>

                <section class="description">
                    <h3>Краткое описание магазина или товара</h3>

                    <p><?php echo $_smarty_tpl->getVariable('product')->value->fullText;?>
</p>
                </section>

                <section class="discount clearfix">
                <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount')){?>
                    <h5>Скидка: <?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount')->value;?>
<?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount_type')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount_type')->value;?>
<?php }?></h5>
                <?php }?>
                    <del class="old-price"><?php echo $_smarty_tpl->getVariable('product')->value->price;?>
 р</del>
                <?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('second_price')){?>
                    <ins class="new-price"><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('second_price')->value;?>
&nbsp;р</ins>
                <?php }?>
                </section>

                <?php if ($_smarty_tpl->getVariable('commentsList')->value!==false){?>
                <section class="comments">
                    <h3>Комментарии</h3>
                    <ul class="comments-list">
                        <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('commentsList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>
                        <li>
                            <article class="comment">
                                <header><?php echo $_smarty_tpl->getVariable('comment')->value->user;?>
</header>
                                <div class="content">
                                    <?php echo $_smarty_tpl->getVariable('comment')->value->message;?>

                                </div>
                            </article>
                        </li>
                        <?php }} ?>
                    </ul>
                </section>
                <?php }?>
            </article>

            <aside class="addons">
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

                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'reserve','idProduct'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="button reserve">Отложить</a>
                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'share','idProduct'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="button share-with-friend">Поделиться</a>
            </aside>
        </div>


        <div class="controls">
            <div class="clearfix">
                <span class="share42">
                        <a target="_blank" title="Поделиться в Facebook" class="facebook" href="#" rel="nofollow"
                           onclick="window.open('http://www.facebook.com/sharer.php?u={ url }&amp;t={ title }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Добавить в Twitter" class="twitter" href="#" rel="nofollow"
                           onclick="window.open('http://twitter.com/share?text={ title }&amp;url={ url }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Поделиться В Контакте" class="vkontakte" href="#" rel="nofollow"
                           onclick="window.open('http://vkontakte.ru/share.php?url={ url }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
                        </a>
                    </span>

                <div id="plusone">
                    <g:plusone></g:plusone>
                </div>

                <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>$_smarty_tpl->getVariable('controller')->value,'action'=>'addComments','idProduct'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="button add-comment">Комментировать</a>
            </div>
        </div>

        <!-- this block is expected by ajax-form.js -->
        <div id="form-placeholder">

        </div>

    </div>
</div>