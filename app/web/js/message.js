function getContent(timestamp)
{
    var queryString = {'timestamp' : timestamp};

    $.ajax(
        {
            type: 'GET',
            url: requestUrl,
            //url: 'site/app/models/Server.php',
            data: queryString,
            success: function(data){
                
                var obj = jQuery.parseJSON(data);
              
                $('#message').html(obj.data_from_file);
               
                
                getContent(obj.timestamp);
            }
        }
    );
}


$(function() {
    getContent();
});