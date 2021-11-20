$(document).ready(function(){
    // fetchEmployee();
   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })


    
$(document).on('submit', '#AddEmployeeForm', function(e){
    e.preventDefault();
    let formData = new FormData($('#AddEmployeeForm')[0]);
   
    $.ajax({
      
        url:"/image.store",
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
              fetchEmployee();
  
  
            }
  
        }
      });
  

    });
    fetchCategory();

  function fetchCategory(){
        $.ajax({
          type:"GET",
          url:"/fetch-employee",
          dataType:"json",
          success: function(response){
            console.log(response.employee);
            $('tbody').html("");
            $.each(response.employee, function (key , item){
              $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.producd+'</td>\
                            <td><img src ="uploads/bike/'+item.image+'"width="50px" height="50px" alt=Image"></td>\
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
        // alert("in");
        
         alert(emp_id);
        $('#Editmodal').modal('show');
        $.ajax({
          type:"get",
          url:"/edit-employee/"+emp_id,
          success:function(response){
            console.log(response);
            if(response.status == 400){
              alert(response.message);
              $('#Editmodal').val('hide');  
            }else{
              $('#producd_name').val(response.employee.producd);
            //   $('#edit_phone').val(response.employee.phone);
              $('#emp_id').val(emp_id);
            }
          }

        });
      });

      $(document).on('click', '#updateEmployee', function(e){
        e.preventDefault();
        var id = $('#emp_id').val();
        let EditForm = new FormData($('#updateEmployee')[0]);
        $.ajax({
          type:"post",
          url:"/update-employee/"+id,
          data:EditForm,
          contentType:false,
          processData:false,
          success:function(response){
            if(response.status == 400){
               $('#update_errorList').html("");
               $('#update_errorList').removeClass('d-none');
                $.each(response.errors, function (key, err_value) {
                $('#update_errorList').append('<li>'+err_value+'<li>');
                // body...
              });

            }else if(response.status==404){
              alert(response.message);
            }else if(response.status == 200){
              $('#update_errorList').html("")
              $('#save_errorList').addClass('d-none');
              $('#Editmodal').modal('hide');
              alert(response.message);

            }

          }
        });

    });

 
    $(document).on('click', '.delete_btn', function(e){
        e.preventDefault();
      var emp_id = $(this).val();
      $('#DeleteModal').modal('show');
      $('#deleting_emp_id').val(emp_id);

     });

 $(document).on('click','.delete_model_btn', function(e){
      e.preventDefault();
      var id = $('#deleting_emp_id').val();
    

      $.ajax({
        
        url:"/delete-employee/"+id,
        type:'delete',
        dataType:"json",
        success:function(response){
          if(response.status == 404){
            alert(response.message);
            $('#DeleteModal').modal('hide');
          }else if(response.status == 200){
              fetchEmployee();
              $('#DeleteModal').modal('hide');
              alert(response.message);
          }

        }
      });
     });




})

