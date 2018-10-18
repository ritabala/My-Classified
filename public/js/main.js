$(document).ready(function(){
    $('body').on('click','.delete', function () {

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
                        // $success='Record deleted successfully';
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        }
    })
});






