(function($){
    $(document).ready(function(){


        // Show Edit Profile Modal
        $(document).on('click', '.edit-link', function(e){
            e.preventDefault();
            $('#edit_personal_details').modal('show');
        });


        // Submit Edit Profile Form
        $(document).on('submit', '#edit_profile_form', function(e){
            e.preventDefault();
            $.ajax({
                url : '/user-profile-update',
                method : 'POST',
                data : new FormData(this),
                processData : false,
                contentType : false,
                success : function(output){
                    $('#edit_personal_details').modal('hide');
                    swal({
                        icon : 'success',
                        title : 'Successful',
                        text : 'Profile Updated Successfully',
                    });
                }

            });
        });


        // Change Password
        $(document).on('submit', '#change_password_form', function(e){
            e.preventDefault();

            $.ajax({
                url : '/change-password',
                method : 'POST',
                data : new FormData(this),
                processData : false,
                contentType: false,
                success : function(output){

                    if(output == 'error'){
                        swal({
                            icon : 'warning',
                            title : 'All Fields are Required',
                        });
                    }else if(output == 'ok'){
                        $('#change_password_form')[0].reset();
                        swal({
                            icon : 'success',
                            title : 'Password Updated Successfully',
                        });
                    }else if(output == 'wrong'){
                        swal({
                            icon : 'warning',
                            title : 'Invalid Password',
                        });
                    }
                    
                }
            });
        });

















    });
})(jQuery)
