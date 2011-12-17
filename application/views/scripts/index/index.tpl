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