
$(document).ready(function(){
    $('#btn_info').click(function(e){
        e.preventDefault();
        $('#info').modal('show');
    })

    $('.btn-userinfodelete').click(function (e){
        e.preventDefault();
       let id = $(this).attr('data-id');
        $('#userinfodeletelink').attr('data-id', id);
        $('#deleteuserinfo').modal('show');
    })

    $('#userinfodeletelink').click(function (e){
        let id = $(this).attr('data-id');
            
        $.ajax({
            type: 'GET',
            async: 'false',
            url: '/userinfo/delete/'+ id,
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                alert(response.responeText);
            }
        });

    })

    $('.btneditmodal').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            async: false,
            url: '/userinfo/edit' + id,
            success: function(respone) {
                $('#name1').val(respone['name']);
            },
            error: function(response) {
                alert(response.responeText);
            }
        })
    })

    
});

