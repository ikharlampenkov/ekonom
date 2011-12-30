<h1 class="heading">Добавить баннер</h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'add'])}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$banner->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Ссылка</td>
            <td class="ttovar"><input name="data[link]" value="{$banner->link}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Файл</td>
            <td class="ttovar"><input type="file" name="img"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>