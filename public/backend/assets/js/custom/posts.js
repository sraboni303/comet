(function($){
    $(document).ready(function(){


        // CK Editor load
        CKEDITOR.replace('text_area');

        // Select 2 load
        $('.tag_selector').select2();

        // Preload  Image
        $(document).on('change', '#upload_image', function(e){
            let file_url = URL.createObjectURL(e.target.files[0]);
            $('.preload_image').attr('src', file_url);
        });

        // Preload Gallery
        $(document).on('change', '#upload_gallery', function(e){

            let gallery = '';

            for( let i=0; i < e.target.files.length; i++ ){

                let file_url = URL.createObjectURL(e.target.files[i]);
                gallery += '<img style="width:200px; margin-right:5px" src="'+ file_url +'">';

            }
            $('.preload').html(gallery);

        });

        // Post Inpout
        $(document).on('click', 'input[type="radio"]', function(e){
            let radioVal = $('input[name="radio"]:checked').val();

            // Image
            if(radioVal == 'Image'){
                $('#upload_image').show();
            }else{
                $('#upload_image').hide();
            }

            // Gallery
            if(radioVal == 'Gallery'){
                $('#upload_gallery').show();
            }else{
                $('#upload_gallery').hide();
            }

            // Video
            if(radioVal == 'Video'){
                $('#upload_video').show();
            }else{
                $('#upload_video').hide();
            }

            // Audio
            if(radioVal == 'Audio'){
                $('#upload_audio').show();
            }else{
                $('#upload_audio').hide();
            }


        });


        // Status
        $(document).on('click', '.check', function(){

            let id = $(this).attr('status_id');
            let checked = $(this).attr('checked');


            if(checked == 'checked'){
                $.ajax({
                    url : '/admin/posts/active/' + id,
                    success : function(){

                    }
                });
            }else{

                $.ajax({
                    url : '/admin/posts/inactive/' + id,
                    success : function(){

                    }
                });
            }


        });


        // Edit
        $(document).on('click', '.edit_btn', function(e){
            let id = $(this).attr('edit_id');
            $.ajax({
                url : '/admin/posts/edit/' + id,
                success : function(output){
                    $('#edit_title').val(output.title);
                    $('#edit_id').val(output.id);
                }
            });
        });


        // Trash
        $(document).on('click', '.trash', function(e){
            e.preventDefault();
            let id = $(this).attr('trash_id');

            $.ajax({
                url : '/admin/posts/trash/' + id,
                success : function(output){
                }
            });
        });


        // Untrash
        $(document).on('click', '.untrash', function(e){
            e.preventDefault();
            let id = $(this).attr('id');

            $.ajax({
                url : '/admin/posts/untrash/' + id,
                success : function(output){

                }
            });
        });


        // Delete Parmanently
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            let id = $(this).attr('id');

            swal({
                icon : 'warning',
                title : 'Delete Parmanently',
                text : 'Are You Sure?',
                buttons : ['Cancel', 'Delete'],
                dangerMode : true,
            }).then( (willDelete) => {
                if(willDelete){
                    $.ajax({
                        url : '/admin/posts/delete/' + id,
                        success : function(output){
                            if(output){
                                swal({
                                    icon : 'success',
                                    title : 'Deleted',
                                    text : 'Data Deleted Successfully',
                                });
                            }
                        }
                    });
                }
            });
        });















    });
})(jQuery)
