<?php /* Smarty version Smarty-3.0.9, created on 2012-03-01 20:28:29
         compiled from "F:\www\ekonom\application/views/scripts\index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8264f4f797da11173-78721642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94b43447258ea62d6154766d1bbba1c4afdc3e80' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\index/index.tpl',
      1 => 1330268135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8264f4f797da11173-78721642',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'F:\www\ekonom\library\Smarty\plugins\modifier.truncate.php';
if (!is_callable('smarty_block_if_allowed')) include 'F:\www\ekonom\library\Smarty\plugins\block.if_allowed.php';
?><?php if ($_smarty_tpl->getVariable('bannerList')->value!==false){?>
<div id="slider-wrapper">
    <div id="slider">
        <ul id="slides">
            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
                <li class="slide">
                    <img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->img->getName();?>
" alt="<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->title;?>
">

                    <p class="description"><a href="http://<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->link;?>
"><?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->title;?>
</a></p>
                </li>
            <?php }} ?>
        </ul>
    </div>
    <div id="shadow"></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    $('#slider').easySlider({
    auto: true,
    pause: <?php echo $_smarty_tpl->getVariable('mainPlace')->value->changeTime;?>
*1000,
    continuous: true,
    prevId: 'previous',
    prevText: '',
    nextId: 'next',
    nextText: ''
    });
    });
</script>
<?php }?>


<article id="main-content">
<?php if ($_smarty_tpl->getVariable('productList')->value!==false){?>

    <h1 class="heading">Акции города</h1>

    <div id="product-list-place">
        <ul id="actions" class="clearfix">
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                <?php if ($_smarty_tpl->getVariable('authUserRole')->value!='companyadmin'||($_smarty_tpl->getVariable('authUserRole')->value=='companyadmin'&&$_smarty_tpl->getVariable('product')->value->company->getId()==$_smarty_tpl->getVariable('curCompany')->value)){?>
                    <li>
                        <h3><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('product')->value->shortTitle,25,"...",true);?>
</a></h3>
                        <a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewProduct','id'=>$_smarty_tpl->getVariable('product')->value->id));?>
" class="various fancybox.ajax"><img src="<?php if ($_smarty_tpl->getVariable('product')->value->img->getName()){?>/files/<?php echo $_smarty_tpl->getVariable('product')->value->img->getPreview();?>
<?php }else{ ?>/i/no_foto.png<?php }?>" alt="<?php echo $_smarty_tpl->getVariable('product')->value->shortTitle;?>
"></a>

                        <div class="discount"><?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount')->value;?>
<?php }?><?php if ($_smarty_tpl->getVariable('product')->value->searchAttribute('discount_type')){?><?php echo $_smarty_tpl->getVariable('product')->value->getAttribute('discount_type')->value;?>
<?php }?></div>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <ul id="company_action_<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" class="company_action_menu">
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/viewGallery")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/viewGallery"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                    <li class="action"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewGallery','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
">галерея</a></li>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/viewGallery"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/viewComments")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/viewComments"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                    <li class="action"><a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'viewComments','idProduct'=>$_smarty_tpl->getVariable('product')->value->id,'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
">комментарии</a></li>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/viewComments"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/edit")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/edit"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                    <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'edit','id'=>$_smarty_tpl->getVariable('product')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
">редактировать</a></li>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('if_allowed', array('resource'=>"catalog/delete")); $_block_repeat=true; smarty_block_if_allowed(array('resource'=>"catalog/delete"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                    <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('this')->value->url(array('controller'=>'catalog','action'=>'delete','id'=>$_smarty_tpl->getVariable('product')->value->getId(),'rubric'=>$_smarty_tpl->getVariable('product')->value->getRubric()->getId()));?>
" onclick="return confirmDelete('<?php echo $_smarty_tpl->getVariable('product')->value->title;?>
');" style="color: #830000">удалить</a></li>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/delete"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            </ul>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_if_allowed(array('resource'=>"catalog/edit"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


                    </li>
                <?php }?>
            <?php }} ?>
        </ul>


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
            afterShow: updatePlusOne,
            afterShow: function () {
            $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
            }
            });
            });
        </script>

        <?php if ($_smarty_tpl->getVariable('pagerCount')->value>1){?>
            <div id="paginator">
                <ul class="pages-list">
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['name'] = "_pager";
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('pagerCount')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["_pager"]['total']);
?>
                        <li><a href="/index/showProductList/pager/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['_pager']['iteration']-1;?>
/" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['_pager']['iteration']-1==$_smarty_tpl->getVariable('curPager')->value){?>class="active"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['_pager']['iteration'];?>
</a></li>
                    <?php endfor; endif; ?>
                </ul>
            </div>
        <?php }?>
    </div>
<?php }?>

    <aside>
        <div id="banners" class="clearfix">
        <?php if ($_smarty_tpl->getVariable('bannerListLeft')->value!==false){?>
            <div id="slider-wrapper-ml">
                <div id="slider-ml">
                    <ul id="slides-ml">
                        <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerListLeft')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
                            <li class="slide">
                                <a href="http://<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->link;?>
">
                                    <img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->img->getName();?>
" width="490" height="84" alt="<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->title;?>
"/>
                                </a>
                            </li>
                            <div class="banner size490_84">
                                <a href="http://<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->link;?>
"><img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->img->getName();?>
"/></a>
                            </div>
                        <?php }} ?>
                    </ul>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                $('#slider-ml').easySlider({
                auto: true,
                pause: <?php echo $_smarty_tpl->getVariable('leftPlace')->value->changeTime;?>
*1000,
                continuous: true,
                controlsShow: false,
                prevId: 'previous',
                prevText: '',
                nextId: 'next',
                nextText: ''
                });
                });
            </script>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('bannerListRight')->value!==false){?>
            <div id="slider-wrapper-mr">
                <div id="slider-mr">
                    <ul id="slides-mr">
                        <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerListRight')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
                            <li class="slide">
                                <a href="http://<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->link;?>
">
                                    <img src="/banners/<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->img->getName();?>
" width="490" height="84" alt="<?php echo $_smarty_tpl->getVariable('banner')->value->getBanner()->title;?>
">
                                </a>
                            </li>
                        <?php }} ?>
                    </ul>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                $('#slider-mr').easySlider({
                auto: true,
                pause: <?php echo $_smarty_tpl->getVariable('rightPlace')->value->changeTime;?>
*1000,
                continuous: true,
                controlsShow: false,
                prevId: 'previous',
                prevText: '',
                nextId: 'next',
                nextText: ''
                });
                });
            </script>
        <?php }?>

        </div>

        <div id="share">
                    <span class="share42">
                        <script type="text/javascript">
                            //<!--
                            share42('/i/');
                            //-->
                        </script>
                    </span>

            <div id="plusone">
                <g:plusone></g:plusone>
            </div>
            <script type="text/javascript">
                plusone();
            </script>
        </div>
    </aside>
</article>