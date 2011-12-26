<article id="main-content">

    <h1 class="heading">Компания {$company->title} <a href="{$this->url(['controller' => $controller, 'action' => 'index'])}">Все компании</a></h1>


{if_allowed resource="{$controller}/addGallery"}
    <div class="sub-menu">
        <img src="/i/add.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'addGallery', 'idCompany' => $company->id])}">добавить фото</a>
    </div>
{/if_allowed}

    <ul id="gallery" class="clearfix">
    {if $galleryList!==false}
        {foreach from=$galleryList item=gallery}
                <li>
                    <h3><a href="#">{$gallery->title}</a></h3> {* <a href="{$this->url(['controller' => $controller,'action' => 'view', 'id' => $gallery->id])}" class="various fancybox.ajax">{$gallery->title}</a> *}
                    <img src="/gallery{$gallery->file->getSubPath()}/{$gallery->file->getPreview()}" alt="{$gallery->title}">

                    <div class="discount">A</div>

                    <ul id="gallery_action_{$gallery->id}" class="gallery_action_menu">

                        {if_allowed resource="{$controller}/editGallery"}
                            <li class="action"><img src="/i/edit.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'editGallery', 'idCompany' => $company->id, 'id' => $gallery->id])}">редактировать</a></li>
                        {/if_allowed}

                        {if_allowed resource="{$controller}/deleteGallery"}
                            <li class="action"><img src="/i/delete.png"/>&nbsp;<a href="{$this->url(['controller' => $controller,'action' => 'deleteGallery', 'idCompany' => $company->id, 'id' => $gallery->id])}" onclick="return confirmDelete('{$gallery->title}');" style="color: #830000">удалить</a></li>
                        {/if_allowed}
                    </ul>
                </li>
        {/foreach}
    {/if}
    </ul>

</article>