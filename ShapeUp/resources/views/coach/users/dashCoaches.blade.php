@extends('coach.templates.template')



@section('users-nav')
text-gray-800 dark:text-gray-100
@endsection

@section('coaches-nav-lat')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Entrenadores
        </h2>
        <!-- CTA -->
        <a href="" class="bg-purple-600 hover:bg-purple-800 font-bold px-4 py-3 rounded-full border border-purple-600 hover:border-purple-800 createButton text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M11.5,9.5 L16.5,9.5 L16.5,10.5 L11.5,10.5 L11.5,15.5 L10.5,15.5 L10.5,10.5 L5.5,10.5 L5.5,9.5 L10.5,9.5 L10.5,4.5 L11.5,4.5 L11.5,9.5 Z" />
            </svg>
            Nuevo Entrenador
        </a>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            {!! Toastr::message() !!}
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Edad</th>
                                <th class="px-4 py-3">País</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($coaches as $key => $coach)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        @if(!empty($coach->name))
                                            <p class="font-semibold">{{$coach->name}}</p>
                                            {{$coach->id}}
                                        @endif
                                    </div>
                                </div>
                            </td>
                            @if(!empty($coach->email))
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$coach->email}}
                                </span>
                            </td>
                            @endif
                            @if(!empty($coach->age))
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$coach->age}}
                                </span>
                            </td>
                            @endif
                            
                            @if(!empty($coach->country))
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{$coach->country}}
                                    </span>
                                </td>
                            @endif
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    
                                        <button data-bs-toggle="modal" data-bs-target="#modalEditId-{{$coach->id}}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit" data-toggle="modal" data-target="#editModal-{{$coach->id}}">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                        <button data-bs-toggle="modal" data-bs-target="#modalDeleteId-{{$coach->id}}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" data-toggle="modal" data-target="#deleteModal-{{$coach->id}}">

                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEditId-{{$coach->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">Entrenador -  Editar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        ¿Desea editar?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                        <a href="" class="btn btn-secondary">Editar</a>
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDeleteId-{{$coach->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">Entrenador - Eliminar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        ¿Desea eliminar?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Eliminar</button>
                                                    </form>
                                                    <button type="button" class="btn btn-light">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        var modaEditlId = document.getElementById('modalEdit-{{$coach->id}}');

                                        modaEditlId.addEventListener('show.bs.modal', function(event) {
                                            // Button that triggered the modal
                                            let button = event.relatedTarget;
                                            // Extract info from data-bs-* attributes
                                            let recipient = button.getAttribute('data-bs-whatever');

                                            // Use above variables to manipulate the DOM
                                        });
                                        var modalDelete = document.getElementById('modalDelete-{{$coach->id}}');

                                        modalDelete.addEventListener('show.bs.modal', function(event) {
                                            // Button that triggered the modal
                                            let button = event.relatedTarget;
                                            // Extract info from data-bs-* attributes
                                            let recipient = button.getAttribute('data-bs-whatever');

                                            // Use above variables to manipulate the DOM
                                        });
                                    </script>


                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing {{ $coaches->firstItem() }}-{{ $coaches->lastItem() }} of {{ $coaches->total() }}
                </span>

                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    @php
                    $pageLimit = 5; // Define aquí la cantidad máxima de páginas a mostrar
                    $currentPage = $coaches->currentPage();
                    $start = max($currentPage - floor($pageLimit / 2), 1);
                    $end = min($start + $pageLimit - 1, $coaches->lastPage());
                    @endphp

                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <a href="{{ $coaches->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                            @for ($i = $start; $i <= $end; $i++) <li>
                                <a href="{{ $coaches->url($i) }}" class="px-3 py-1 rounded-md @if ($i === $currentPage) text-white bg-purple-600 border border-r-0 border-green-600 rounded-md @else focus:outline-none focus:shadow-outline-purple @endif">
                                    {{ $i }}
                                </a>
                                </li>
                                @endfor
                                <li>
                                    <a href="{{ $coaches->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
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