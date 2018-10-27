<!DOCTYPE html>
<html>
<head>
	<title>Forecast</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	@section('css')

	@show
	<script src="{{asset('js/jquery-3.3.1.js')}}"></script>

</head>
<body>
@section('header')
	@include('layouts.header')
@show



<div class="container">
	@yield('content')
</div>


<script src="{{asset('js/materialize.min.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>

</body>
</html>