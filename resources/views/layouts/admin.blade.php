<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('blog.title') }} Admin</title>
     <!-- Bootstrap -->
    <link href="{{ config('blog.base_url') }}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Theme -->
    <link href="{{ config('blog.base_url') }}/assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{ config('blog.base_url') }}/assets/bootstrap/css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')
</head>
<body>

{{-- Navigation Bar --}}
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar-menu">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ config('blog.title') }} Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            @include('admin.partials.navbar')
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer">
    <div class="container-fluid">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p class="text-muted">&copy; {{ config('blog.title') }} <?php echo date("Y"); ?> - Developed by <a href="http://georgewhitcher.com" target="_blank">George Whitcher</a></p>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ config('blog.base_url') }}/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="{{ config('blog.base_url') }}/assets/bootstrap/js/custom.js"></script>
@yield('scripts')

</body>
</html>