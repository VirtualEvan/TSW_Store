function update(){
    var actualHeight = document.getElementsByClassName("messagesview")[0].scrollHeight;
    $.ajax({
        url: chat_id,
        cache: false,
        type: 'POST',

        success: function (data) {
            $('#mc').html(data);
            if( actualHeight < document.getElementsByClassName("messagesview")[0].scrollHeight ){
              $("div.messagesview").animate({scrollTop: document.getElementsByClassName("messagesview")[0].scrollHeight});
            }
        }
    });

    setTimeout('update()', 2000);

};

$(document).ready(

    $(function()
    {

        update();
        $("div.messagesview").scrollTop(document.getElementsByClassName("messagesview")[0].scrollHeight);

        $('form').on('submit',
            function (event) {

                event.preventDefault();

                $.ajax(
                {
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $('form').serialize(),
                    success: function ()
                    {
                        update();
                        $("div.messagesview").animate({scrollTop: document.getElementsByClassName("messagesview")[0].scrollHeight});
                    },
                    error: function(){
                        alert('Error');
                    }
                });

                this.reset();

            }

        );

    })

);