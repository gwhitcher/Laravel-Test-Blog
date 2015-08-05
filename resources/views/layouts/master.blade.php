<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('blog.title') }} - @yield('title')</title>
    <link rel="alternate" type="application/rss+xml" href="{{ config('blog.base_url') }}/rss" title="RSS Feed {{ config('blog.title') }}">
    <!-- Bootstrap -->
    <link href="{{ config('blog.base_url') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Theme -->
    <link href="{{ config('blog.base_url') }}/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{ config('blog.base_url') }}/bootstrap/css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ config('blog.base_url') }}">{{ config('blog.title') }}</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li <?=echoActiveClassIfRequestMatches("")?>><a href="{{ config('blog.base_url') }}">Home</a></li>
                        <li <?=echoActiveClassIfRequestMatches("blog")?>><a href="{{ config('blog.base_url') }}/blog">Blog</a></li>
                        <li <?=echoActiveClassIfRequestMatches("about")?>><a href="{{ config('blog.base_url') }}/about">About</a></li>
                        <li <?=echoActiveClassIfRequestMatches("contact")?>><a href="{{ config('blog.base_url') }}/contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        <li <?=echoActiveClassIfRequestMatches("admin")?>><a href="{{ config('blog.base_url') }}/admin" target="_blank">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>

@yield('content')

<footer class="footer">
    <div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p class="text-muted">&copy; {{ config('blog.title') }} <?php echo date("Y"); ?> - Developed by <a href="http://georgewhitcher.com" target="_blank">George Whitcher</a></p>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ config('blog.base_url') }}/bootstrap/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="{{ config('blog.base_url') }}/bootstrap/js/custom.js"></script>
</body>
</html>