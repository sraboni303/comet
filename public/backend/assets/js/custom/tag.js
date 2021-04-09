(function($){
    $(document).ready(function(){

        // get records
        function getRecords(){
            $.ajax({
                url: '/tag/get-records',
                success: function(output){
                    $('#tag_body').html(output);
                }
            });
        }
        getRecords();


        // add modal show
        $(document).on('click', '#add_tag_btn', function(e){
            e.preventDefault();
            $('#add_tag_modal').modal('show');
        });

        // add form submit
        $(document).on('submit', '#add_tag_form', function(e){
            e.preventDefault();
            $.ajax({
                url : '/tag-add',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(){
                    $('#add_tag_form')[0].reset();
                    $('#add_tag_modal').modal('hide');
                    getRecords();
                }
            });

        });


        // status
        $(document).on('click', '.tag_check', function(e){
            e.preventDefault();
            let id = $(this).attr('tag_id');
            $.ajax({
                url : '/tag-status/' + id,
                success: function(output){
                    getRecords();
                }
            });
        });



        // delete
        $(document).on('click', '.delete_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('delete_id');

            swal({
                icon : 'warning',
                title : 'Delete',
                text : 'Are You Sure?',
                buttons : ['Cancel', 'Delete'],
                dangerMode : true,
            }).then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        url : '/tag-delete/' + id,
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
        $(document).on('click', '.edit_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('edit_id');
            $.ajax({
                url: '/tag-edit/' + id,
                success: function(output){
                    // alert(output);
                    $('#edit_tag_form input[name="get_id"]').val(output.id);
                    $('#edit_tag_form input[name="name"]').val(output.name);
                    $('#edit_tag_modal').modal('show');
                }
            });
        });


        // // Update
        // $(document).on('submit', '#edit_tag_form', function(event){
        //     event.preventDefault();
        //     $.ajax({
        //         url : '/admin/tag/update',
        //         method : 'POST',
        //         data : new FormData(this),
        //         contentType : false,
        //         processData : false,
        //         success : function(){
        //             getRecords();
        //             $('#edit_tag_modal').modal('hide');
        //         }
        //     });
        // });








































    });
})(jQuery)
