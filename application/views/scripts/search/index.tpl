<article id="main-content">

    <h1 class="heading">Результаты поиска: {$query}</h1>

{if $productList}
    <ul id="companies" class="clearfix shop-actions">
        {foreach from=$productList item=product}
            <li>
                <h3><a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax">{$product->title}</a></h3>
                <a href="{$this->url(['controller' => 'catalog','action' => 'viewProduct', 'id' => $product->id])}" class="various fancybox.ajax"><img src="{if $product->img->getName()}/files/{$product->img->getPreview()}{else}/i/no_foto.png{/if}" alt="{$product->title}"></a>

                <div class="discount">{if $product->searchAttribute('discount')}{$product->getAttribute('discount')->value}{/if}{if $product->searchAttribute('discount_type')}{$product->getAttribute('discount_type')->value}{/if}</div>
            </li>
        {/foreach}
        <li>&nbsp;</li>
        <li class="empty"></li>
    </ul>

{*
    <div id="paginator">
        <a href="/actions?page=1">&larr;</a>
        <ul class="pages-list">
            <li><a href="/actions?page=1">1</a></li>
            <li><a href="/actions?page=2" class="active">2</a></li>
            <li><a href="/actions?page=3">3</a></li>
        </ul>
        <a href="/actions?page=3">&rarr;</a>
    </div>
*}
{else}
<h1 class="heading">Ничего не найдено</h1>
{/if}

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