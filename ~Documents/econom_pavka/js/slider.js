/**
 * big banners slider
 */
$(function() {
	if ($('#slides').length) {
		var event_width = 1000;
        var slider_width = $('#slides .slide').length*event_width;
        var wrapper_width = $('#slider').width();
        var current_position = 0;
        var speed = 1000;

        $('#slides').css({width: slider_width + 'px'});

        if (wrapper_width < slider_width) {
            $('#slider .previous').live('click', function() {
                if (current_position < 0)
                {
                    left = current_position + event_width;
                    left = left < 0 ? left : 0;
                    $('#slides').animate({'left': left+'px'}, speed);
                    current_position = left;
                }

                return false;
            });

            $('#slider .next').live('click', function() {
                if (current_position > (wrapper_width - slider_width)) {
                    $('#slides').animate({'left': current_position - event_width +'px'}, speed);
                    current_position -= event_width;
                }

                return false;
            });
        }
        else {
            $('#slider > a').hide();
        }
	}
});