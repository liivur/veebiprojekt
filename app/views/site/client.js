function getContent(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: 'http://127.0.0.1/app/models/Server.php',
            data: queryString,
            success: function(data){
                
                var obj = jQuery.parseJSON(data);
              
                $('#response').html(obj.data_from_file);
                response="bla";
                
                getContent(obj.timestamp);
            }
        }
    );
}


$(function() {
    getContent();
});