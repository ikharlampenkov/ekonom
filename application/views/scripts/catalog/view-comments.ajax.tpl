{foreach from=$commentsList item=comment}
<li>
    <article class="comment">
        <header>{$comment->user}</header>
        <div class="content">
            {$comment->message}
        </div>
    </article>
</li>
{/foreach}