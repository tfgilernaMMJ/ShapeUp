@extends('web.templates.template')

@section('titulo')
    Entrenamientos
@endsection

@section('trainings-nav')
    active
@endsection

@section('trainings-section')
    <main id="main" data-aos="fade-in">
        <div class="breadcrumbs">
            <div class="container">
                <h2>Entrenamientos</h2>
                <p>Bienvenido a nuestra página de entrenamientos. Ofrecemos una amplia variedad de programas de ejercicios diseñados para satisfacer las necesidades de todos los niveles, desde principiantes hasta avanzados. Nuestros entrenadores altamente capacitados han creado planes de entrenamiento cuidadosamente estructurados que te ayudarán a alcanzar tus objetivos de fitness y a llevar una vida saludable.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="d-flex justify-content-center align-items-center mt-3">
                <div class="alert alert-success alert-dismissible fade show w-75" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="d-flex justify-content-center align-items-center mt-3">
                <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="container" data-aos="zoom-out">
                    <div class="section-title">
                        <h2>Entrenamientos</h2>
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
                                <a type="button" class="mb-3" href="{{route('account.trainings')}}">Reiniciar filtros</a>
                                <form action="{{route('account.trainings.filters')}}" method="get" role="form" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="category_sort">Categoría:</label>
                                            <select type="text" class="form-control {{ $errors->has('category_sort') ? ' is-invalid' : '' }}"" name="category_sort">
                                                <option value="" {{ $request->input('category_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $request->input('category_sort') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('category_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group mt-3 mt-md-0">
                                            <label for="level_sort">Nivel:</label>
                                            <select type="text" class="form-control {{ $errors->has('level_sort') ? ' is-invalid' : '' }}"" name="level_sort">
                                                <option value="" {{ $request->input('level_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="Alto" {{ $request->input('level_sort') == 'Alto' ? 'selected' : '' }}>Alto</option>
                                                <option value="Medio" {{ $request->input('level_sort') == 'Medio' ? 'selected' : '' }}>Medio</option>
                                                <option value="Bajo" {{ $request->input('level_sort') == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                                            </select>
                                            @if ($errors->has('level_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('level_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group mt-3 mt-md-0">
                                            <label for="coach_sort">Entrenador:</label>
                                            <select type="text" class="form-control {{ $errors->has('coach_sort') ? ' is-invalid' : '' }}"" name="coach_sort">
                                                <option value="" {{ $request->input('coach_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                @foreach($coaches as $coach)
                                                    <option value="{{ $coach->id }}" {{ $request->input('coach_sort') == $coach->id ? 'selected' : '' }}>{{ $coach->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('coach_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('coach_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label for="like_sort">Número de me gustas:</label>
                                            <select type="text" class="form-control {{ $errors->has('like_sort') ? ' is-invalid' : '' }}"" name="like_sort">
                                                <option value="" {{ $request->input('like_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="asc" {{ $request->input('like_sort') == 'asc' ? 'selected' : '' }}>Menor a mayor</option>
                                                <option value="desc" {{ $request->input('like_sort') == 'desc' ? 'selected' : '' }}>Mayor a menor</option>
                                            </select>
                                            @if ($errors->has('like_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('like_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label for="trainingslike_sort">Entrenamientos:</label>
                                            <select type="text" class="form-control {{ $errors->has('trainingslike_sort') ? ' is-invalid' : '' }}"" name="trainingslike_sort">
                                                <option value="" {{ $request->input('trainingslike_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="like" {{ $request->input('trainingslike_sort') == 'like' ? 'selected' : '' }}>Marcados como me gusta</option>
                                                <option value="notlike" {{ $request->input('trainingslike_sort') == 'notlike' ? 'selected' : '' }}>No marcados como me gusta</option>
                                            </select>
                                            @if ($errors->has('trainingslike_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('trainingslike_sort') }}</strong>
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

                    @if (count($trainings) == 0)
                        <p>
                            No se han encontrado resultados.
                        </p>
                    @else
                        @foreach ($trainings as $training)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-3">
                                <div class="course-item">
                                    <img src="{{ asset('web/assets/img/trainings.jpg') }}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4>Nivel: {{$training->level}}</h4>
                                        </div>

                                        <h6><a href="{{route('account.trainings.exercises', ['training_id' => $training->id])}}">{{$training->title}}</a></h6>
                                        <p>{{$training->description}}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                                <span>{{ $training->coach->name }}</span>
                                            </div>
                                            <div class="trainer-rank d-flex align-items-center">
                                                @if(count(DB::table('user_follow_trainings')->where('user_id', Auth::user()->id)->where('training_id', $training->id)->get()) > 0)
                                                    <a href="{{ route('account.trainings.follow', ['action' => 'unfollow', 'view' => 'training' ,'training_id' => $training->id]) }}"><i class="bi bi-heart-fill"></i></a>&nbsp;{{ count(DB::table('user_follow_trainings')->where('training_id', $training->id)->get()) }}
                                                @else       
                                                    <a href="{{ route('account.trainings.follow', ['action' => 'follow', 'view' => 'training' , 'training_id' => $training->id]) }}"><i class="bi bi-heart"></i></a>&nbsp;{{ count(DB::table('user_follow_trainings')->where('training_id', $training->id)->get()) }}
                                                @endif
                                                {{-- <a href=""></a><i class="bx bx-heart"></i>&nbsp;42 --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(count($trainings) != 0)
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Mostrando {{ $trainings->firstItem() }}-{{ $trainings->lastItem() }} de {{ $trainings->total() }}
                    </span>
    
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <a href="{{ $trainings->appends(['category_sort' => $request->input('category_sort'), 'level_sort' => $request->input('level_sort'), 'coach_sort' => $request->input('coach_sort'), 'like_sort' => $request->input('like_sort'), 'trainingslike_sort' => $request->input('trainingslike_sort')])->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-green" aria-label="Previous">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $trainings->lastPage(); $i++)
                                    <li>
                                        <a href="{{ $trainings->appends(['category_sort' => $request->input('category_sort'), 'level_sort' => $request->input('level_sort'), 'coach_sort' => $request->input('coach_sort'), 'like_sort' => $request->input('like_sort'), 'trainingslike_sort' => $request->input('trainingslike_sort')])->url($i) }}" class="px-3 py-1 rounded-md @if ($i === $trainings->currentPage()) text-white bg-green-600 border border-r-0 border-green-600 rounded-md @else focus:outline-none focus:shadow-outline-green @endif">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor
                                <li>
                                    <a href="{{ $trainings->appends(['category_sort' => $request->input('category_sort'), 'level_sort' => $request->input('level_sort'), 'coach_sort' => $request->input('coach_sort'), 'like_sort' => $request->input('like_sort'), 'trainingslike_sort' => $request->input('trainingslike_sort')])->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-green" aria-label="Next">
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