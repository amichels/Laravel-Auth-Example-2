<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
	<title></title>
 
	{{ HTML::style('css/foundation.min.css') }}
</head>
<body>
	<h1>Test</h2>

	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/foundation.min.js') }}
	<script>
		$(document).foundation();
	</script>

</body>
</html>
