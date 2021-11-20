$(document).ready(function(){
  fetchcategory();   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    $(document).on('submit', '#AddEmployeeForm', function(e){
        e.preventDefault();

        let formData = new FormData($('#AddEmployeeForm')[0]);
       
        $.ajax({
      
            url:"/category.store",
            type:"post",
            data:formData,
            contentType:false,
            processData:false,
            success:function(response){
                if(response.status == 400){
                  $('#save_errorList').html("");
                  $('#save_errorList').removeClass('d-none');
                  $.each(response.errors, function (key, err_value) {
                    $('#save_errorList').append('<li>'+err_value+'<li>');
                    // body...
                  });
                }else if(response.status == 200){
                  $('#save_errorList').html("");
                  $('#save_errorList').addClass('d-none');
                  // this.reset();
                  $('#addModal').find('input').val('');
                  $('#addModal').modal('hide');
                  alert(response.message);
                  fetchcategory();     
      
                }      
            }
          }); 
        });

        fetchcategory();

  function fetchcategory(){
        $.ajax({
          type:"GET",
          url:"/fetch-category",
          dataType:"json",
          success: function(response){
            console.log(response.employee);
            $('tbody').html("");
            $.each(response.employee, function (key , item){
              $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.brand_name+'</td>\
                            <td><img src ="uploads/Logo/'+item.brand_logo+'"width="50px" height="50px" alt=Image"></td>\
                            <td>'+item.about_brand+'</td>\
                            <td>'+item.status+'</td>\
                            <td><button type="button" value="'+item.id+'" class="edit_btn btn btn-sucess btn-sm">Edit</button> \
                            <button type="button" value="'+item.id+'" class="delete_btn btn btn-danger btn-sm">Delete</button>\
                            </tr>');
                 });
              }
        });
    } 

    $(document).on('click', '.edit_btn', function(e){
      e.preventDefault();
      var emp_id = $(this).val();
       alert(emp_id);
      $('#Editmodal').modal('show');

      
    });

})
