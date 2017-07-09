<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
	<link rel="stylesheet" href="{{ url('/') }}/css/style.css">
	<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
	<script src="{{ url('/') }}/js/jquery.min.js"></script>
	<script src="{{ url('/') }}/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>

	<!-- sweetalert -->
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert/sweetalert.css') }}">
</head>
<body>
	@yield('content')
</body>
</html>