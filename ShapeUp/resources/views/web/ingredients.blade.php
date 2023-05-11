@extends('web.templates.template')

@section('titulo')
    Alimentos
@endsection

@section('ingredients-nav')
    active
@endsection

@section('ingredients-section')
    <main id="main" data-aos="fade-in">
        <div class="breadcrumbs">
            <div class="container">
                <h2>Alimentos</h2>
                <p>Bienvenido a nuestra sección de alimentos. Nuestros expertos han seleccionado cuidadosamente una variedad de alimentos saludables para ayudarte a mantener una dieta equilibrada y alcanzar tus objetivos de bienestar.</p>
            </div>
        </div>        

        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="container" data-aos="zoom-out">
                    <div class="section-title">
                        <h2>Alimentos</h2>
                        <p>
                            Filtros
                            <a type="button" onclick="mostrarFiltroTrainer()">
                                <i id="iconofiltertrainer" class="bi bi-arrow-down-circle-fill"></i>
                            </a>                              
                        </p>
                    </div>
                </div>
                <section id="contact" class="contact contactfiltertrainer" style="display:none">
                    <div class="container" data-aos="fade-up">
                        <div class="row mt-1">
                            <div class="col-lg-12 mt-1 mt-lg-0">
                                <a type="button" class="mb-3" href="{{route('account.ingredients')}}">Reiniciar filtros</a>
                                <form action="{{route('account.ingredients.filters')}}" method="get" role="form" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="name_sort">Nombre:</label>
                                            <select type="text" class="form-control" name="name_sort">
                                                <option value="" {{ $request->input('name_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="asc" {{ $request->input('name_sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
                                                <option value="desc" {{ $request->input('name_sort') == 'desc' ? 'selected' : '' }}>Z-A</option>
                                            </select>                                            
                                            @if ($errors->has('name_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label for="tag_sort">Tipos:</label>
                                            <select type="text" class="form-control {{ $errors->has('tag_sort') ? ' is-invalid' : '' }}"" name="tag_sort">
                                                <option value="" {{ $request->input('tag_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}" {{ $request->input('tag_sort') == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('tag_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tag_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit">Buscar</button>
                                    </div>                            
                                </form>
                            </div>                    
                        </div>
                    </div>
                </section>
                <div class="row mb-4" data-aos="zoom-in" data-aos-delay="100">

                    @if (count($ingredients) == 0)
                        <p>
                            No se han encontrado resultados.
                        </p>
                    @else
                        @foreach ($ingredients as $ingredient)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-3">
                                <div class="course-item">
                                    <img src="{{ asset('web/assets/img/dietingredient.jpg') }}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Tipo: {{$ingredient->tag->name}}</h4>
                                        </div>

                                        <h6>{{$ingredient->name}}</h6>
                                        {{-- <p>Series: {{$exercise->series}}</p>
                                        <p>Repeticiones: {{$exercise->repetitions}}</p>
                                        <p>Descanso: {{$exercise->duration}} segundos</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                                <span>{{ $exercise->coach->name }}</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(count($ingredients) != 0)
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Mostrando {{ $ingredients->firstItem() }}-{{ $ingredients->lastItem() }} de {{ $ingredients->total() }}
                    </span>
    
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <a href="{{ $ingredients->appends(['name_sort' => $request->input('name_sort'), 'tag_sort' => $request->input('tag_sort')])->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-green" aria-label="Previous">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $ingredients->lastPage(); $i++)
                                    <li>
                                        <a href="{{ $ingredients->appends(['name_sort' => $request->input('name_sort'), 'tag_sort' => $request->input('tag_sort')])->url($i) }}" class="px-3 py-1 rounded-md @if ($i === $ingredients->currentPage()) text-white bg-purple-600 border border-r-0 border-green-600 rounded-md @else focus:outline-none focus:shadow-outline-green @endif">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor
                                    <li>
                                        <a href="{{ $ingredients->appends(['name_sort' => $request->input('name_sort'), 'tag_sort' => $request->input('tag_sort')])->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-green" aria-label="Next">
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </li>
                            </ul>
                        </nav>
                    </span>
                </div>
                @endif
            </div>
        </section>
    </main>

    <script>
        function mostrarFiltroTrainer() {
        const iconoFiltro = document.querySelector('#iconofiltertrainer');
        const contactSection = document.querySelector('.contactfiltertrainer');
    
            if (contactSection.style.display === "none") {
                contactSection.style.display = "block";
                iconoFiltro.classList.remove("bi-arrow-down-circle-fill");
                iconoFiltro.classList.add("bi-arrow-up-circle-fill");
            } else {
                contactSection.style.display = "none";
                iconoFiltro.classList.remove("bi-arrow-up-circle-fill");
                iconoFiltro.classList.add("bi-arrow-down-circle-fill");
            }
        }
    
    </script>
@endsection