(function($){
    $(document).ready(function(){

        // add role modal show
        $(document).on('click', '#add_role_btn', function(e){
            e.preventDefault();
            $('#add_role_modal').modal('show');
        });

        // add role form submit
        $(document).on('submit', '#add_role_form', function(e){
            e.preventDefault();
            $.ajax({
                url: '/role/store',
                method: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(output){
                    $('#add_role_form')[0].reset();
                    $('#add_role_modal').modal('hide');
                    swal({
                        icon : 'success',
                        title : 'Role Added Successfully'
                    });
                }
            });
        });


        // Edit Modal Show
        $(document).on('click', '#edit_role_btn', function(e){
            e.preventDefault();
            $('#edit_role_modal').modal('show');
        });
































    });
})(jQuery)
