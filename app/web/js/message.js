$(function() {
    getContent();

    function getContent(timestamp)
    {
        var queryString = {'timestamp' : timestamp};

        var xhr = $.ajax(
            {
                type: 'GET',
                url: requestUrl,
                data: queryString,
                success: function(data){
                    var obj = jQuery.parseJSON(data);
                    $('#message').html(obj.data_from_file);
                    getContent(obj.timestamp);
                }
            }
        );
    }

    $('#js-set-message-form').on('submit', function(e) {
        e.preventDefault();
        $form = $(this);
        $.ajax({
            url: $form.attr('action'),
            method: $form.attr('method'),
            data: $form.serialize(),
        });
    });
});