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


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    {*<script type="text/javascript" language="javascript" src="/js/jquery.js"></script>*}
    <script type="text/javascript" language="javascript" src="/js/jquery-ui.js"></script>
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
    <script type="text/javascript" src="/js/slider.js"></script>

    <script type="text/javascript" language="javascript" src="/js/func.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <!-- Google plusone -->
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>
<body>
<div id="page">
    <header>
        <a href="/"><h1 id="logo"><span>Ekonom.pro &mdash; Экономь профессионально.</span></h1></a>

        <div id="choose-city-form">
            <h4><label for="city_name">Выбрать город</label></h4>

            <form class="b-form" action="/choose-city" method="post">
                <select name="city_name" id="city_name">
                {if !empty($headCityList)}
                    {foreach from=$headCityList item=city}
                        <option value="{$city->id}" {if $city->id == $curCity}selected="selected"{/if} >{$city->title}</option>
                    {/foreach}
                {/if}
                </select>
            </form>
        </div>

        <div id="search-form">
            <h4><label for="search_query">Поиск по сайту</label></h4>

            <form action="/search" method="get">
                <fieldset>
                    <input type="text" name="query" id="search_query" placeholder="Я ищу:">
                    <input type="submit" value="Найти" id="submit">
                </fieldset>
            </form>
        </div>
    </header>

    <div id="content">
        <nav id="main-nav">
            <ul>
                <li><a href="/actions/">Акции</a></li>
                <li><a href="/sales/">Распродажи</a></li>
                <li><a href="/coupons/">Купоны</a></li>
                <li><a href="/company/">Компании</a></li>
                <li><a href="/about/">О нас</a></li>
                <li><a href="/contacts">Контактная информация</a></li>
            {if_allowed resource="city/index"}
                <li><a href="/city/">Города</a></li>
            {/if_allowed}
            {if_allowed resource="company/index"}
                <li><a href="/company/">Компании</a></li>
            {/if_allowed}
            {if_allowed resource="catalog/index"}
                <li><a href="/catalog/">Каталог</a></li>
            {/if_allowed}
            {if_allowed resource="user/index"}
                <li><a href="/user/">Пользователи</a></li>
            {/if_allowed}
            </ul>
        </nav>


        <div id="slider">

            <ul id="slides">
                <li class="slide">
                    <img src="/uploads/slide1.jpg" alt="Слайд №2">

                    <p class="description"><a href="http://yandex.ru">Абонемент на 1 занятие в неделю в спорткомплексе Олимпийский</a>.</p>
                </li>
                <li class="slide">
                    <img src="/uploads/slide1.jpg" alt="Слайд №1">

                    <p class="description"><a href="http://google.ru">Абонемент на 2 занятие в неделю в спорткомплексе Олимпийский</a>.</p>
                </li>
            </ul>
            <a href="#previous" class="previous"></a>
            <a href="#next" class="next"></a>

            <div id="shadow"></div>
        </div>

        <article id="main-content">

        {*
                {foreach from=$companyList item=company}
                    <div>{$company->title}</div>
                    {if $company->getAddressList() !== false}
                        {foreach from=$company->getAddressList() item=address}
                            {$address->city->title}, {$address->address} {$address->phone}<br/>
                        {/foreach}
                    {/if}
                    <br/>
                {/foreach}
        *}


        {$this->layout()->content}



            <aside>
                <div id="banners" class="clearfix">
                    <div class="banner size490_84">
                        <a href="http://yandex.ru"><img src="/uploads/banner.png"/></a>
                    </div>
                    <div class="banner size490_84">
                        <a href="http://yandex.ru"><img src="/uploads/banner.png"/></a>
                    </div>
                </div>

                <div id="share">
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
                    <script type="text/javascript">
                        plusone();
                    </script>
                </div>
            </aside>
        </article>
    </div>
</div>

<footer>
    <div id="footer-inner" class="clearfix">
        <p id="copyright">Ekonom.pro &copy; 2011</p>

        <p id="conditions"><a href="/conditions">Общие условия пользования сайтом</a></p>

        <div id="phone" class="nobr">+7 (3842) 33-86-86</div>
    </div>
</footer>
</body>
</html>