<article id="main-content">

    <h1 class="heading">Компании</h1>


{if_allowed resource="{$controller}/add"}
    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'add'])}">добавить компанию</a>
    </div>
{/if_allowed}

    <ul id="companies" class="clearfix">
    {if $companyList!==false}
        {foreach from=$companyList item=company}
            {if_object_allowed type="{$controller|capitalize}" object="{$company}" priv="moderate"}
                <li>
                    <h3><a href="{$this->url(['controller' => $controller,'action' => 'view', 'id' => $company->id])}" class="various fancybox.ajax">{$company->title}</a></h3>
                    <a href="{$this->url(['controller' => $controller,'action' => 'view', 'id' => $company->id])}" class="various fancybox.ajax"><img src="/files/{$company->file->getName()}" alt="{$company->title}"></a>

                    <div class="discount">A</div>

                    <ul id="company_action_{$company->id}" class="company_action_menu">

                        {if_allowed resource="{$controller}/viewAddress"}
                            <li class="action"><a href="{$this->url(['controller' => $controller,'action' => 'viewGallery', 'idCompany' => $company->id])}">галерея</a></li>
                        {/if_allowed}

                        {if_allowed resource="{$controller}/viewAddress"}
                            <li class="action"><a href="{$this->url(['controller' => $controller,'action' => 'viewAddress', 'idcompany' => $company->id])}">адреса</a></li>
                        {/if_allowed}

                        {if_allowed resource="{$controller}/showAcl"}
                            <li class="action"><a href="{$this->url(['controller' => $controller,'action' => 'showAcl', 'idCompany' => $company->id])}">права</a></li>
                        {/if_allowed}

                        {if_allowed resource="{$controller}/edit"}
                            <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $company->id])}">редактировать</a></li>
                        {/if_allowed}

                        {if_allowed resource="{$controller}/delete"}
                            <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $company->id])}" onclick="return confirmDelete('{$company->id}');" style="color: #830000">удалить</a></li>
                        {/if_allowed}
                    </ul>


                </li>
            {/if_object_allowed}
        {/foreach}
    {/if}
    </ul>
</article>


{*
<li>
    <h3><a href="/item.html" class="various fancybox.ajax">Телефон LG Prada</a></h3>
    <img src="/uploads/action1.png" alt="">

    <div class="discount">20%</div>
</li>
*}


{*
<table width="100%">

{if $companyList!==false}
    {foreach from=$companyList item=company}
        {if_object_allowed type="{$controller|capitalize}" object="{$company}" priv="moderate"}
            <tr>
                <td class="ttovar">{$company->title}</td>
                <td class="ttovar">{$company->city->title}</td>
                {if_allowed resource="{$controller}/showAcl"}
                    <td class="tedit"><a href="{$this->url(['controller' => $controller,'action' => 'showAcl', 'idCompany' => $company->id])}">права</a></td>
                {/if_allowed}
                <td class="tedit">
                    {if_allowed resource="{$controller}/viewAddress"}
                        <a href="{$this->url(['controller' => $controller,'action' => 'viewAddress', 'idcompany' => $company->id])}">адреса</a><br/>
                    {/if_allowed}
                    {if_allowed resource="{$controller}/edit"}
                        <a href="{$this->url(['controller' => $controller,'action' => 'edit', 'id' => $company->id])}">редактировать</a><br/>
                    {/if_allowed}
                    {if_allowed resource="{$controller}/delete"}
                        <a href="{$this->url(['controller' => $controller,'action' => 'delete', 'id' => $company->id])}" onclick="return confirmDelete('{$company->id}');" style="color: #830000">удалить</a>
                    {/if_allowed}
                </td>

            </tr>
        {/if_object_allowed}
    {/foreach}
{/if}

</table>
*}