<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <title>App Layout</title>
    @livewireStyles
</head>
<body>
    <div class="container">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>