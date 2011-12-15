<div class="page"><h1>Редактировать товар</h1></div><br/>

<form action="{$this->url(['controller' => $controller,'action' => 'edit', 'rubric' => $cur_rubric->getId()])}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$product->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar">Компания</td>
            <td class="ttovar"><select name="data[company]">
            {if $companyList!==false}
                {foreach from=$companyList item=company}
                    <option value="{$company->id}" {if $company->id==$product->company->id}selected="selected"{/if}>{$company->title}</option>
                {/foreach}
            {/if}
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar">Рисунок</td>
            <td class="ttovar">{if isset($product) &&   $product->img->getName()}<img src="{$siteurl}files/{$product->img->getName()}"/><br/>
                &nbsp;<a href="?page={$page}&action=del_img&id={$product->id}&rubric={$cur_rubric->getId()}">удалить</a><br/>{/if}
                <input type="file" name="img"/></td>
        </tr>
        <tr>
            <td class="ttovar">Рубрика</td>
            <td class="ttovar"><select name="data[rubric]">
            {foreach from=$rubric_tree item=rub}
                <option value="{$rub->id}" {if $rub->id==$product->rubric->id}selected="selected"{/if}>{$rub->title}</option>
            {/foreach}
            </select>
            </td>
        </tr>
        <tr>
            <td class="ttovar">Цена</td>
            <td class="ttovar"><input id="price" name="data[price]" value="{$product->price}" onchange="checkNum('price');"/></td>
        </tr>
        <tr>
            <td class="ttovar">Текст</td>
            <td class="ttovar"><textarea name="data[short_text]">{$product->shortText}</textarea></td>
        </tr>
        <tr>
            <td class="ttovar">Полный текст</td>
            <td class="ttovar"><textarea name="data[full_text]">{$product->fullText}</textarea></td>
        </tr>

    {if $attributeHashList!==false}
        {foreach from=$attributeHashList item=attributeHash}
            <tr>
                <td class="ttovar_title">{$attributeHash->title}</td>
                <td class="ttovar">{$attributeHash->type->getHTMLFrom($attributeHash, $product)}{*<input name="data[attribute][{$attributeHash->attributeKey}]" value="{if $task->searchAttribute($attributeHash->attributeKey)}{$task->getAttribute($attributeHash->attributeKey)->value}{/if}"/>*}</td>
            </tr>
        {/foreach}
    {/if}

    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>