<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <title>@yield('title', 'Laracast Title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">

        <style>
            .is-complete{
                text-decoration: line-through;
            }
        </style>
    </head>


    <body>

        <ul>
                <li><a href="/">Main Page</a></li>
            <li><a href="/projects">Project</a></li>
            <li><a href="/projects/create">Add new Project</a></li>
            <li><a href="/contact">Contact Page</a></li>
        </ul>        

        <div class="container">
                @yield('content')    
        </div>
    </body>

    <script src="/js/app.js"></script>
</html>
