<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css','resources/js/app.js'])

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    <body class="antialiased p-4">
        <h2 class="text-xl font-medium text-center">Home Page testing</h2>
        <p class="p-3 bg-blue-600 text-white rounded-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
            corporis
            modi sequi et quisquam beatae libero
            natus neque accusamus, rerum ipsa expedita deleniti mollitia deserunt ut dolorem alias tenetur? Iure?</p>
    </body>

</html>