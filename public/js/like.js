$(document).ready(function () {
    $('.like-post').click(function () {
        // $('#like-post').attr('class','red');
        let id= $('.like-post').attr('data-id');
        console.log(id)
        $.ajax({
            uri:'http://localhost:8000/'+ id + '/like',
            type:'GET',
            dataType:'JSON',
            data: {
                id : id,
            },
            success:function (result) {
                console.log(result)

            }

        })
    });
});
