<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/feathericon.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/plugins/morris/morris.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    </head>
    <body>

        @yield('content')

		<!-- jQuery -->
        <script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

		<!-- Slimscroll JS -->
        <script src="{{ asset('backend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

		<script src="{{ asset('backend/assets/plugins/raphael/raphael.min.js') }}"></script>
		<script src="{{ asset('backend/assets/plugins/morris/morris.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/chart.morris.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

		<!-- Custom JS -->
		<script  src="{{ asset('backend/assets/js/script.js') }}"></script>
		<script  src="{{ asset('backend/assets/js/custom/logout.js') }}"></script>
		<script  src="{{ asset('backend/assets/js/custom/category.js') }}"></script>
		<script  src="{{ asset('backend/assets/js/custom/tag.js') }}"></script>
		<script  src="{{ asset('backend/assets/js/custom/posts.js') }}"></script>
		<script  src="{{ asset('backend/assets/js/custom/edit_profile.js') }}"></script>
		<script  src="{{ asset('backend/assets/js/custom/role.js') }}"></script>
		<script  src="{{ asset('backend/assets/js/custom/member.js') }}"></script>

    </body>
</html>
