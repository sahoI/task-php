$(function() {
    $('.send').on('click',function(e) {
        print('ajax');
        e.preventDefault();
        $.ajax({
            url: 'tasks.php/createTask',
            type: 'POST',
            dataType: 'json',
            data: {
                text: $('.text').val(),
                description: $('.description').val()    
            },
        }).done(function(data) {
            alert("Data Saved: " +msg);
            console.log('aaaa');
            console.log(data.text);
        }).fail(function(msg, XMLHttpRequest, textStatus,errorThrown) {
            alert(msg);
            console.log(XMLHttpRequest);
            console.log(textStatus);
            console.log(errorThrown);
        });
    });
});
