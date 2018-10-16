// $(document).ready(function(){
//
//
//     $('.delete').on('click',function () {
//
//         var url = $(this).data("url");
//         var token = $(this).data("token");
//         var val = $(this).data("val");
//         var ask = confirm("Are you sure you want to delete "+val+" ?");
//
//         if(ask) {
//             $.ajax({
//                 type: "post",
//                 dataType: "json",
//                 data: {
//                     _method: 'delete',
//                     _token: token
//                 },
//                 url: url,
//                 success: function (data) {
//                     if (data.status === 'success') {
//                         window.location = data.url;
//                     }
//                 },
//                 error: function (data) {
//                     // console.log($row->id);
//                     console.log('Error:', data);
//                 }
//             })
//         }
//     })
    $(document).ready(function(){
        // var url = $(this).data("url");
        //delete and remove it from list
        $('.table').on("click", '.delete-model', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')     // SET TOKEN BEFORE DELETE
                }
            });

            // var id = $(this).val();
            // var deleteUrl = url + '/' + id;
            var deleteUrl = $(this).data("url");


            $.confirm({
                title: 'Confirm!',
                icon: 'fa fa-spinner fa-spin',
                content: 'Are you sure you want to delete this record?',
                confirmButtonClass: 'btn-danger',
                cancelButtonClass: 'btn-info',
                theme: 'black',
                autoClose: 'cancel|30000',
                animation: 'RotateY',
                closeAnimation: 'scale',
                confirmButton: 'DELETE it !',
                cancelButton: 'NO never !',
                confirm: function(){
                    $.ajax({
                        type: "DELETE",
                        url: deleteUrl,
                        success: function (data) {
                            console.log(data);
                            // $("#row" + id).remove();
                        },
                        error: function (data) {
                            console. log('Error:', data);
                        }
                    });
                },
                cancel: function(){
                }
            });

        });
        });






