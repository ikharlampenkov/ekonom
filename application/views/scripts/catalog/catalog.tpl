<div style="background-color:#f0f0f0; padding:5px;"><h1>КАТАЛОГ ТОВАРОВ</h1></div>

{if $action=='add_rubric' || $action=="edit_rubric"}

    <h1>{$txt}</h1>

    <form action="?page={$page}&action={$action}{if $action=='edit_rubric'}&id={$rubric->id}{/if}&rubric={$cur_rubric->getId()}" method="post">
        <table width="100%">
            <tr>
                <td width="200" class="ttovar" >Название</td>
                <td class="ttovar" ><input name="data[title]" value="{$rubric->title}" /></td>
            </tr>
            <tr>
                <td class="ttovar" >Рубрика</td>
                <td class="ttovar" ><select name="data[parent]">
                        {foreach from=$rubric_tree item=rub}
                            <option value="{$rub->id}" {if (isset($rubric) && $rub->id==$rubric->parent) || (!isset($rubric) && $rub->id==$cur_rubric->getId())}selected="selected"{/if}>{$rub->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>


{elseif $action=='add_product' || $action=='edit_product'}

    <h1>{$txt}</h1>

    <form action="?page={$page}&action={$action}{if $action=='edit_product'}&id={$product->id}{/if}&rubric={$cur_rubric->getId()}" method="post" enctype="multipart/form-data">
        <table width="100%">
            <tr>
                <td width="200" class="ttovar" >Название</td>
                <td class="ttovar" ><input name="data[title]" value="{$product->title}" /></td>
            </tr>
            <tr>
                <td class="ttovar" >Рисунок</td>
                <td class="ttovar" >{if isset($product) &&   $product->img->getName()}<img src="{$siteurl}files/{$product->img->getName()}" /><br />
                    &nbsp;<a href="?page={$page}&action=del_img&id={$product->id}&rubric={$cur_rubric->getId()}">удалить</a><br />{/if}
                    <input type="file"  name="img" /></td>
            </tr>
            <tr>
                <td class="ttovar" >Рубрика</td>
                <td class="ttovar" ><select name="data[rubric]">
                        {foreach from=$rubric_tree item=rub}
                            <option value="{$rub->id}" {if (isset($product) && $rub->id==$product->rubric->id)  || (!isset($product) && $rub->id==$cur_rubric->getId())}selected="selected"{/if}>{$rub->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td class="ttovar" >Цена</td>
                <td class="ttovar"><input id="price" name="data[price]" value="{$product->price}" onchange="checkNum('price');" /></td>
            </tr>
            <tr>
                <td class="ttovar" >Текст</td>
                <td class="ttovar"><textarea name="data[short_text]">{$product->shortText}</textarea></td>
            </tr>
            <tr>
                <td class="ttovar" >Полный текст</td>
                <td class="ttovar"><textarea name="data[full_text]">{$product->fullText}</textarea></td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

{else}

    {if $path}
        <div>
            {foreach from=$path item=prub name=_prub}
                <a href="?page={$page}&rubric={$prub->getId()}">{if !$prub->isRoot}{$prub->title}{else}<< Назад{/if}</a> {if !$smarty.foreach._prub.last}/{/if}
            {/foreach}
        </div>
    {/if}

    {if !$cur_rubric->isRoot}
        <h1>{$cur_rubric->title}</h1>
    {/if}

    {if $rubric_list}

        <table width="100%">
            <tr><td colspan="3" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle"><a href="?page={$page}&action=add_rubric&rubric={$cur_rubric->getId()}">добавить рубрику</a></td></tr>
            {foreach from=$rubric_list item=rubric}
                <tr>
                    <td class="ttovar" valign="middle"><a href="?page={$page}&rubric={$rubric->getId()}" class="rmenu">{$rubric->title}</a></td>
                    <td class="tedit"  valign="middle"><a href="?page={$page}&action=edit_rubric&id={$rubric->getId()}&rubric={$cur_rubric->getId()}" class="tedit">редактировать</a></td>
                    <td class="tdel"  valign="middle"><a href="?page={$page}&action=del_rubric&id={$rubric->getId()}&rubric={$cur_rubric->getId()}" onclick="return confirmDelete('{$rubric->title}');" style="color:#830000">удалить</a></td>
                </tr>
            {/foreach}
        </table>
    {/if}



    <table width="100%">
        <tr><td colspan="5" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle"><a href="?page={$page}&action=add_product&rubric={$cur_rubric->getId()}">добавить товар</a></td></tr>
        {if $product_list}
            {foreach from=$product_list item=product}
                <tr>
                    <td class="ttovar" >{if $product->img->getName()}<img src="/files/{$product->img->getPreview()}" />{else}&nbsp;{/if}</td>
                    <td class="ttovar" >{$product->title}</td>
                    <td class="ttovar" >{$product->shortText}</td>
                    <td class="ttovar" >{$product->price}</td>
                    <td class="tedit" ><a href="?page={$page}&action=edit_product&id={$product->getId()}&rubric={$cur_rubric->getId()}">редактировать</a><br />
                        <a href="?page={$page}&action=del_product&id={$product->getId()}&rubric={$cur_rubric->getId()}" onclick="return confirmDelete('{$product->title}');" style="color: #830000">удалить</a> </td>
                </tr>
            {/foreach}
        {/if}
    </table>

{/if}
