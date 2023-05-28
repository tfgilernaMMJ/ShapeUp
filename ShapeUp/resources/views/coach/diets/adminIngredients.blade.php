@extends('coach.templates.template')



@section('users-nav')
text-gray-800 dark:text-gray-100
@endsection

@section('ingredient-nav-lat')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Ingredientes
        </h2>
        <!-- CTA -->
        <a href="{{route('coach.createIngredientView')}}" class="bg-purple-600 hover:bg-purple-800 font-bold px-4 py-3 rounded-full border border-purple-600 hover:border-purple-800 createButton text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M11.5,9.5 L16.5,9.5 L16.5,10.5 L11.5,10.5 L11.5,15.5 L10.5,15.5 L10.5,10.5 L5.5,10.5 L5.5,9.5 L10.5,9.5 L10.5,4.5 L11.5,4.5 L11.5,9.5 Z" />
            </svg>
            Nuevo Ingrediente
        </a>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            {!! Toastr::message() !!}
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Categoría</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($ingredients as $key => $ingredient)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        @if(!empty($ingredient->name))
                                            <p class="font-semibold">{{$ingredient->name}}</p>
                                            {{$ingredient->id}}
                                        @endif
                                    </div>
                                </div>
                            </td>
                            
                            @if(!empty($categories_of_ingredient))
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-2 py-1 font-semibold leading-tight text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    @foreach ($categories_of_ingredient as $category)
                                        @if ($category->id == $ingredient->tag_of_ingredient_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                    </span>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing {{ $ingredients->firstItem() }}-{{ $ingredients->lastItem() }} of {{ $ingredients->total() }}
                </span>

                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    @php
                    $pageLimit = 5; // Define aquí la cantidad máxima de páginas a mostrar
                    $currentPage = $ingredients->currentPage();
                    $start = max($currentPage - floor($pageLimit / 2), 1);
                    $end = min($start + $pageLimit - 1, $ingredients->lastPage());
                    @endphp

                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <a href="{{ $ingredients->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                            @for ($i = $start; $i <= $end; $i++) <li>
                                <a href="{{ $ingredients->url($i) }}" class="px-3 py-1 rounded-md @if ($i === $currentPage) text-white bg-purple-600 border border-r-0 border-green-600 rounded-md @else focus:outline-none focus:shadow-outline-purple @endif">
                                    {{ $i }}
                                </a>
                                </li>
                                @endfor
                                <li>
                                    <a href="{{ $ingredients->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                        </ul>
                    </nav>

                </span>
            </div>
        </div>
    </div>
</main>
</div>
@endsection