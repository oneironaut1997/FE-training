<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laracast')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">

    <style>
        .is-complete {
            text-decoration: line-through;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <ul>
            <li>
               <a href="/">Home</a>
            </li>
            <li>
                <a href="/about-us">About Us</a>
            </li>
            <li>
                <a href="/projects">Projects</a>
            </li>
            <li>
               <a href="/contact">Contact</a>
            </li>
        </ul>
        @yield('content')

    </div>

</body>
</html>