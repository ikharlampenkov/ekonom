<!DOCTYPE html>
<html>
<head>
    <title>Ekonom.pro - Экономь профессионально.</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <!-- This script describes some html5 specific things for IE8- -->
    <!--[if lte IE 8]>
    <script type="text/javascript" src="/js/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui-timepicker-addon.css"/>
    <link rel="stylesheet" type="text/css" href="/css/cloud-zoom.css"/>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

{*<script type="text/javascript" language="javascript" src="/js/jquery.js"></script>*}
    <script type="text/javascript" language="javascript" src="/js/jquery-ui.js"></script>
    <script type="text/javascript" language="javascript" src="/js/jquery.timers.js"></script>
{*
<script type="text/javascript" language="javascript" src="/js/i18n/jquery.ui.datepicker-ru.js"></script>
<script type="text/javascript" language="javascript" src="/js/jquery-ui.timepicker.js"></script>
<script type="text/javascript" language="javascript" src="/js/i18n/jquery.ui.timepicker-ru.js"></script>
<script type="text/javascript" language="javascript" src="/js/jquery.form.js"></script>
*}

    <!-- fancybox assets -->
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.0.4" type="text/css" media="screen"/>
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.js?v=2.0.4"></script>

    <link rel="stylesheet" href="/css/main.css"/>
    <!-- Include last! It overrides default fancybox styles -->
    <script type="text/javascript" src="/js/ajax-form.js"></script>
    <!-- read comments in js files for better understanding of its purpose -->
    <script type="text/javascript" src="/js/gallery.js"></script>
{*
<script type="text/javascript" src="/js/slider.js"></script>
*}
    <script type="text/javascript" src="/js/easySlider1.7.js"></script>

    <script type="text/javascript" language="javascript" src="/js/func.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <script type="text/javascript" language="javascript" src="/js/cloud-zoom.1.0.2.js"></script>

    <script type="text/javascript" language="javascript" src="/js/share42.js"></script>

    <!-- Google plusone -->
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>
<body>
<div id="page">
    <header>
        <a href="/"><h1 id="logo"><span>Ekonom.pro &mdash; Экономь профессионально.</span></h1></a>

        <div id="choose-city-form">
            <h4><label for="city_name">Выбрать город</label></h4>

            <form id="form_city_name" class="b-form" action="/index/chooseCity" method="post">
                <select name="city_name" id="city_name">
                {if !empty($headCityList)}
                    {foreach from=$headCityList item=city}
                        {if_object_allowed type="City" object="{$city}" priv="moderate"}
                            <option value="{$city->id}" {if $city->id == $curCity}selected="selected"{/if} >{$city->title}</option>
                        {/if_object_allowed}
                    {/foreach}
                {/if}
                </select>
            </form>
        </div>

        <div id="search-form">

        {if $authUserRole != 'guest'}
            <div id="logout-link">
                Пользователь: {$authUser} <a href="{$this->url(['controller' => 'login', 'action' => 'logout'])}">Выход</a>
            </div>
        {/if}

            <h4><label for="search_query">Поиск по сайту</label></h4>

            <form action="/search" method="get">
                <fieldset>
                    <input type="text" name="query" id="search_query" placeholder="Я ищу:">
                    <input type="submit" value="Найти" id="submit">
                </fieldset>
            </form>
        </div>
    </header>

    <div id="content" class="clearfix">
        <nav id="main-nav">
            <ul>
                <li>
                    <a href="/catalog">Выбрать</a>
                    <ul class="first-level submenu">
                    {foreach from=$headRubricList item=rubric}
                        <li>
                            <a href="{$this->url(['controller' => 'catalog', 'action' => 'index', 'rubric' => $rubric->getId()])}">{$rubric->title}</a>
                            {if $rubric->hasChild()}
                                <ul class="submenu second-level">
                                {include file="catalog/child-block.tpl" subrubric=$rubric->getChild() controllerRub='catalog'}
                                </ul>
                            {/if}
                        </li>
                    {/foreach}
                    </ul>
                </li>
            {if_allowed resource="company/index"}
                <li><a href="/company/">Компании</a>
                    <ul class="first-level submenu">
                        {foreach from=$headRubricList item=rubric}
                            <li id="first_level_{$rubric->id}">
                                <a href="{$this->url(['controller' => 'company', 'action' => 'index', 'rubric' => $rubric->getId()])}">{$rubric->title}</a>
                                {if $rubric->hasChild()}
                                    <ul class="submenu second-level">
                                    {include file="catalog/child-block.tpl" subrubric=$rubric->getChild() controllerRub='company'}
                                    </ul>
                                {/if}
                            </li>
                        {/foreach}
                    </ul>
                </li>
            {/if_allowed}
                <li><a href="/about/">О нас</a></li>
                <li><a href="/distributionList/">Стать партнером</a></li>
            {if_allowed resource="city/index"}
                <li><a href="/city/">Города</a></li>
            {/if_allowed}
            {if_allowed resource="contentPage/index"}
                <li><a href="/contentPage/">Контентные страницы</a></li>
            {/if_allowed}
            {if_allowed resource="banner/index"}
                <li><a href="/banner/">Баннеры</a></li>
            {/if_allowed}
            {if_allowed resource="user/index"}
                <li><a href="/user/">Пользователи</a></li>
            {/if_allowed}
            </ul>
        </nav>
        <script type="text/javascript">
            $('#main-nav > ul > li:first-child').hover(
                    function () {
            $(this).closest('nav').css('borderRadius', '0 0 20px 0');
            }, function () {
            $(this).closest('nav').css('borderRadius', '0 0 20px 20px');
            }
            );
        </script>

    {$this->layout()->content}

    </div>


