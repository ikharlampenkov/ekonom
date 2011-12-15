<div class="page"><h1>Компании</h1></div><br/>



<table width="100%">
    <tr>
        <td class="ttovar" align="center" colspan="3"><a href="{$this->url(['controller' => $controller,'action' => 'add'])}">добавить компанию</a></td>
    </tr>

{if $companyList!==false}
    {foreach from=$companyList item=company}
        <tr>
            <td class="ttovar">{$company->title}</td>
            <td class="ttovar">{$company->city->title}</td>
            <td class="tedit"><a href="{$this->url(['controller' => $controller,'action' => 'showAcl', 'idCompany' => $company->id])}">права</a></td>
            <td class="tedit">
                    <a href="{$this->url(['controller' => $controller,'action' => 'viewAddress', 'idcompany' => $company->id])}">адреса</a><br/>
                    <a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $company->id])}">редактировать</a><br/>
                    <a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $company->id])}" onclick="return confirmDelete('{$company->id}');" style="color: #830000">удалить</a>
            </td>

        </tr>
    {/foreach}
{/if}

</table>