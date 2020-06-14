$(function() {
    $('.send').on('click',function(e) {
        e.preventDefault();
        $.ajax({
            url: 'create.php',
            type: 'POST',
            dataType: 'json',
            data: {
                text: $('.text').val(),
                description: $('.description').val()    
            },
        }).done(function(data) {
            console.log(data.text);
        }).fail(function(msg, XMLHttpRequest, textStatus,errorThrown) {
            alert(msg);
            console.log(XMLHttpRequest);
            console.log(textStatus);
            console.log(errorThrown);
        });
    });
});
