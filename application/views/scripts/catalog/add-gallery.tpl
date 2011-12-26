<article id="main-content">

    <h1 class="heading">Добавить фото</h1>

{if isset($exception_msg)}
<div>Ошибка: {$exception_msg}</div><br/>
{/if}

<form action="{$this->url(['controller' => $controller,'action' => 'addGallery', 'idCompany' => $company->id])}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td class="ttovar_title">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$gallery->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar_title">Файл</td>
            <td class="ttovar"><input type="file" name="file"/></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

</article>