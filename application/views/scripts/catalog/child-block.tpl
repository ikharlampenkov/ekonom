{foreach from=$subrubric item=rubric}
<li id="first_level_{$rubric->id}">
    <a href="{$this->url(['controller' => $controllerRub, 'action' => 'index', 'rubric' => $rubric->getId()])}">{$rubric->title}</a>
    {if $rubric->hasChild()}
        <ul class="submenu third-level">
        {include file="catalog/child-block.tpl" subrubric=$rubric->getChild() controllerRub=$controllerRub}
        </ul>
    {/if}
</li>

{/foreach}