<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ShapeUp - Panel de control entrenador | @yield('titulo')</title>
<!-- CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript de Bootstrap -->


<link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="icon">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/tailwind.output.css') }}" />
<link href="{{ asset('web/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
<script src="{{ asset('dashboard/assets/js/init-alpine.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/charts-linesCoach.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/charts-pieCoach.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/charts-bars.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/focus-trap.js') }}" defer></script>
<script src="{{ asset('dashboard/assets/js/custom.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js" defer></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

    @yield('aside')

    {{-- INDEX --}}

    @yield('index-section')
    @yield('coaches-section')
    @yield('dashboard-editCoach')
    {{-- FORMS --}}

    @yield('training-section')
    @yield('coach-addExercise')
    @yield('training-nav-lat')
    @yield('exercise-nav-lat')
    @yield('ingredient-nav-lat')
    @yield('diet-nav-lat')
    @yield('coach-addIngredient')
    @yield('dashboard-editTraining')
    @yield('dashboard-editExercise')
    @yield('dashboard-createTraining')
    @yield('dashboard-createExercise')
    @yield('dashboard-editDiet')
    @yield('dashboard-createDiet')
    @yield('dashboard-createIngredient')
    @yield('messages-nav-lat')
    </div>
</body>
</html>
