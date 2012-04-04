<article id="main-content">

{if $authUserRole == 'admin'}

    <form action="{$this->url(['controller' => $controller, 'action' => 'index'])}" method="POST">
        <h1 class="heading">Новости</h1>

        {$ckeditorNews}
    {*<textarea name="dataabout[content]" style="width: 100%; height: 200px;">{$contentNews->content}</textarea>*}

        <input type="submit" value="Сохранить" class="button"/>

    </form>


    {else}

    <h1 class="heading">Новости</h1>

    <p>{$contentNews->content}</p>

{/if}