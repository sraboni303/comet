(function($){
    $(document).ready(function(){

        // get records
        function getRecords(){
            $.ajax({
                url: '/role-all',
                success: function(output){
                    $('#role_body').html(output);
                }
            });
        }
        getRecords();

        // add role modal show
        $(document).on('click', '#add_role_btn', function(e){
            e.preventDefault();
            $('#add_role_modal').modal('show');
        });

        // add role form submit
        $(document).on('submit', '#add_role_form', function(e){
            e.preventDefault();
            $.ajax({
                url: '/role-store',
                method: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(){
                    $('#add_role_form')[0].reset();
                    $('#add_role_modal').modal('hide');
                    getRecords();
                }
            });
        });


        // status
        $(document).on('click', '.role_check', function(e){
            e.preventDefault();
            let id = $(this).attr('role_id');
            $.ajax({
                url : '/role-status/' + id,
                success: function(){
                    getRecords();
                }
            });
        });


        // delete
        $(document).on('click', '.role_delete_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('role_delete_id');

            swal({
                icon : 'warning',
                title : 'Delete',
                text : 'Are You Sure?',
                buttons : ['Cancel', 'Delete'],
                dangerMode : true,
            }).then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        url : '/role-delete/' + id,
                        success : function(output){
                            if(output){
                                getRecords();
                                swal({
                                    icon : 'success',
                                    title : 'Deleted',
                                    text : 'Record Deleted Successfully...',
                                });
                            }
                        }
                    });
                }
            });
        });





        // Edit
        $(document).on('click', '.role_edit_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('role_edit_id');
            $.ajax({
                url: '/role-edit/' + id,
                success: function(output){
                    $('#edit_role_form input[name="get_id"]').val(output.id);
                    $('#edit_role_form input[name="name"]').val(output.name);
                    $('#edit_per').html(output.permissions);
                    $('#edit_role_modal').modal('show');
                }
            });
        });


        // update
        $(document).on('submit', '#edit_role_form', function(e){
            e.preventDefault();
            $.ajax({
                url: '/role-update',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(){
                    getRecords();
                    $('#edit_role_modal').modal('hide');
                }
            });
        });































    });
})(jQuery)
