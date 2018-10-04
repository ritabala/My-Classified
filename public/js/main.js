$(document).ready(function(){


    $('.delete').on('click',function () {

        var url = $(this).data("url");
        var token = $(this).data("token");
        var val = $(this).data("val");
        var ask = confirm("Are you sure you want to delete "+val+" ?");

        if(ask) {
            $.ajax({
                type: "post",
                dataType: "json",
                data: {
                    _method: 'delete',
                    _token: token
                },
                url: url,
                success: function (data) {
                    if (data.status === 'success') {
                        window.location = data.url;
                    }
                },
                error: function (data) {
                    // console.log($row->id);
                    console.log('Error:', data);
                }
            })
        }
    })
});



