@extends('coach.templates.template')


@section('dashboard-editExercise')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Edición de {{ $exercise->name }}
</h2>
{!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
    <form action="{{route('coach.editExercise',['id' => $exercise->id])}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-bold mb-1">Nombre</label>
            <input type="text" value="{{ old('name', $exercise->name) }}" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="name" name="name" placeholder="Título" required>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-bold mb-1">Duración</label>
            <input type="text" value="{{ old('duration', $exercise->duration) }}" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="duration" name="duration" placeholder="Duración" required>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-bold mb-1">Repeticiones</label>
            <input type="number" value="{{ old('repetitions', $exercise->repetitions) }}" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="repetitions" name="repetitions" placeholder="Repeticiones" required>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-bold mb-1">Series</label>
            <input type="number" value="{{ old('series', $exercise->series) }}" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="series" name="series" placeholder="Series" required>
        </div>

        <div class="mb-4 mt-3">
        <label for="category" class="block text-bold mt-3 mb-1">Categorías de ejercicios</label>
        <select id="category" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example" name="tag_of_exercise_id">
            @foreach ($categories as $category)
            @if($category->id == $exercise->tag_of_exercise_id)
                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
</div>



@endsection