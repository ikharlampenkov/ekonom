<article id="main-content">

{if $authUserRole == 'admin'}

    <form action="{$this->url(['controller' => $controller, 'action' => 'index'])}" method="POST">
        <h1 class="heading">О нас</h1>

        {$ckeditorAbout}
        {*<textarea name="dataabout[content]" style="width: 100%; height: 200px;">{$contentAbout->content}</textarea>*}

        <h1 class="heading">Контактная информация</h1>

        {$ckeditorContacts} {*<textarea name="datacontacts[content]" style="width: 100%; height: 200px;">{$contentContacts->content}</textarea>*}

        <input type="submit" value="Сохранить" class="button"/>

    </form>


    {else}

    <h1 class="heading">О нас</h1>

    <p>{$contentAbout->content}</p>

    <h1 class="heading">Контактная информация</h1>

    <p>{$contentContacts->content}</p>
{/if}



{*

<p>Постиндустриализм представляет собой прагматический гуманизм (терминология М.Фуко). Важным для нас является указание Маклюэна на то, что капиталистическое мировое общество приводит институциональный коммунизм, подчеркивает президент. Постиндустриализм обретает референдум, впрочем, это несколько расходится с концепцией Истона. Понятие политического участия, согласно традиционным представлениям, ограничивает гносеологический марксизм, подчеркивает президент. Тоталитарный тип политической
    культуры неравномерен. Конфедерация вероятна.

<p>

<h3>Списочек</h3>
<ul>
    <li>Первый пункт</li>
    <li>Второй пункту</li>
    <li>Третий пункт
        <ol>
            <li>Пункт №1</li>
            <li>Пункт №2</li>
        </ol>
    </li>
</ul>

<table>
    <caption>Заголовок таблицы</caption>
    <thead>
    <tr>
        <th>Столбец 1</th>
        <th>Столбец2</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan=2>Итого: 2000</td>
    </tr>
    </tfoot>
    <tbody>
    <tr>
        <th>фывочка</th>
        <td>4</td>
    </tr>
    <tr>
        <th>asdjxrf</th>
        <td>2</td>
    </tr>
    </tbody>
</table>

<blockquote>
    <p>С тобой я готов был бежать на край света...</p>
</blockquote>

<p>Как уже отмечалось, политические учения Гоббса иллюстрирует механизм власти, хотя на первый взгляд, российские власти тут ни при чем. Политическая модернизация, однако, сохраняет экзистенциальный субъект власти, что неминуемо повлечет эскалацию напряжения в стране. Харизматическое лидерство доказывает марксизм, последнее особенно ярко выражено в ранних работах В.И.Ленина. Структура политической науки существенно доказывает плюралистический христианско-демократический национализм (отметим,
    что это особенно важно для гармонизации политических интересов и интеграции общества). Согласно теории Э.Тоффлера ("Шок будущего"), авторитаризм интегрирует онтологический кризис легитимности, о чем будет подробнее сказано ниже. Политическое манипулирование приводит прагматический элемент политического процесса (отметим, что это особенно важно для гармонизации политических интересов и интеграции общества).</p>

<p>Разновидность тоталитаризма иллюстрирует бихевиоризм, что было отмечено П.Лазарсфельдом. Политическая модернизация ограничивает идеологический социализм, утверждает руководитель аппарата Правительства. Международная политика, с другой стороны, иллюстрирует марксизм, хотя на первый взгляд, российские власти тут ни при чем. Либерализм теоретически интегрирует институциональный либерализм, что было отмечено П.Лазарсфельдом. По сути, марксизм иллюстрирует современный бихевиоризм, что
    неминуемо повлечет эскалацию напряжения в стране</p>

<h4>Стили для форм по умолчанию</h4>

<form action="/submit.php" method="POST" class="b-form">
    <fieldset class="main">
        <div class="field required">
            <label for="text_field">Текстовое поле</label>
            <input type="text" id="text_field" name="text_field" required="required"/>

            <p class="help">Подсказка</p>
        </div>
        <div class="field required">
            <label for="email_field">Электронная почта</label>
            <input type="email" name="email_field" id="email_field" required="required">
        </div>
        <div class="field">
            <label for="select_field">Выпадающий список</label>
            <select name="select_field" id="select_field">
                <option selected="selected" value="1">Кемерово</option>
                <option value="2">Новосибирск</option>
                <option value="3">Новороссийск</option>
            </select>
        </div>
        <div class="field">
            <label for="textarea_field">Большое текстовое поле</label>
            <textarea name="textarea_field" id="textarea_field" cols="30" rows="4"></textarea>
        </div>
    </fieldset>
    <fieldset class="submit">
        <input type="submit" value="Отправить" class="button"/>
    </fieldset>
</form>

*}

</article>