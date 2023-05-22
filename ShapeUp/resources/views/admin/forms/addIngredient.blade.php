@extends('admin.templates.template')


@section('dashboard-addIngredient')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    {{ $title }}
</h2>
    {!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
    <form action="{{route('admin.addIngredient',['diet_id' => $request->route('diet_id')])}}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" id="data-input" name="dataInput">
        <div class="mb-4 d-flex justify-content-center flex-column">
            <label for="exercises" class="block text-bold mb-1">
                Ingredientes
            </label>
            <select name="ingredient" id="ingredients" class="block w-75 py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example">
                <option selected class="bg-purple-600">Open this select menu</option>
                @foreach($ingredients as $option)
                    <option value="{{ $option->id }}" class="fw-bold text-purple-600">{{ $option->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir a {{ $title }}</button>
    </form>
</div>
@endsection