{*
{if $controller != 'index'}
    <a href="javascript:history.go(-1);" class="button back">Назад</a>
{/if}
*}

</div>

<footer>
    <div id="footer-inner" class="clearfix">
        <p id="copyright">Ekonom.pro &copy; 2011</p>

        <div id="conditions">
            <a href="/conditions">Общие условия пользования сайтом</a><br/>

        {*
        <!-- Yandex.Metrika informer -->
        <a href="http://metrika.yandex.ru/stat/?id=11564479&amp;from=informer" target="_blank" rel="nofollow">
            <img src="//bs.yandex.ru/informer/11564479/3_0_FFFFFFFF_EFEFEFFF_0_pageviews"
                 style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try { Ya.Metrika.informer( { i:this,id:11564479,type:0,lang:'ru' } );return false } catch(e) { } "/>
        </a>
        <!-- /Yandex.Metrika informer -->

        <!-- Yandex.Metrika counter -->
        <div style="display:none;">
            <script type="text/javascript">
                (function (w, c) {
                (w[c] = w[c] || []).push(function() {
                try {
                w.yaCounter11564479 = new Ya.Metrika( { id:11564479, enableAll: true, trackHash:true, webvisor:true } );
                }
                catch(e) { }
                });
                })(window, "yandex_metrika_callbacks");
            </script>
        </div>
        <script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
        <noscript>
            <div><img src="//mc.yandex.ru/watch/11564479" style="position:absolute; left:-9999px;" alt=""/></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->
        *}

            <!--LiveInternet counter-->
            <script type="text/javascript"><!--
            new Image().src = "//counter.yadro.ru/hit?r" +
                    escape(document.referrer) + ((typeof(screen) == "undefined") ? "" :
                    ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                            screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                    ";h" + escape(document.title.substring(0, 80)) +
                    ";" + Math.random();//-->
            </script>
            <!--/LiveInternet-->

            <!--LiveInternet logo-->
            <a href="http://www.liveinternet.ru/click" target="_blank"><img src="//counter.yadro.ru/logo?44.1" title="LiveInternet"
                                                                            alt="" border="0" width="31" height="31"/></a>
            <!--/LiveInternet-->

        </div>

        <div id="phone" class="nobr">{$bottomCityNumber}{*+7 (3842) 33-86-86*}</div>
    </div>
</footer>
</body>
</html>