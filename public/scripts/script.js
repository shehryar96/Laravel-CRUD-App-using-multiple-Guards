
// login ajax call
// $('.login_btn').click(function(){
   
//     event.preventDefault();
//     var email = $('.email').val();
//     var password = $('.password').val();
//     var selected_option =  $('.select_type :selected').val();

//     if(email!='' && password!='' && selected_option!='')
//     {
//         $.ajax({
//             url:'/api/loginAttempt',
//             data: {
//                 "_token": "{{ csrf_token() }}",
//                 "email":email,
//                 'password':password,
//                 'login_type':selected_option
               
//             },
//             method: 'post',
//             success: function(data) {
               
//                 sessionStorage.setItem("usertoken",data.response.token);
//                 window.location.href = "/api/index";

                
//             },
//             error: function(data)
//             {
                
//                 console.log('error',data.message);
//             }
//         });
//     }
//     else{
        
//         swal("Please Enter all the fields!");
//     }



// });

// create users

$('.create_user').click(function(){

    var name = $('[name=name]').val();
    var email =  $('[name=email]').val();
    var password =  $('[name=password]').val();
    var role =  $('.select_type :selected').val();
    var token =  $('[name=token]').val(); 


    
    if(email!='' && password!='' && name!='')
    {
        if(password.length <= 7)
        {
            alert('Password lenght has to be greater than 7 characters');
        }
      
        $.ajax({
            headers: {
                // "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attractive('content').
                "Authorization":"Bearer "+token
            },
            url:'/api/admin/createUser',
            data: {
                // "_token": "{{ csrf_token() }}",
                "email":email,
                'password':password,
                'name':name,
                'role':role
                
            },
            method: 'post',
            success: function(data) {
                
                $('#mediumModal').modal('hide');

                swal(data.response.message);
                location.reload();
                // sessionStorage.setItem("usertoken",data.response.token);
                // window.location.href = "/api/index";

                
            },
            error: function(data)
            {   console.log(data);
                //alert(data.response.message);
                // console.log('error',data.message);
            }
        });


    }
    else{
        
        swal("Please Enter all the fields!");
    }



});

// edit user script 

$('.edit_user').click(function(){

    var user = $(this).data('user');
    $('[name=id]').val(user.id);
    $('[name=name]').val(user.name);
    $('[name=email]').val(user.email);
    $('[name=user_role]').val(user.role);

   
    $('.pasword_div').hide();
    $('.role_div').hide();
    $('.email_div').hide();
    $('.create_user').hide();
    $('.edit_user_btn').css('display','block');
    $('#mediumModal').modal('show');


});


// editUser ajax call

$('.edit_user_btn').click(function(){
    var name = $('[name=name]').val();
    var token =  $('[name=token]').val();
    var role =  $('[name=user_role]').val();
    var id = $('[name=id]').val();
  
    if(name != '')
    {
        $.ajax({
            headers: {
                // "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attractive('content').
                "Authorization":"Bearer "+token
            },
            url:'/api/admin/editUser',
            data: {
            
                'name':name,
                'role':role,
                'id':id
                
            },
            method: 'post',
            success: function(data) {
                
                $('#mediumModal').modal('hide');
                $('[name=name]').val('');
                $('[name=user_role]').val('');

                $('.email_div').show();
                $('.role_div').show();
                $('.pasword_div').show();
                $('.create_user').show();
                $('.edit_user_btn').css('display','none');
                swal(data.response.message);
                location.reload();
                // sessionStorage.setItem("usertoken",data.response.token);
                // window.location.href = "/api/index";

                
            },
            error: function(data)
            {   console.log(data);
                //alert(data.response.message);
                // console.log('error',data.message);
            }
        });
    }
    else{
        swal("Name is required field!");
    }

})


$('#mediumModal').on('hidden.bs.modal', function () {
    $('[name=name]').val('');
    $('[name=email]').val('');
    $('[name=password]').val('');
    $('[name=user_role]').val('');
    $('.email_div').show();
    $('.role_div').show();
    $('.pasword_div').show();
    $('.create_user').show();
    $('.edit_user_btn').css('display','none');


});

// delete user

$('.delele_user_btn').click(function(){

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this User!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) { 

            var token =  $('[name=token]').val();
            var user = $(this).data('user');

            $.ajax({
                headers: {
                    // "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attractive('content').
                    "Authorization":"Bearer "+token
                },
                url:'/api/admin/deleteUser',
                data: {
                
                    'role':user.role,
                    'id':user.id
                    
                },
                method: 'post',
                success: function(data) {
                    
                    swal(data.response.message, {
                        icon: "success",
                      });
    
                    location.reload();
                
                    
                },
                error: function(data)
                {   console.log(data);
                    //alert(data.response.message);
                    // console.log('error',data.message);
                }
            });


        
        } else {
            

          swal("User is safe!");
        }
      });

});


$('.logout_btn').click(function(){

    $('#logout_form').submit();
});



CKEDITOR.replace( 'blog_description' );


// add blogs js

$('.btn_add_blog').click(function(){

    var title = $('.title').val();
    var description = CKEDITOR.instances['blog_description'].getData();
    var token =  $('[name=blogger_token]').val(); 

    if(title!= '' && description!='')
    {
        $.ajax({
            headers: {
                // "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attractive('content').
                "Authorization":"Bearer "+token
            },
            url:'/api/blogger/createBlog',
            data: {
            
                'title':title,
                'blog_description':description
                
            },
            method: 'post',
            success: function(data) {
                
                swal(data.response.message, {
                    icon: "success",
                  });

                location.reload();
            
                
            },
            error: function(data)
            {   console.log(data);
                swal(data.response.message);
                // console.log('error',data.message);
            }
        });
    }
    else{
        swal("Please Enter all the fields!");
    }


});