
$(document).ready(function(){
    
    // $('#btn_info').click(function(e){
    //     e.preventDefault();
    //     $('#info').modal('show');
    // })

    // delete Case
    $('.btnDeleteCase').click(function (e){
        e.preventDefault();
       let id = $(this).attr('data-id');
        $('#deleteCaseFile').attr('data-id', id);
        // $('#deleteCase').modal('show');
    })

    $('#deleteCaseFile').click(function (e){
        let id = $(this).attr('data-id');
            
        $.ajax({
            type: 'GET',
            async: 'false',
            url: '/case/delete/'+ id,
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                alert(response.responeText);
            }
        });

    })


     // delete Case
     $('.btnDeleteUser').click(function (e){
        e.preventDefault();
       let id = $(this).attr('data-id');
        $('#deleteUserBtn').attr('data-id', id);
        // $('#deleteCase').modal('show');
    })

    $('#deleteUserBtn').click(function (e){
        let id = $(this).attr('data-id');
            
        $.ajax({
            type: 'GET',
            async: 'false',
            url: '/users/delete/'+ id,
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                alert(response.responeText);
            }
        });

    })

    // $('.btnSend').click(function(e) {
    //     e.preventDefault();
    //     let id = $(this).attr('data-id');
    //     $.ajax({
    //         type: 'GET',
    //         url: '/cases/edit/' + id,
    //         success: function(respone) {
    //             $('#id1').val(response.id);
    //             $('#status1').val(response.status);
    //             $('#statement1').val(response.note)
    //         },
    //         error: function(response) {
    //             alert(response.responeText);
    //         }
    //     })
    // })

    
});

