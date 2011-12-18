<article id="main-content">

<h1 class="heading">Компания {$company->title} <a href="{$this->url(['controller' => $controller, 'action' => 'index'])}">Все компании</a></h1>



<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3"><a href="{$this->url(['controller' => $controller,'action' => 'addAddress'])}">добавить адрес</a></td>
    </tr>

{if $addressList!==false}
    {foreach from=$addressList item=address}
        <tr>

            <td class="ttovar">{$address->city->title}</td>
            <td class="ttovar">{$address->address}</td>
            <td class="ttovar">{$address->phone}</td>
            <td class="tedit">
                    <a href="{$this->url(['controller' => $controller,'action' => 'editAddress', 'id' => $address->id])}">редактировать</a><br/>
                    <a href="{$this->url(['controller' => $controller,'action' => 'deleteAddress', 'id' => $address->id])}" onclick="return confirmDelete('{$address->id}');" style="color: #830000">удалить</a>
            </td>

        </tr>
    {/foreach}
{/if}

</table>

</article>