<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="{$description}"/>
    <meta name="keywords" content="{$keywords}"/>
    <meta name="author-corporate" content=""/>
    <meta name="publisher-email" content=""/>

    <link rel="stylesheet" type="text/css" href="/css/main2.css"/>
    <script type="text/javascript" language="javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <title>{$title}</title>

</head>

<body>

<table style="width: 100%; height: 100%;" cellpadding="0" cellspacing="0" border="0" align="center">
    <tr>
        <td style="height: 60px; vertical-align: top;">

            <table style="width: 100%; height: 60px; background-color:#69aefc;">
                <tr>
                    <td style="padding-left: 25px; vertical-align: middle;"><a href="/" style="color: #ffffff; text-decoration: none; font-size: 26px;">{$title}</a></td>
                    <td width="300" valign="middle" style="color:white">
                        Пользователь: {$authUser} &nbsp; / &nbsp; <a href="/login/logout/" style="color:black">Выйти</a>
                    </td>
                </tr>
            </table>


        </td>
    </tr>
    <tr>
        <td>

            <table border="0" cellpadding="20" width="100%">
                <tr>
                    <td width="230">

                        <table border="0" cellpadding="10" cellspacing="10" width="100%" height="100%"
                               style="background-color:#f0f0f0">
                            <tr>
                                <td><h1>Меню:</h1></td>
                            </tr>

                        {if_allowed resource="city/index"}
                            <tr>
                                <td><a href="/city/" class="menu">Города</a></td>
                            </tr>
                        {/if_allowed}
                        {if_allowed resource="company/index"}
                            <tr>
                                <td><a href="/company/" class="menu">Компании</a></td>
                            </tr>
                        {/if_allowed}
                        {if_allowed resource="catalog/index"}
                            <tr>
                                <td><a href="/catalog/" class="menu">Каталог</a></td>
                            </tr>
                        {/if_allowed}
                        {if_allowed resource="user/index"}
                            <tr>
                                <td><a href="/user/" class="menu">Пользователи</a></td>
                            </tr>
                        {/if_allowed}

                        </table>

                    </td>
                    <td>
                    {$this->layout()->content}
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>


</body>
</html>
