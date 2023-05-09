@extends('admin.templates.template')

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
      Dashboard
    </h2>
    <!-- CTA -->
    <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/tfgilernaMMJ/ShapeUp" target="_blank">
      <div class="flex items-center">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
        <span>See this project on GitHub</span>
      </div>
      <span>View more &RightArrow;</span>
    </a>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Entrenadores
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{$coachesCount}}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Entrenamientos
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{$trainingsCount}}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Dietas
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">

            {{$dietsCount}}

          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Super Suscripciones
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{$superSusCount}}
          </p>
        </div>
      </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Nombre</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Suscripción</th>
              <th class="px-4 py-3">
                @if($allCoaches)
                {{ $allCoaches->currentPage() }} de {{ $allCoaches->lastPage() }}
                @else
                {{ $usersFounded->currentPage() }} de {{ $usersFounded->lastPage() }}
                @endif
              </th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @if($usersFounded)
            @foreach($usersFounded as $index => $userFounded)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">{{$userFounded->name}}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$userFounded->status}}
              </td>
              <td class="px-4 py-3 text-xs">
                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                  {{$userFounded->suscription_id}}
                </span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      @if($allCoaches)
      @foreach($allCoaches as $index => $coach)
      <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3">
          <div class="flex items-center text-sm">
            <!-- Avatar with inset shadow -->
            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
              <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
            </div>
            <div>
              <p class="font-semibold">{{$coach->name}}</p>
            </div>
          </div>
        </td>
        <td class="px-4 py-3 text-sm">
          {{$coach->status}}
        </td>
        <td class="px-4 py-3 text-xs">
          <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
            {{$coach->suscription_id}}
          </span>
        </td>
      </tr>
      @endforeach
      @else
      <tr class="text-gray-700 dark:text-gray-400">
        <td class="text-center">---</td>
        <td class="text-center">---</td>
        <td class="text-center">---</td>
        <td class="text-center">---</td>
      </tr>
      @endif
      </tbody>
      </table>
    </div>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      <!-- Pagination -->
      <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        @if($allCoaches)
        {{ $allCoaches->links() }}
        @endif
      </span>
    </div>
    @endif
  </div>


  <!-- Charts -->
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Info
  </h2>
  <div class="grid gap-6 mb-8 md:grid-cols-2">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <!-- Chart legend -->
      @if($trainingsCount == 0 && $exerciseCount == 0 && $ingredientsCount == 0)
      <input class="countTrainings" hidden value="{{0}}" />
      <input class="countExercise" hidden value="{{0}}" />
      <input class="countIngredients" hidden value="{{0}}" />
      <canvas id="pie"></canvas>
      <div class="flex items-center">
        <span class="inline-block w-3 h-3 mr-1 bg-red-500 rounded-full"></span>
        <span>Sin resultados</span>
      </div>
      @else
      <input class="countTrainings" hidden value="{{$trainingsCount}}" />
      <input class="countExercise" hidden value="{{$exerciseCount}}" />
      <input class="countIngredients" hidden value="{{$ingredientsCount}}" />
      <canvas id="pie"></canvas>
      <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        <div class="flex items-center">
          <span class="inline-block w-3 h-3 mr-1 bg-blue-600 rounded-full"></span>
          <span>Ejercicios</span>
        </div>
        <div class="flex items-center">
          <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
          <span>Entrenamientos</span>
        </div>
        <div class="flex items-center">
          <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
          <span>Ingredientes</span>
        </div>
      </div>
      @endif
    </div>


    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      @if(!$userByMonth)
      <input class="user-by-month" hidden value="{{0}}" />
      <input class="user-by-monthSus" hidden value="{{0}}" />
      <canvas id="line"></canvas>
      <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        <div class="flex items-center">
          <span>Sin resultados</span>
        </div>
      </div>
      @else
      <input class="user-by-month" hidden value="{{$userByMonth}}" />
      <input class="user-by-monthSus" hidden value="{{ $userByMonthSus }}" />
      <canvas id="line"></canvas>
      <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        <div class="flex items-center">
          <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
          <span>SuperShapeUp</span>
        </div>
        <div class="flex items-center">
          <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
          <span>Usuarios Totales</span>
        </div>
      </div>
      @endif
    </div>
  </div>
  </div>
</main>
</div>
@endsection