<div style="background-color:#f0f0f0; padding:5px;"><h1>ЗАКАЗЫ</h1></div>

{if $action=='edit'}

    <h1>{$txt}</h1>

    <form action="?page={$page}&action={$action}&id={$order->id}" method="post">
        <table width="100%">
            <tr>
                <td class="ttovar">Пользователь</td>
                <td class="ttovar">{$order->user} {*<select name="data[user_login]" readonly="readonly">
                        {foreach from=$user_list item=user}
                            <option value="{$user.login}" {if $user.login==$order->user}selected="selected"{/if}>{$user.login}</option>
                        {/foreach}
                    </select>
                    *}
                </td>
            </tr>
            <tr>
                <td class="ttovar">Дата</td>
                <td class="ttovar">{$order->date|date_format:"%d.%m.%Y"} {*<input name="data[date]" value="{$order->date|date_format:"%d.%m.%Y"}" readonly="readonly" />*}</td>
            </tr>
            <tr>
                <td class="ttovar">Скидка</td>
                <td class="ttovar"><input name="data[discount]" value="{$order->discount}" /></td>
            </tr>
            <tr>
                <td class="ttovar">Статус заказа</td>
                <td class="ttovar"><select name="data[status]">
                        {foreach from=$status_list item=status}
                            <option value="{$status->id}" {if $status->id==$order->status->id}selected="selected"{/if}>{$status->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td class="ttovar">Завершeн</td>
                <td class="ttovar"><input type="checkbox" name="data[is_complite]" {if $order->isComplite}checked="checked"{/if} style="width:14px;" /></td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

    <h1>Товары</h1>

    {if $order->productList}

        <table width="100%">
            {foreach from=$order->productList item=product}
                <tr>
                    <td width="110" class="ttovar">{if $product.product->img->getName()}<img src="/files/{$product.product->img->getPreview()}" />{else}&nbsp;{/if}</td>
                    <td class="ttovar">{$product.product->title}</td>
                    <td class="ttovar">{$product.product->price}</td>
                    <td class="ttovar">{$product.count}</td>
                </tr>
            {/foreach}
            <tr>
                <td colspan="2" class="ttovar" align="right"><b>Итого</b></td>
                <td class="ttovar"><b>{$order->getSumm()}</b></td>
                <td class="ttovar">&nbsp;</td>
            </tr>
        </table>
    {/if}

{elseif $action=='add_status' || $action=="edit_status"}

    <h1>{$txt}</h1>

    <form action="?page={$page}&action={$action}{if $action=='edit_status'}&id={$status->id}{/if}" method="post">
        <table width="100%">
            <tr>
                <td width="200" class="ttovar" >Название</td>
                <td class="ttovar" ><input name="data[title]" value="{$status->title}" /></td>
            </tr>
            <tr>
                <td width="200" class="ttovar" >Порядок сортировкм</td>
                <td class="ttovar" ><input name="data[prior]" value="{$status->prior}" /></td>
            </tr>
            <tr>
                <td width="200" class="ttovar" >Цвет</td>
                <td class="ttovar" ><input name="data[color]" value="{$status->color}" /></td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>
    
{else}

{if $order_list}

        <table width="100%">
            <tr>
                <td class="ttovar">Логин</td>
                <td class="ttovar">Дата</td>
                <td class="ttovar">Сумма</td>
                <td class="ttovar">Скидка</td>
                <td class="ttovar">Cо скидкой</td>
                <td class="ttovar">Статус заказа</td>
                <td class="ttovar">&nbsp;</td>
            </tr>
            {foreach from=$order_list item=order}
                <tr>
                    <td {if $order->isComplite==0}class="ttovarred"{else}class="ttovar"{/if}>{$order->user}</td>
                    <td {if $order->isComplite==0}class="ttovarred"{else}class="ttovar"{/if}>{$order->date}</td>
                    <td {if $order->isComplite==0}class="ttovarred"{else}class="ttovar"{/if}>{$order->getSumm()}</td>
                    <td {if $order->isComplite==0}class="ttovarred"{else}class="ttovar"{/if}>{$order->discount}</td>
                    <td {if $order->isComplite==0}class="ttovarred"{else}class="ttovar"{/if}>{$order->getSummWithDiscount()}</td>
                    <td {if $order->isComplite==0}class="ttovarred"{else}class="ttovar"{/if}>{$order->status->title}</td>
                    <td class="tedit"><a href="?page={$page}&action=edit&id={$order->id}">открыть</a><br />
                                      <a href="?page={$page}&action=del&id={$order->id}" onclick="return confirmDelete('{$order->user} {$order->date}');" style="color: #830000">удалить</a> </td>
                </tr>
            {/foreach}
        </table>
    {/if}
    
    <table width="100%">
        <tr>
            <td colspan="5" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
                <a href="?page={$page}&action=add_status">добавить статус</a>
            </td>
        </tr>
        {if $status_list}
            {foreach from=$status_list item=status}
                <tr>
                    <td class="ttovar" >{$status->title}</td>
                    <td class="ttovar" >{$status->prior}</td>
                    <td class="ttovar" >{$status->color}</td>
                    <td class="tedit" ><a href="?page={$page}&action=edit_status&id={$status->getId()}">редактировать</a><br />
                        <a href="?page={$page}&action=del_status&id={$status->getId()}" onclick="return confirmDelete('{$status->title}');" style="color: #830000">удалить</a> </td>
                </tr>
            {/foreach}
        {/if}
    </table>

{/if}