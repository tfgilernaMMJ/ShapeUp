@extends('coach.templates.template')

@section('titulo')
Inicio
@endsection

@section('index-nav-lat')
<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
@endsection

@section('index-nav')
text-gray-800 dark:text-gray-100
@endsection

@section('index-section')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Inicio
    </h2>
    <!-- CTA -->
    <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/tfgilernaMMJ/ShapeUp" target="_blank">
      <div class="flex items-center">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
        <span>Mira nuestro proyecto en GitHub</span>
      </div>
      <span>Ver más &RightArrow;</span>
    </a>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      @foreach($cardsResults as $key => $results)
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="{{$resultsColors[$key]}}">
          <i class='{{$resultsIcon[$key]}}' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">

            {{$resultsTitle[$key]}}
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            @if($key == 3)
            {{$results}}
            @else
            {{$results}}
            @endif
          </p>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Charts -->
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Información de {{Auth::user()->name}}
    </h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <!-- Chart legend -->
        @if($trainingsCount == 0 && $exerciseCount == 0 && $dietsCount == 0)
        <input class="countTrainings" hidden value="0" />
        <input class="countExercise" hidden value="0" />
        <input class="countIngredients" hidden value="0" />
        <input class="countDiets" hidden value="0" />
        <canvas id="pie"></canvas>
        <div class="flex items-center">
          <span class="inline-block w-3 h-3 mr-1 bg-red-500 rounded-full"></span>
          <span>Sin resultados</span>
        </div>
        @else
        <input class="countTrainings" hidden value="{{$trainingsCount}}" />
        <input class="countExercise" hidden value="{{$exerciseCount}}" />
        <input class="countDiets" hidden value="{{$dietsCount}}" />
        <canvas id="pie"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
          <!-- Chart legend -->
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-green-700 rounded-full"></span>
            <span>Ejercicios</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
            <span>Entrenamientos</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
            <span>Dietas</span>
          </div>
        </div>
        @endif
      </div>


      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        @if(!$followersByMonth)
        <input class="followers-by-month" hidden value="0" />
        <input class="followersDiet-by-month" hidden value="0" />
        <input class="followersTraining-by-month" hidden value="0" />
        <canvas id="line"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
          <!-- Chart legend -->
          <div class="flex items-center">
            <span>Sin resultados</span>
          </div>
        </div>
        @else
        <input class="followers-by-month" hidden value="{{$followersByMonth}}" />
        <input class="followersDiet-by-month" hidden value="{{ $followersDietByMonth }}" />
        <input class="followersTraining-by-month" hidden value="{{ $followersTrainingByMonth }}" />
        <canvas id="line"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
          <!-- Chart legend -->
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
            <span>Seguidores</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-green-700 rounded-full"></span>
            <span>Me gustas (Dietas)</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
            <span>Me gustas (Entrenamientos)</span>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</main>
</div>
@endsection