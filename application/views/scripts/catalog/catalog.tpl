
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

{/if}
