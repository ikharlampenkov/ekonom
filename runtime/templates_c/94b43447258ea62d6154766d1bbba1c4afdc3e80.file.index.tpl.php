<?php /* Smarty version Smarty-3.0.9, created on 2011-12-17 12:15:01
         compiled from "F:\www\ekonom\application/views/scripts\index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100994eec255505e858-64174848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94b43447258ea62d6154766d1bbba1c4afdc3e80' => 
    array (
      0 => 'F:\\www\\ekonom\\application/views/scripts\\index/index.tpl',
      1 => 1324098899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100994eec255505e858-64174848',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1 class="heading">Акции города</h1>

<ul id="actions" class="clearfix">
    <li>
        <h3><a href="/item.html" class="various fancybox.ajax">Телефон LG Prada</a></h3>
        <img src="/uploads/action1.png" alt="">

        <div class="discount">20%</div>
    </li>
    <li>
        <h3><a href="/item.html" class="various fancybox.ajax">Суперджинсы</a></h3>
        <img src="/uploads/action2.jpg" alt="">

        <div class="discount">21%</div>
    </li>
    <li>
        <h3><a href="/item.html" class="various fancybox.ajax">Башмаки со скидкой</a></h3>
        <img src="/uploads/action3.jpg" alt="">

        <div class="discount">73%</div>
    </li>
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
    afterShow: updatePlusOne
    });
    });
</script>

<div id="paginator">
    <a href="/actions?page=1">&larr;</a>
    <ul class="pages-list">
        <li><a href="/actions?page=1">1</a></li>
        <li><a href="/actions?page=2" class="active">2</a></li>
        <li><a href="/actions?page=3">3</a></li>
    </ul>
    <a href="/actions?page=3">&rarr;</a>
</div>