/**
 * Created by JetBrains PhpStorm.
 * User: Moris
 * Date: 17.11.11
 * Time: 22:45
 * To change this template use File | Settings | File Templates.
 */


function confirmDelete(name) {
    if (confirm("Вы подтверждаете удаление " + name + "?")) {
        return true;
    } else {
        return false;
    }
}

function comment_reply_on(id) {
    $('#replay_on_message').html($('#message_' + id).html());
    $('#parent').val(id);

    $('#replay_form').show();
    $('#add_form').hide();
}

$(document).ready(function () {
    company.createSubMenu();
    catalog.createSubMenu();

    /*
     $('ul.second-level').mouseout(function() {
     mainMenu.hideSubMenu();
     });
     */

    $('select#city_name').change(function () {
        $('select#city_name').val();
        $('#form_city_name').submit();
    });
});

$(document).ready(function () {

    $('#paginator a').live('click', function () {
        $.get($(this).attr('href'), function (response) {
            $('#product-list-place').empty().html(response);
            company.createSubMenu();
        });
        return false;
    });

});
