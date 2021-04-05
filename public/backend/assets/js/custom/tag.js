(function($){
    $(document).ready(function(){

        // Get Records
        function getRecords(){
            $.ajax({
                url : '/admin/tag/getrecords',
                success : function(output){
                    $('#tag_body').html(output);
                }
            });
        }
        getRecords();



        // Create Modal Show
        $(document).on('click', '#create_tag_btn', function(event){
            event.preventDefault();
            $('#create_tag_modal').modal('show');
        });

        // Create Form Submit
        $(document).on('submit', '#create_tag_form', function(event){
            event.preventDefault();

            $.ajax({
                url : '/admin/tag/store',
                method : 'POST',
                data : new FormData(this),
                contentType : false,
                processData : false,
                success : function(output){
                    $('#create_tag_form')[0].reset();
                    $('#create_tag_modal').modal('hide');
                    getRecords();
                }
            });
        });



        // Edit
        $(document).on('click', '.edit_tag_btn', function(event){
            event.preventDefault();
            let id = $(this).attr('edit_tag_id');
            $.ajax({
                url : '/admin/tag/edit/'+id,
                success : function(output){
                    $('#edit_tag_form input[name=get_id]').val(output.id);
                    $('#edit_tag_form input[name=name]').val(output.name);
                    $('#edit_tag_modal').modal('show');
                }
            });
        });


        // Update
        $(document).on('submit', '#edit_tag_form', function(event){
            event.preventDefault();
            $.ajax({
                url : '/admin/tag/update',
                method : 'POST',
                data : new FormData(this),
                contentType : false,
                processData : false,
                success : function(){
                    getRecords();
                    $('#edit_tag_modal').modal('hide');
                }
            });
        });



        // Status
        $(document).on('click', '.tag_check', function(event){
            event.preventDefault();

            let checked = $(this).attr('checked');

            let tag_id = $(this).attr('tag_id');

            if( checked == 'checked' ){
                $.ajax({
                    url : '/admin/tag/active/'+tag_id,
                    success : function(output){
                        getRecords();
                    }
                });
            }else{
                $.ajax({
                    url : '/admin/tag/inactive/'+tag_id,
                    success : function(output){
                        getRecords();
                    }
                });
            }
        });













        // Delete
        $(document).on('click', '.delete_tag_btn', function(event){
            event.preventDefault();
            let id = $(this).attr('delete_tag_id');
            swal({
                icon : 'warning',
                title : 'Delete',
                text : 'Are You Sure?',
                buttons : ['Cancel', 'Delete'],
                dangerMode : true,
            }).then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        url : '/admin/tag/delete/' + id,
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









































    });
})(jQuery)
