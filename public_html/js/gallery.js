/**
 * This file makes some interaction for gallery widget on shop's page and action's fancybox
 * It MUST be loaded in all page when gallery can appear
 *
 * CAUTION: This script expects that there is ONLY ONE .gallery on the page
 */
$(document).ready(function () {
    $('.gallery .previews a').live('click', function () {
        var current_preview = $('.gallery .big-image img').attr('data-preview');
        var current_title = $('.gallery .big-image .title').text();
        var current_image = $('.gallery .big-image img').attr('src');

        var new_preview = $(this).find('img').attr('src');
        var new_title = $(this).attr('title');
        var new_image = $(this).attr('href');

        $('.gallery .big-image #zoom').attr('href', new_image);
        $('.gallery .big-image img').attr('src', new_image).attr('data-preview', new_preview);
        if ($('.gallery .big-image h5 a').length > 0) {
            $('.gallery .big-image h5 a').empty().append(new_title);
        } else {
            $('.gallery .big-image h5').empty().append(new_title);
        }


        $(this).attr('title', current_title).attr('href', current_image).find('img').attr('src', current_preview);
        $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();

        return false;
    });

    $('.gallery .next').live('click', function () {
        var current_preview = $('.gallery .big-image img').attr('data-preview');
        var current_title = $('.gallery .big-image .title').text();
        var current_image = $('.gallery .big-image img').attr('src');


        var first_item = $('.gallery .previews li:first-child');
        var new_preview = first_item.find('img').attr('src');
        var new_title = first_item.find('a').attr('title');
        var new_image = first_item.find('a').attr('href');
        $('.gallery .big-image #zoom').attr('href', new_image);
        $('.gallery .big-image img').attr('src', new_image);
        $('.gallery .big-image img').attr('data-preview', new_preview);
        if ($('.gallery .big-image h5 a').length > 0) {
            $('.gallery .big-image h5 a').empty().append(new_title);
        } else {
            $('.gallery .big-image h5').empty().append(new_title);
        }

        $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();

        first_item.remove();
        $('.previews').append($('<li><a href="' + current_image + '" title="' + current_title + '"><img src="' + current_preview + '" alt="" class="shadow-image" /></a></li>'));

        return false;
    });

    $('.gallery .previous').live('click', function () {
        var current_preview = $('.gallery .big-image img').attr('data-preview');
        var current_title = $('.gallery .big-image .title').text();
        var current_image = $('.gallery .big-image img').attr('src');


        var last_item = $('.gallery .previews li:last-child');
        var new_preview = last_item.find('img').attr('src');
        var new_title = last_item.find('a').attr('title');
        var new_image = last_item.find('a').attr('href');

        $('.gallery .big-image #zoom').attr('href', new_image);
        $('.gallery .big-image img').attr('src', new_image);
        $('.gallery .big-image img').attr('data-preview', new_preview);
        if ($('.gallery .big-image h5 a').length > 0) {
            $('.gallery .big-image h5 a').empty().append(new_title);
        } else {
            $('.gallery .big-image h5').empty().append(new_title);
        }

        $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();

        last_item.remove();
        $('.previews').prepend($('<li><a href="' + current_image + '" title="' + current_title + '"><img src="' + current_preview + '" alt="" class="shadow-image" /></a></li>'));

        return false;
    });
});

$(document).ready(function () {
    $('.gallery-company .previews-company a').live('click', function () {
        var current_preview = $('.gallery-company .big-image img').attr('data-preview');
        var current_title = $('.gallery-company .big-image .title').text();
        var current_image = $('.gallery-company .big-image img').attr('src');

        var new_preview = $(this).find('img').attr('src');
        var new_title = $(this).attr('title');
        var new_image = $(this).attr('href');

        $('.gallery-company .big-image #zoom').attr('href', new_image);
        $('.gallery-company .big-image img').attr('src', new_image).attr('data-preview', new_preview);
        $('.gallery-company .big-image h5').empty().append(new_title);

        $(this).attr('title', current_title).attr('href', current_image).find('img').attr('src', current_preview);
        //$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();

        return false;
    });

    $('.gallery-company .next').live('click', function () {
        var current_preview = $('.gallery-company .big-image img').attr('data-preview');
        var current_title = $('.gallery-company .big-image .title').text();
        var current_image = $('.gallery-company .big-image img').attr('src');


        var first_item = $('.gallery-company .previews-company li:first-child');
        var new_preview = first_item.find('img').attr('src');
        var new_title = first_item.find('a').attr('title');
        var new_image = first_item.find('a').attr('href');
        $('.gallery-company .big-image #zoom').attr('href', new_image);
        $('.gallery-company .big-image img').attr('src', new_image);
        $('.gallery-company .big-image img').attr('data-preview', new_preview);
        $('.gallery-company .big-image h5').empty().append(new_title);

        //$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();

        first_item.remove();
        $('.previews-company').append($('<li><a href="' + current_image + '" title="' + current_title + '"><img src="' + current_preview + '" alt="" class="shadow-image" /></a></li>'));

        return false;
    });

    $('.gallery-company .previous').live('click', function () {
        var current_preview = $('.gallery-company .big-image img').attr('data-preview');
        var current_title = $('.gallery-company .big-image .title').text();
        var current_image = $('.gallery-company .big-image img').attr('src');


        var last_item = $('.gallery-company .previews-company li:last-child');
        var new_preview = last_item.find('img').attr('src');
        var new_title = last_item.find('a').attr('title');
        var new_image = last_item.find('a').attr('href');

        $('.gallery-company .big-image #zoom').attr('href', new_image);
        $('.gallery-company .big-image img').attr('src', new_image);
        $('.gallery-company .big-image img').attr('data-preview', new_preview);
        $('.gallery-company .big-image h5').empty().append(new_title);

        //$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();

        last_item.remove();
        $('.previews-company').prepend($('<li><a href="' + current_image + '" title="' + current_title + '"><img src="' + current_preview + '" alt="" class="shadow-image" /></a></li>'));

        return false;
    });
});