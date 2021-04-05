(function($){
    (document).ready(function(){

        // Logout feature:
        $(document).on('click', '.logout_btn', function(event){
            event.preventDefault();
            $('#logout_form').submit();
        });

    });
})(jQuery)

