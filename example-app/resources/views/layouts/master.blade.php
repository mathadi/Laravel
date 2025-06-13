<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
</head>
<body>
    <h1>Salut le monde</h1>
    <a href="/contact-us">Contactez-nous</a><br>
    <a href="/articles">Articles</a><br>
    <a href="/about-us">A propos de nous</a><br>
    <a href="/create-article">Création d'un article</a><br>

    @yield('content')
</body>
</html>