<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="{$description}"/>
    <meta name="keywords" content="{$keywords}"/>
    <meta name="author-corporate" content=""/>
    <meta name="publisher-email" content=""/>

    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <script type="text/javascript" language="javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <title>{$title}</title>

</head>

<body>

<table style="width: 100%; height: 100%;" cellpadding="0" cellspacing="0" border="1" align="center">
    <tr>
        <td style="height: 60px;">

            <table style="height: 60px;">
                <tr>
                    <td></td>
                    <td style="width: 300px; vertical-align: middle;">Выберите город:
                        <select id="selectCity">
                        {if !empty($cityList)}
                            {foreach from=$cityList item=city}
                                <option value="{$city->id}">{$city->title}</option>
                            {/foreach}
                        {/if}

                        </select>
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

                        <table border="0" cellpadding="10" cellspacing="10" width="100%" height="100%">
                            <tr>
                                <td><h1>Меню:</h1></td>
                            </tr>

                        </table>

                    </td>
                    <td>

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
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>


</body>
</html>
