@extends('coach.templates.template')


@section('dashboard-createExercise')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Creación de ejercicio
</h2>
{!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
    <form action="{{route('coach.createExercise')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('POST')

        <div class="mb-4">
            <label for="name" class="block text-bold mb-1">Nombre</label>
            <input type="text" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="name" name="name" placeholder="Nombre" required>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-bold mb-1">Duración</label>
            <input type="text" value="" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="duration" name="duration" placeholder="Duración" required>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-bold mb-1">Repeticiones</label>
            <input type="number" value="" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="repetitions" name="repetitions" placeholder="Repeticiones" required>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-bold mb-1">Series</label>
            <input type="number" value="" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="series" name="series" placeholder="Series" required>
        </div>

        <div class="mb-4 mt-3">
        <label for="category" class="block text-bold mt-3 mb-1">Categorías de ejercicios</label>
        <select id="category" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example" name="tag_of_exercise_id">
            @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>

    </form>
</div>



@endsection