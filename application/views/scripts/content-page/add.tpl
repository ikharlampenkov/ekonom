<article id="main-content">

    <h1 class="heading">Добавить контентную страницу</h1>

{if isset($exception_msg)}
    <div>Ошибка: {$exception_msg}</div>
    <br/>
{/if}

    <form action="{$this->url(['controller' => $controller, 'action' => 'add'])}" method="post">
        <table width="100%">
            <tr>
                <td class="ttovar_title">Ключ</td>
                <td class="ttovar"><input name="data[page_title]" value="{$contentPage->pageTitle}"/></td>
            </tr>
            <tr>
                <td class="ttovar_title">Название</td>
                <td class="ttovar"><input name="data[title]" value="{$contentPage->title}"/></td>
            </tr>

            <tr>
                <td class="ttovar_title">Описание</td>
                <td class="ttovar">{$ckeditor} {*<textarea name="data[content]">{$contentPage->content}</textarea>*}</td>
            </tr>

        </table>
        <input id="save" name="save" type="submit" value="Сохранить"/>
    </form>

</article>