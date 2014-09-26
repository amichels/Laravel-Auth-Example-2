<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
	<title></title>
 
	{{ HTML::style('css/foundation.min.css') }}
    {{ HTML::style('css/app.css') }}

    {{ HTML::script('js/modernizr.js') }}
</head>
<body>
	<div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">  
                    <li>{{ HTML::link('users/register', 'Register') }}</li>   
                    <li>{{ HTML::link('users/login', 'Login') }}</li>   
                </ul>  
            </div>
        </div>
    </div> 
             
 
    <div class="container">
        @if(Session::has('message'))
            <div class="alert-box alert" data-alert>
                {{ Session::get('message') }}
                <a href="#" class="close">&times;</a>
            </div>
        @endif

        {{ $content }}
    </div>

	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/foundation.alert.js') }}
	<script>
		$(document).foundation();
	</script>

</body>
</html>
