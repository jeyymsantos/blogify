<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <!-- Introduction -->
        @yield('title')
        <link rel="shortcut icon" href="/img/logo.ico" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/master.css" type="text/css">
        
        <!-- Custom CSS for each blade -->
        @yield('css')

    </head>
    
    <body>

        @yield('header')
        @yield('content')
        
        <!-- Javascripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    </body>
</html>
