{foreach from=$rubricList item=rubric}
<li id="second_level_{$rubric->id}" onmouseover="mainMenu.showSubMenu('{$this->url(['controller' => 'catalog', 'action' => 'viewSubMenu', 'rubric' => $rubric->id])}', {$rubric->id})">
    <a href="{$this->url(['controller' => 'catalog', 'action' => 'index', 'rubric' => $rubric->getId()])}">{$rubric->title}</a>
    <ul class="submenu third-level"></ul>
</li>

{/foreach}