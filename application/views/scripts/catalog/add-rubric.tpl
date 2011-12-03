<div class="page"><h1>Добавить рубрику</h1></div><br/>

<form action="{$this->url(['controller' => $controller, 'action' => 'addRubric', 'rubric' => $cur_rubric->getId()])}" method="post">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$rubric->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar">Рубрика</td>
            <td class="ttovar"><select name="data[parent]">
            {foreach from=$rubric_tree item=rub}
                <option value="{$rub->id}" {if $rub->id==$rubric->parent->id}selected="selected"{/if}>{$rub->title}</option>
            {/foreach}
            </select>
            </td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>