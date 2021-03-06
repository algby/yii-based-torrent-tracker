$(document).on('click', 'a[data-action=rating]', function (e) {
    e.preventDefault();

    var elem = $(this);
    var url = elem.attr('href');

    if ( elem.hasClass('btn') ) {
        elem.addClass('load');
    }
    else {
        elem.children('i').addClass('icon-load');
    }

    $.ajax({
        url: url,
        data: {modelName: elem.data('model'), modelId: elem.data('id'), state: elem.data('state')},
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            var badge = elem.prevAll('.badge');
            //console.log(badge);
            if (typeof data.data == 'undefined' || typeof data.data.rating == 'undefined') {
                return false;
            }
            var rating = data.data.rating;
            badge.attr('class', 'badge');
            badge.html(rating);
            if (rating > 0) {
                badge.addClass('badge-success');
            }
            else if (rating < 0) {
                badge.addClass('badge-important');
            }

            $('.top-right').notify({
                message: { html: data.message },
                fadeOut: {
                    enabled: true,
                    delay: 3000
                },
                type: 'success'
            }).show();
        },
        complete: function () {
            elem.removeClass('load');
            elem.children('i').removeClass('icon-load');
        }
    });
});

