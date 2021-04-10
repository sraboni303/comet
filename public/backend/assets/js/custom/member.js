(function($){
    $(document).ready(function(){

        // Show Records
        function getRecords(){
            $.ajax({
                url : '/member-all',
                success : function(output){
                    $('#member_body').html(output);
                }
            });
        }
        getRecords();


        // Show Create Modal
        $(document).on('click', '#add_member_btn', function(event){
            event.preventDefault();
            $('#add_member_modal').modal('show');

            // preload image
            $(document).on('change', '#preload_file', function(e){
                let file_url = URL.createObjectURL(e.target.files[0]);
                $('#preload_img').attr('src', file_url);
            });
        });




        // Submit Create Form
        $('#add_member_form').submit(function(event){
            event.preventDefault();
            $.ajax({
                url : '/member-store',
                method : 'POST',
                data : new FormData(this),
                contentType : false,
                processData : false,
                success : function(){
                    $('#add_member_form')[0].reset();
                    $('#preload_img').attr('src', '');
                    $('#add_member_modal').modal('hide');
                    getRecords();
                }
            });
        });


        // status
        $(document).on('click', '.member_check', function(e){
            e.preventDefault();
            let id = $(this).attr('member_id');
            $.ajax({
                url : '/member-status/' + id,
                success: function(){
                    getRecords();
                }
            });
        });


        // delete
        $(document).on('click', '.member_delete_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('member_delete_id');

            swal({
                icon : 'warning',
                title : 'Delete',
                text : 'Are You Sure?',
                buttons : ['Cancel', 'Delete'],
                dangerMode : true,
            }).then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        url : '/member-delete/' + id,
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
