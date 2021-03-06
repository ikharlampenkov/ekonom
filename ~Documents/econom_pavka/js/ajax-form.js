/**
 * This file consists of click handlers for buttons situated on item.html fancybox
 * This file MUST be loaded to every page where this fancybox can appear
 *
 * CAUTION: YOU NEED TO DEFINE SUCCESSFUL SUBMIT HANDLER ON ROW 28
 */
$(document).ready(function() {
    // This handler catches all clicks on buttons which should create forms
    $('.reserve, .share-with-friend, .add-comment').live('click', function() {
        $.get($(this).attr('href'), function(response) {
            $('#form-placeholder').empty().append(response);
        });

        return false;
    });

    // submit is 'live' event since jQuery 1.4
    // This handler fires when form in placeholder is submitted
    $('#form-placeholder .b-form').live('submit', function() {
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function(response) {
            // Response consists of form. We need to replace our form form with returned
            // It means that user made some mistakes while submitting the form
            if ($(response).find('.b-form').length > 0) {
                form.find('fieldset.main').replaceWith($(response).find('fieldset.main'));
            }
            else {
                // Handle successful submit whatever you need
            }
        });

        return false;
    });
});