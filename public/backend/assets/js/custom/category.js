(function($){
    $(document).ready(function(){

        // Show Records
        function getRecords(){
            $.ajax({
                url : '/admin/category/getrecords',
                success : function(output){
                    $('#cat_body').html(output);
                }
            });
        }
        getRecords();



        // Show Create Modal
        $(document).on('click', '#create_cat_btn', function(event){
            event.preventDefault();
            $('#create_cat_modal').modal('show');
        });


        // Submit Create Form
        $('#create_cat_form').submit(function(event){
            event.preventDefault();
            $.ajax({
                url : '/admin/category/store',
                method : 'POST',
                data : new FormData(this),
                contentType : false,
                processData : false,
                success : function(output){
                    $('#create_cat_form')[0].reset();
                    $('#create_cat_modal').modal('hide');
                    getRecords();
                }
            });
        });


        // Status
        $(document).on('click', '.cat_check', function(event){
            event.preventDefault();
            let checked = $(this).attr('checked');
            let cat_id = $(this).attr('cat_id');


            if( checked == 'checked'){
                $.ajax({
                    url : '/admin/category/active/'+cat_id,
                    success : function(output){
                        getRecords();
                    }
                });
            }else{
                $.ajax({
                    url : '/admin/category/inactive/'+cat_id,
                    success : function(){
                        getRecords();
                    }
                });
            }
        });




        // Show Edit Modal
        $(document).on('click', '.edit_cat_btn', function(event){

            event.preventDefault();
            let cat_id = $(this).attr('edit_cat_id');

            $.ajax({
                url : '/admin/category/edit/'+cat_id,
                success: function(output){
                    $('#edit_cat_form input[name=name]').val(output.name);
                    $('#edit_cat_form input[name=get_id]').val(output.id);
                    $('#edit_cat_modal').modal('show');
                }
            });

        });



        // Update
        $(document).on('submit', '#edit_cat_form', function(event){
            event.preventDefault();

            $.ajax({
                url : '/admin/category/update',
                method : 'POST',
                data : new FormData(this),
                contentType : false,
                processData : false,
                success : function(output){
                    getRecords();
                    $('#edit_cat_modal').modal('hide');
                }
            });
        });



        // Delete
        $(document).on('click', '.delete_cat_btn', function(event){
            event.preventDefault();
            let id = $(this).attr('delete_cat_id');

            swal({
                icon : 'warning',
                title : 'Delete',
                text : 'Are You Sure?',
                buttons : ['Cancel', 'Delete'],
                dangerMode : true,
            }).then( (willDelete) => {
                if(willDelete){

                    $.ajax({
                        url : '/admin/category/delete/' + id,
                        success : function(output){
                            if(output){

                                getRecords();
                                swal({
                                    icon : 'success',
                                    title : 'Deleted',
                                    text : 'Data Deleted Successfully !!'
                                });

                            }

                        }
                    });

                }
            });


        });






























    });
})(jQuery)
