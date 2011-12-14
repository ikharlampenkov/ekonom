<!DOCTYPE html>
<html>
<head>
    <title>Ekonom.pro - сайт.</title>
    <link rel="stylesheet" href="/css/main2.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <script type="text/javascript" src="/js/html5.js"></script>
    <script type="text/javascript" src="/js/share42.js"></script>
</head>
<body>
<div id="page">
    <header>
        <h1 id="logo"><span>Ekonom.pro &mdash; мегавъебенный сайт</span></h1>

        <div id="choose-city-form">
            <h4><label for="city_name">Выбрать город</label></h4>

            <form class="b-form" action="/choose-city" method="post">
                <select name="city_name" id="city_name">
                {if !empty($cityList)}
                    {foreach from=$cityList item=city}
                        <option value="{$city->id}">{$city->title}</option>
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
                <li><a href="/actions">Акции</a></li>
                <li><a href="/sales">Распродажи</a></li>
                <li><a href="/coupons">Купоны</a></li>
                <li><a href="/companies">Компании</a></li>
                <li><a href="/about">О нас</a></li>
                <li><a href="/contacts">Контактная информация</a></li>
            </ul>
        </nav>

        <div id="slider">

            <ul id="slides">
                <li class="slide">
                    <h3>Большой теннис<br/> 300Р в месяц</h3>
                    <img src="/i/slide1.jpg" alt="Слайд №1">

                    <p class="description">Абонемент на 1 занятие в неделю в спорткомплексе Олимпийский.</p>
                </li>
                <!--
                <li class="slide">
                    <h3>Большой теннис<br/> 300Р в месяц</h3>
                    <img src="/i/slide1.jpg" alt="Слайд №1">

                    <p class="description">Абонемент на 1 занятие в неделю в спорткомплексе Олимпийский.</p>
                </li>-->
            </ul>
            <a href="#previous" class="previous"></a>
            <a href="#next" class="next"></a>

            <div id="shadow"></div>
        </div>

        <article id="main-content">

        {foreach from=$companyList item=company}
            <div>{$company->title}</div>
            {if $company->getAddressList() !== false}
                {foreach from=$company->getAddressList() item=address}
                    {$address->city->title}, {$address->address} {$address->phone}<br/>
                {/foreach}
            {/if}
            <br/>
        {/foreach}

        {*
        {$this->layout()->content}
        *}

            <h1 class="heading">Акции города</h1>

            <ul id="actions" class="clearfix">
                <li>
                    <h3><a href="/actions/1">Телефон LG Prada</a></h3>
                    <img src="/uploads/action1.png" alt=""></li>
                <li>
                    <h3><a href="/actions/2">Суперджинсы</a></h3>
                    <img src="/uploads/action2.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/3">Башмаки со скидкой</a></h3>
                    <img src="/uploads/action3.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/1">Телефон LG Prada</a></h3>
                    <img src="/uploads/action1.png" alt=""></li>
                <li>
                    <h3><a href="/actions/2">Суперджинсы</a></h3>
                    <img src="/uploads/action2.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/3">Башмаки со скидкой</a></h3>
                    <img src="/uploads/action3.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/1">Телефон LG Prada</a></h3>
                    <img src="/uploads/action1.png" alt=""></li>
                <li>
                    <h3><a href="/actions/2">Суперджинсы</a></h3>
                    <img src="/uploads/action2.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/3">Башмаки со скидкой</a></h3>
                    <img src="/uploads/action3.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/1">Телефон LG Prada</a></h3>
                    <img src="/uploads/action1.png" alt=""></li>
                <li>
                    <h3><a href="/actions/2">Суперджинсы</a></h3>
                    <img src="/uploads/action2.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/3">Башмаки со скидкой</a></h3>
                    <img src="/uploads/action3.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/1">Телефон LG Prada</a></h3>
                    <img src="/uploads/action1.png" alt=""></li>
                <li>
                    <h3><a href="/actions/2">Суперджинсы</a></h3>
                    <img src="/uploads/action2.jpg" alt=""></li>
                <li>
                    <h3><a href="/actions/3">Башмаки со скидкой</a></h3>
                    <img src="/uploads/action3.jpg" alt=""></li>
            </ul>

            <div id="paginator">
                <a href="/actions?page=1">&larr;</a>
                <ul class="pages-list">
                    <li><a href="/actions?page=1">1</a></li>
                    <li><a href="/actions?page=2" class="active">2</a></li>
                    <li><a href="/actions?page=3">3</a></li>
                </ul>
                <a href="/actions?page=3">&rarr;</a>
            </div>

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
            </aside>
        </article>
    </div>
</div>

<footer>
    <div id="footer-inner" class="clearfix">
        <p id="copyright">Ekonom.pro &copy; 2011</p>

        <p id="conditions"><a href="/conditions">Общие условия пользования сайтом</a></p>

        <div id="phone" class="nobr"><span>+7 (3842) 77 77 77</span></div>
    </div>
</footer>
</body>
</html>