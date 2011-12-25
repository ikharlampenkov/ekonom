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

    <div id="content" class="clearfix">
        <nav id="main-nav">
            <ul>
                <li>
                    <a href="/offers">Выбрать</a>
                    <ul class="first-level submenu">
                    {foreach from=$headRubricList item=rubric}
                        <li>
                            <a href="{$this->url(['controller' => 'catalog', 'action' => 'index', 'rubric' => $rubric->getId()])}">{$rubric->title}</a>
                        {*<ul class="submenu second-level"></ul>*}
                        </li>

                    {/foreach}
                        <li><a href="/companies/auto">Автомобили</a></li>
                        <li>
                            <a href="/companies/clothes">Одежда</a>
                            <ul class="submenu second-level">
                                <li>
                                    <a href="/companies/clothes/men">Мужская одежда</a>
                                    <ul class="submenu third-level">
                                        <li><a href="/companies/clothes/teenagers/shoes">Обувь</a></li>
                                        <li><a href="/companies/clothes/teenagers/jeans">Джинсы</a></li>
                                        <li><a href="/companies/clothes/teenagers/sports">Спортивная одежда</a></li>
                                    </ul>
                                </li>
                                <li><a href="/companies/clothes/women">Женская одежда</a></li>
                                <li><a href="/companies/clothes/children">Детская одежда</a></li>
                                <li>
                                    <a href="/companies/clothes/teenagers">Одежда для подростков</a>
                                    <ul class="submenu third-level">
                                        <li><a href="/companies/clothes/teenagers/shoes">Обувь</a></li>
                                        <li><a href="/companies/clothes/teenagers/jeans">Джинсы</a></li>
                                        <li><a href="/companies/clothes/teenagers/sports">Спортивная одежда</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/companies/household">Бытовая техника</a></li>
                        <li><a href="/companies/computers">Компьютеры</a></li>
                        <li><a href="/companies/food">Продукты питания</a></li>
                    </ul>
                </li>
                <li><a href="/company/">Компании</a>
                    <ul class="first-level submenu">
                    {foreach from=$headRubricList item=rubric}
                        <li id="first_level_{$rubric->id}">
                            <a href="{$this->url(['controller' => 'company', 'action' => 'index', 'rubric' => $rubric->getId()])}">{$rubric->title}</a>
                            {if $rubric->hasChild()}
                                <ul class="submenu second-level">
                                {include file="catalog/child-block.tpl" subrubric=$rubric->getChild()}
                                </ul>
                            {/if}
                        </li>

                    {/foreach}

                    </ul>
                </li>
                <li><a href="/about/">О нас</a></li>
            {if_allowed resource="city/index"}
                <li><a href="/city/">Города</a></li>
            {/if_allowed}
            {if_allowed resource="company/index"}
                <li><a href="/company/">Компании</a></li>
            {/if_allowed}
            {if_allowed resource="catalog/index"}
                <li><a href="/catalog/">Каталог</a></li>
            {/if_allowed}
            {if_allowed resource="contentPage/index"}
                <li><a href="/contentPage/">Контентные страницы</a></li>
            {/if_allowed}
            {if_allowed resource="user/index"}
                <li><a href="/user/">Пользователи</a></li>
            {/if_allowed}
            </ul>
        </nav>

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

        <p id="conditions"><a href="/conditions">Общие условия пользования сайтом</a></p>

        <div id="phone" class="nobr">+7 (3842) 33-86-86</div>
    </div>
</footer>
</body>
</html>