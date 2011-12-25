{foreach from=$subrubric item=rubric}
<li id="first_level_{$rubric->id}">
    <a href="{$this->url(['controller' => 'company', 'action' => 'index', 'rubric' => $rubric->getId()])}">{$rubric->title}</a>
    {if $rubric->hasChild()}
        <ul class="submenu third-level">
        {include file="catalog/parent-block.tpl" subrubric=$rubric->getChild()}
        </ul>
    {/if}
</li>

{/foreach}