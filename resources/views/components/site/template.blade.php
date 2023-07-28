<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vagas para Laravel específica para o mercado Brasileiro. Unindo os melhores profissionais com as melhores melhores empresas.">

    <title>
        Laravags - Vagas para Laravel no Brasil
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
</head>

<body class="antialiased">
    <x-site.nav>
        {{ $hero ?? '' }}
    </x-site.nav>

    <main class="container mx-auto px-3 min-h-screen relative pb-32">
        {{ $slot }}
        <x-site.footer />
    </main>

    

    @livewire('notifications')
</body>

</html>
