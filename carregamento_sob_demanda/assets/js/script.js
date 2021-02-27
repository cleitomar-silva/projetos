$( document ).ready(function() {

    var page = 1;

    $( "#loadComments" ).click(function() {
        loadComm();

    });

    function loadComm()
    {
        $.ajax({
            url: 'controller/ListarController.php',
            method: 'POST',
            data: {page: page},
            dataType: 'JSON',
            beforeSend: function ()
            {
                $('#spinner').css("visibility", "visible");
                page++;
            }

        }).done(function(retorno){
            $('#spinner').css("visibility", "hidden");

            $.each(retorno, function (i, item) {
                $('#tbody_table').append(
                    `<tr>
                        <td >`+ item.id  +`</td>                       
                        <td>`+ item.nome +`</td>
                        <td>`+ item.comentario +`</td>                       
                    </tr>`
                );
            });

        }).fail(function() {

            $('#spinner').css("visibility", "hidden");
            $("#loadComments").remove();
        });
    }



});