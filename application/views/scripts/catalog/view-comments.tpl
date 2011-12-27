<article id="main-content">

    <h1 class="heading">Продукт {$product->title} <a href="{$this->url(['controller' => $controller, 'action' => 'index', 'rubric' => $cur_rubric->getId()])}">Все акции</a></h1>


    <table>
        <tr>
            <td class="ttovar">Дата</td>
            <td class="ttovar">Пользователь</td>
            <td class="ttovar">Сообщение</td>
            <td class="ttovar">Модерация</td>
            <td class="ttovar">&nbsp;</td>
        </tr>
    {if $commentsList!==false}
        {foreach from=$commentsList item=comments}
            <tr>
                <td class="ttovar">{$comments->dateCreate|date_format:"%d.%m.%Y"}</td>
                <td class="ttovar">{$comments->user}</td>
                <td class="ttovar">{$comments->message}</td>
                <td class="ttovar">{$comments->isModerate}</td>

                <td class="tedit">

                    {if_allowed resource="{$controller}/editComments"}
                        <img src="/i/edit.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'editComments', 'idProduct' => $product->id, 'id' => $comments->id, 'rubric' => $cur_rubric->getId()])}">редактировать</a><br/>
                    {/if_allowed}

                    {if_allowed resource="{$controller}/deleteComments"}
                        <img src="/i/delete.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'deleteComments', 'idProduct' => $product->id, 'id' => $comments->id, 'rubric' => $cur_rubric->getId()])}" onclick="return confirmDelete('{$comments->title}');" style="color: #830000">удалить</a>
                    {/if_allowed}
                </td>
            </tr>
        {/foreach}
    {/if}
    </table>

</article>