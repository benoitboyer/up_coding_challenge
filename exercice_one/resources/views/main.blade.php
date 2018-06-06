<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials._head')
	</head>
	<body style="background-color: #e6ffe6">
		<div class="container">
			@include('partials._messages')
			@yield('content')
		</div>  <!--- end of container--> 
		@include('partials._javascript')
		@yield('scripts')
   </body>
</html>