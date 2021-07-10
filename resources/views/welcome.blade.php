<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <a href="https://github.com/sergradge">
                <i class="bi bi-github"></i>
            </a>
        </div>
    </nav>
    <div class="hero" style="background-image: url(/img/lorenzo-herrera.jpg);">
        <div class="container h-100">
            <div class="row h-100 aling-items-center">
                <div class="col-12">
                    <div class="hero__content-tag">
                        <a href="#">Develop Php - Laravel</a>
                    </div>
                    <h2><a href="#">Test Work</a></h2>

                    <div class="hero__content-tag">
                        <a href="#">Udemy.com</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
