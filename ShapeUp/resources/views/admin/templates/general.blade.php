<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ShapeUp - Panel de control entrenador | @yield('titulo')</title>

    <link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('dashboard/assets/js/init-alpine.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('dashboard/assets/js/charts-pie.js') }}" defer></script>
    <script src="{{ asset('dashboard/assets/js/charts-bars.js') }}" defer></script>
    <script src="{{ asset('dashboard/assets/js/focus-trap.js') }}" defer></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

    @yield('aside')

    {{-- INDEX --}}

    @yield('index-section')

    {{-- FORMS --}}

    @yield('forms-section')

    {{-- CARDS --}}

    @yield('cards-section')

    {{-- CHARTS --}}

    @yield('charts-section')

    {{-- BUTTONS --}}

    @yield('buttons-section')

    {{-- MODALS --}}

    @yield('modals-section')

    {{-- TABLES --}}

    @yield('tables-section')

    </div>
</body>
</html>
