@extends('admin.templates.template')


@section('dashboard-addExercise')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    {{ $coach->name }}
</h2>
    {!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
    <form action="{{route('admin.addExercise',['training_id' => $request->route('training_id')])}}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" id="data-input" name="dataInput">
        <div class="mb-4 d-flex justify-content-center flex-column">
            <label for="exercises" class="block text-bold mb-1">
                Ejercicios
            </label>
            <select name="exercise" id="exercises" class="block w-75 py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example">
                <option selected class="bg-purple-600">Open this select menu</option>
                @foreach($coachExercises as $option)
                    <option value="{{ $option->id }}" class="fw-bold text-purple-600">{{ $option->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir a {{ $title }}</button>
    </form>
</div>
@endsection