@extends('web.templates.template')

@section('titulo')
    Dietas
@endsection

@section('diets-nav')
    active
@endsection

@section('diets-section')
    <main id="main" data-aos="fade-in">
        <div class="breadcrumbs">
            <div class="container">
                <h2>Dietas</h2>
                <p>Bienvenido a nuestra página de dietas. Aquí encontrarás una variedad de planes de alimentación diseñados para ayudarte a alcanzar tus objetivos de salud y bienestar. Nuestros entrenadores expertos han creado dietas equilibradas y adaptadas a diferentes necesidades y preferencias.</p>
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
                        <h2>Dietas</h2>
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
                                <a type="button" class="mb-3" href="{{route('account.diets')}}">Reiniciar filtros</a>
                                <form action="{{route('account.diets.filters')}}" method="post" role="form" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 form-group">
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
                                        <div class="col-md-3 form-group mt-3 mt-md-0">
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
                                        <div class="col-md-3 form-group mt-3 mt-md-0">
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
                                        <div class="col-md-3 form-group mt-3 mt-md-0">
                                            <label for="dietslike_sort">Dietas:</label>
                                            <select type="text" class="form-control {{ $errors->has('dietslike_sort') ? ' is-invalid' : '' }}"" name="dietslike_sort">
                                                <option value="" {{ $request->input('dietslike_sort') == '' ? 'selected' : '' }}>Sin filtro</option>
                                                <option value="like" {{ $request->input('dietslike_sort') == 'like' ? 'selected' : '' }}>Marcadas como me gusta</option>
                                                <option value="notlike" {{ $request->input('dietslike_sort') == 'notlike' ? 'selected' : '' }}>No marcadas como me gusta</option>
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

                    @if (count($diets) == 0)
                        <p>
                            No se han encontrado resultados.
                        </p>
                    @else
                        @foreach ($diets as $diet)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-3">
                                <div class="course-item">
                                    <img src="{{ asset('web/assets/img/diets.jpg') }}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4>Nivel: {{$training->level}}</h4>
                                        </div> --}}

                                        <h6><a href="{{route('account.diets.ingredients', ['diet_id' => $diet->id])}}">{{$diet->title}}</a></h6>
                                        <p>{{$diet->description}}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                                <span>{{ $diet->coach->name }}</span>
                                            </div>
                                            <div class="trainer-rank d-flex align-items-center">
                                                @if(count(DB::table('user_follow_diets')->where('user_id', Auth::user()->id)->where('diet_id', $diet->id)->get()) > 0)
                                                    <a href="{{ route('account.diets.follow', ['action' => 'unfollow', 'view' => 'diet' , 'diet_id' => $diet->id]) }}"><i class="bi bi-heart-fill"></i></a>&nbsp;{{ count(DB::table('user_follow_diets')->where('diet_id', $diet->id)->get()) }}
                                                @else       
                                                    <a href="{{ route('account.diets.follow', ['action' => 'follow', 'view' => 'diet' , 'diet_id' => $diet->id]) }}"><i class="bi bi-heart"></i></a>&nbsp;{{ count(DB::table('user_follow_diets')->where('diet_id', $diet->id)->get()) }}
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
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Mostrando {{ $diets->firstItem() }}-{{ $diets->lastItem() }} de {{ $diets->total() }}
                    </span>
    
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <a href="{{ $diets->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-green" aria-label="Previous">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $diets->lastPage(); $i++)
                                    <li>
                                        <a href="{{ $diets->url($i) }}" class="px-3 py-1 rounded-md @if ($i === $diets->currentPage()) text-white bg-purple-600 border border-r-0 border-green-600 rounded-md @else focus:outline-none focus:shadow-outline-green @endif">
                                            {{ $i }}
                                        </a>
                                    </li>
                                    @endfor
                                    <li>
                                        <a href="{{ $diets->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-green" aria-label="Next">
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