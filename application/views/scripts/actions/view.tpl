<!-- Этот блок должен отдаваться аяксом при нажатии на акцию -->
<div id="item" class="item-description">
    <h1 class="heading">Скидка на...</h1>

    <div class="inner">
        <div class="clearfix">
            <div class="gallery">
                    <div class="big-image">
                        <img src="/uploads/gallery.jpg" width="420" height="270" alt="Комментарий к первому фото" data-preview="/uploads/gallery_preview.jpg" />
                        <h5 class="title">Комментарий к первому фото</h5>
                        <a href="#previous" class="previous"></a>
                        <a href="#next" class="next"></a>
                    </div>

                    <ul class="previews clearfix">
                        <li>
                            <a href="/uploads/gallery1.jpg" title="Комментарий ко второму фото">
                                <img src="/uploads/gallery1_preview.jpg" alt="Превью второго фото" class="shadow-image"/>
                            </a>
                        </li>
                        <li>
                            <a href="/uploads/gallery2.jpg" title="Комментарий ко второму фото">
                                <img src="/uploads/gallery2_preview.jpg" alt="Превью второго фото" class="shadow-image"/>
                            </a>
                        </li>
                        <li>
                            <a href="/uploads/gallery3.jpg" title="Комментарий ко второму фото">
                                <img src="/uploads/gallery3_preview.jpg" alt="Превью второго фото" class="shadow-image"/>
                            </a>
                        </li>
                    </ul>
                </div>

            <article class="information">
                <section class="naming">
                    <h3>Название акции</h3>

                    <p>Условия и сроки проведения.</p>
                </section>

                <section class="description">
                    <h3>Краткое описание магазина или товара</h3>

                    <p>Prada – всемирно известный Дом Моды, выпускающий коллекции модной одежды и аксессуаров.</p>
                </section>

                <section class="discount clearfix">
                    <h5>Скидка: 70%</h5>
                    <ins class="new-price">1999 Р</ins>
                    <del class="old-price">9500 Р</del>
                </section>

                <section class="comments">
                    <h3>Комментарии</h3>
                    <ul class="comments-list">
                        <li>
                            <article class="comment">
                                <header>Я</header>
                                <div class="content">
                                    Отличные часы! Только жутко дорого, ага.
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="comment">
                                <header>Вася Пупкин</header>
                                <div class="content">
                                    Да ну нафиг! За такие смешные деньги не бывает швейцарских часов.
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="comment">
                                <header>Блондинко</header>
                                <div class="content">
                                    А мне нравятся парни со стильными часами:)
                                </div>
                            </article>
                        </li>
                    </ul>
                </section>
            </article>
        </div>

        <div class="controls">
            <a href="/reserve.html" class="button reserve">Отложить</a>

            <div class="clearfix">
                <a href="/share.html" class="button share-with-friend">Поделиться</a>

                <span class="share42">
                        <a target="_blank" title="Поделиться в Facebook" class="facebook" href="#" rel="nofollow"
                           onclick="window.open('http://www.facebook.com/sharer.php?u={ url }&amp;t={ title }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Добавить в Twitter" class="twitter" href="#" rel="nofollow"
                           onclick="window.open('http://twitter.com/share?text={ title }&amp;url={ url }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=550, height=440, toolbar=0, status=0');return false">
                        </a>
                        <a target="_blank" title="Поделиться В Контакте" class="vkontakte" href="#" rel="nofollow"
                           onclick="window.open('http://vkontakte.ru/share.php?url={ url }', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=200, top=200, width=554, height=421, toolbar=0, status=0');return false">
                        </a>
                    </span>

                <div id="plusone">
                    <g:plusone></g:plusone>
                </div>

                <a href="/add-comment.html" class="button add-comment">Комментировать</a>
            </div>
        </div>

        <!-- this block is expected by ajax-form.js -->
        <div id="form-placeholder">

        </div>
    </div>
</div>