<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foerdekiter Wetter</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-200">
        <header class="bg-white mb-8 shadow-md">
            <div class="container mx-auto py-8">
                <h1>Foerdekiter Wetter</h1>
            </div>
        </header>
        <main class="container mx-auto">
            @yield('content')
        </main>
    </body>
</html>
