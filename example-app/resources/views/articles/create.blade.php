<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded px-8 py-6">
        <a href="/article_form"><h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Créer un nouvel article</h2></a>
        <form method="POST" action="articles/create" enctype="multipart/form-data">
            @yield('formulaire')
        </form>

    </div>
</body>

</html>