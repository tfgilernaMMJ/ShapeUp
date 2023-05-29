@extends('coach.templates.template')

@section('trainings-nav')
text-gray-800 dark:text-gray-100
@endsection

@section('trainings-nav-lat')
<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
@endsection

@section('dashboard-createTraining')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Creación de entrenamiento
</h2>
{!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
    <form action="{{route('coach.createTraining')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('POST')

        <div class="mb-4">
            <label for="name" class="block text-bold mb-1">Titulo</label>
            <input type="text" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="name" name="title" placeholder="Título" required>
        </div>

        <div class="mb-4">
            <label for="experience" class="block text-bold mb-1">Descripción</label>
            <textarea class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="experience" name="description" placeholder="Experiencia"></textarea>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-bold mb-1">Duración</label>
            <input type="number" value="" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="duration" name="duration" placeholder="Duración" required>
        </div>

        <div class="mb-4">
            <label for="level" class="block text-bold mb-1">Nivel</label>
            <select id="level" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example" name="level">
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Bajo">Bajo</option>
            </select>
        </div>

        <div class="mb-4 mt-3">
        <label for="category" class="block text-bold mt-3 mb-1">Categorías de entrenamiento</label>
        <select id="category" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example" name="category_of_training_id">
            @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>

    </form>
</div>



@endsection