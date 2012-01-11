<article id="main-content">

<h1 class="heading">Площадки</h1>


{if_allowed resource="{$controller}/add"}
    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller, 'action' => 'addPlace'])}">добавить площадку</a>
    </div>
{/if_allowed}

    <tr>
        </td>
    </tr>

    <table width="100%">
{if $placeList!==false}
    {foreach from=$placeList item=place}
        <tr>

            <td class="ttovar">{$place->title}</td>
            <td class="ttovar">{$place->width}</td>
            <td class="ttovar">{$place->height}</td>
            <td class="ttovar">{$place->changeTime}</td>
            <td class="tedit">
                <a href="{$this->url(['controller' => $controller,'action' => 'placemark', 'id' => $place->id])}">размещение</a><br/>
                    <a href="{$this->url(['controller' => $controller,'action' => 'editPlace', 'id' => $place->id])}">редактировать</a><br/>
                    <a href="{$this->url(['controller' => $controller,'action' => 'deletePlace', 'id' => $place->id])}" onclick="return confirmDelete('{$place->title}');" style="color: #830000">удалить</a>
            </td>

        </tr>
    {/foreach}
{/if}

</table>

</article>