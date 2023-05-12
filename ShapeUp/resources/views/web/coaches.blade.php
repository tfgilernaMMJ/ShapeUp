@extends('web.templates.template')

@section('titulo')
    Entrenadores
@endsection

@section('coaches-nav')
    active
@endsection

@section('coaches-section')
    @php
        $request = request();
    @endphp

    <main id="main" data-aos="fade-in">
        <div class="breadcrumbs">
            <div class="container">
                <h2>Entrenadores</h2>
                <p>Es posible que no podamos evitar algunas dificultades para elegir lo que nos hace feliz. Pero debemos buscar la felicidad y el placer en nuestras elecciones. Debemos perseverar a pesar de las dificultades y trabajar duro para lograr nuestros objetivos. Todo esfuerzo vale la pena y nos acerca a nuestras metas. Conócenos y realiza tu ShapeUp.</p>
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

        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="container" data-aos="zoom-out">
                    <div class="section-title">
                        <h2>Entrenadores</h2>
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
                                <a type="button" class="mb-3" href="{{route('account.coaches')}}">Reiniciar filtros</a>
                                <form action="{{route('account.coaches.filters')}}" method="post" role="form" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 form-group">
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
                                        <div class="col-md-4 form-group mt-3 mt-md-0">
                                            <label for="age_sort">Edad:</label>
                                            <select type="text" class="form-control {{ $errors->has('age_sort') ? ' is-invalid' : '' }}"" name="age_sort">
                                                <option value="" {{ $request->input('age_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="asc" {{ $request->input('age_sort') == 'asc' ? 'selected' : '' }}>Menor a mayor</option>
                                                <option value="desc" {{ $request->input('age_sort') == 'desc' ? 'selected' : '' }}>Mayor a menor</option>
                                            </select>
                                            @if ($errors->has('age_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('age_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group mt-3 mt-md-0">
                                            <label for="experience_sort">Experiencia:</label>
                                            <select type="text" class="form-control {{ $errors->has('experience_sort') ? ' is-invalid' : '' }}"" name="experience_sort">
                                                <option value="" {{ $request->input('experience_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="asc" {{ $request->input('experience_sort') == 'asc' ? 'selected' : '' }}>Menor a mayor</option>
                                                <option value="desc" {{ $request->input('experience_sort') == 'desc' ? 'selected' : '' }}>Mayor a menor</option>
                                            </select>
                                            @if ($errors->has('experience_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('experience_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label for="followers_sort">Número de seguidores:</label>
                                            <select type="text" class="form-control {{ $errors->has('followers_sort') ? ' is-invalid' : '' }}"" name="followers_sort">
                                                <option value="" {{ $request->input('followers_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="asc" {{ $request->input('followers_sort') == 'asc' ? 'selected' : '' }}>Menor a mayor</option>
                                                <option value="desc" {{ $request->input('followers_sort') == 'desc' ? 'selected' : '' }}>Mayor a menor</option>
                                            </select>
                                            @if ($errors->has('followers_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('followers_sort') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label for="coacheslike_sort">Entrenadores:</label>
                                            <select type="text" class="form-control {{ $errors->has('coacheslike_sort') ? ' is-invalid' : '' }}"" name="coacheslike_sort">
                                                <option value="" {{ $request->input('coacheslike_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="like" {{ $request->input('coacheslike_sort') == 'like' ? 'selected' : '' }}>Seguidos</option>
                                                <option value="notlike" {{ $request->input('coacheslike_sort') == 'notlike' ? 'selected' : '' }}>No seguidos</option>
                                            </select>
                                            @if ($errors->has('coacheslike_sort'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('coacheslike_sort') }}</strong>
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
                <div class="row" data-aos="zoom-in" data-aos-delay="100">  
                    @if (count($coaches) == 0)
                        <p>
                            No se han encontrado resultados.
                        </p>
                    @else
                        @foreach ($coaches as $coach)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <img src="{{ asset('web/assets/img/coaches/'. $coach->photo) }}" class="img-fluid" alt="">
                                    <div class="member-content">
                                        <h4>{{ $coach->name }}</h4>
                                        <span>País: {{ $coach->country }}</span>
                                        <span>Edad: {{ $coach->age }}</span>
                                        <span>Experiencia: {{ $coach->experience }}</span>
                                        <span>Seguidores: {{ count(DB::table('user_follow_coaches')->where('user_coach_id', $coach->id)->get()) }}</span>
                                        <span>Entrenamientos: {{ count(DB::table('trainings')->where('user_coach_id', $coach->id)->get()) }}</span>
                                        <span>Dietas: {{ count(DB::table('diets')->where('user_coach_id', $coach->id)->get()) }}</span>
                                        <p>
                                            {{ $coach->biography }}
                                        </p>
                                        <div class="social">
                                            @if(count(DB::table('user_follow_coaches')->where('user_id', Auth::user()->id)->where('user_coach_id', $coach->id)->get()) > 0)
                                                <a href="{{ route('account.coaches.follow', ['action' => 'unfollow', 'coach_id' => $coach->id]) }}"><i class="bi bi-heart-fill"></i></a>
                                                @if (Auth::user()->suscription_id == 2)       
                                                    <a href="{{ route('account.coaches.message', ['coach_id' => $coach->id]) }}"><i class="bi bi-chat-left-dots-fill"></i></a>
                                                @endif
                                            @else       
                                                <a href="{{ route('account.coaches.follow', ['action' => 'follow', 'coach_id' => $coach->id]) }}"><i class="bi bi-heart"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(count($coaches) != 0)
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Mostrando {{ $coaches->firstItem() }}-{{ $coaches->lastItem() }} de {{ $coaches->total() }}
                    </span>
    
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <a href="{{ $coaches->appends(['name_sort' => $request->input('name_sort'), 'age_sort' => $request->input('age_sort'), 'experience_sort' => $request->input('experience_sort'), 'followers_sort' => $request->input('followers_sort'), 'coacheslike_sort' => $request->input('coacheslike_sort')])->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-green" aria-label="Previous">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $coaches->lastPage(); $i++)
                                    <li>
                                        <a href="{{ $coaches->appends(['name_sort' => $request->input('name_sort'), 'age_sort' => $request->input('age_sort'), 'experience_sort' => $request->input('experience_sort'), 'followers_sort' => $request->input('followers_sort'), 'coacheslike_sort' => $request->input('coacheslike_sort')])->url($i) }}" class="px-3 py-1 rounded-md @if ($i === $coaches->currentPage()) text-white bg-purple-600 border border-r-0 border-green-600 rounded-md @else focus:outline-none focus:shadow-outline-green @endif">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor
                                <li>
                                    <a href="{{ $coaches->appends(['name_sort' => $request->input('name_sort'), 'age_sort' => $request->input('age_sort'), 'experience_sort' => $request->input('experience_sort'), 'followers_sort' => $request->input('followers_sort'), 'coacheslike_sort' => $request->input('coacheslike_sort')])->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-green" aria-label="Next">
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