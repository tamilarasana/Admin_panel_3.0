
$(document).ready(function () {
    $("body").on("click", ".create_or_update_contact", function(e) { 
        var action = $(this).attr('data-action');
        var $inventSubmodal = $("#createOrUpdatecontact");
        if(typeof action != 'undefined'){
            $inventSubmodal.load( action, function(response) {
                $inventSubmodal.modal('show'); 
                $('.modal-title').text('Add Post');

            });

        }

    });

    
    $('body').on('click', '.add_model', function (e) {
        e.preventDefault();
        let category_id = $("#category_id").val();
        let title = $("#title").val();
        let description = $("#description").val();
        let _token = $("input[name=_token").val();
        $.ajax({
            type:"post",
            url:"/model.store",
            data:{
                category_id:category_id,
                title:title,
                description:description,
                _token:_token
            },
            success:function(response){
                console.log(response);
                var html = "<tr>"+"<td>"+response.category_id+"</td>"+"<td>"+response.title+"</td>"+"<td>"+response.description+"</td>"+"</tr>"
                 +'<td><button type="button"  value="'+response.id+'"  class="btn btn-success edit">Edit'
                // $("#studentTable tbody").append('<tr><td>'+response.category_id+'</td><td>'+response.title+'</td><td>'+response.description+'</td></tr>')
                // $("#contact_form")[0].reset();
                $('tbody').append(html);
                $('#createOrUpdatecontact').modal('hide');  
             
               

            }
        });
    });

});