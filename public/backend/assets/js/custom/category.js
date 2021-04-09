(function($){
    $(document).ready(function(){

        // Show Records
        function getRecords(){
            $.ajax({
                url : '/category-all',
                success : function(output){
                    $('#category_body').html(output);
                }
            });
        }
        getRecords();



        // Show Create Modal
        $(document).on('click', '#add_category_btn', function(event){
            event.preventDefault();
            $('#add_category_modal').modal('show');
        });


        // Submit Create Form
        $('#add_category_form').submit(function(event){
            event.preventDefault();
            $.ajax({
                url : '/category-store',
                method : 'POST',
                data : new FormData(this),
                contentType : false,
                processData : false,
                success : function(output){
                    $('#add_category_form')[0].reset();
                    $('#add_category_modal').modal('hide');
                    getRecords();
                }
            });
        });


        // status
        $(document).on('click', '.cat_check', function(e){
            e.preventDefault();
            let id = $(this).attr('cat_id');
            $.ajax({
                url : '/category-status/' + id,
                success: function(){
                    getRecords();
                }
            });
        });


        // Edit
        $(document).on('click', '.edit_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('edit_id');
            $.ajax({
                url: '/category-edit/' + id,
                success: function(output){
                    $('#edit_cat_form input[name="get_id"]').val(output.id);
                    $('#edit_cat_form input[name="name"]').val(output.name);
                    $('#edit_cat_modal').modal('show');
                }
            });
        });


        // update
        $(document).on('submit', '#edit_cat_form', function(e){
            e.preventDefault();
            $.ajax({
                url: '/category-update',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(){
                    getRecords();
                    $('#edit_cat_modal').modal('hide');
                }
            });
        });


        // delete
        $(document).on('click', '.cat_delete_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('cat_delete_id');

            swal({
                icon : 'warning',
                title : 'Delete',
                text : 'Are You Sure?',
                buttons : ['Cancel', 'Delete'],
                dangerMode : true,
            }).then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        url : '/category-delete/' + id,
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
