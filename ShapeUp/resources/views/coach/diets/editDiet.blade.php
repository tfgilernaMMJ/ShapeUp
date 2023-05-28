@extends('coach.templates.template')


@section('dashboard-editDiet')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Edición de {{ $diet->title }}
</h2>
{!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
    <form action="{{route('coach.editDiet',['id' => $diet->id])}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-bold mb-1">Título</label>
            <input type="" value="{{ old('title', $diet->title) }}" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="name" name="title" placeholder="Título" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-bold mb-1">Descripción</label>
            <textarea class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="description" name="description" placeholder="Descripción">{{ old('description', $diet->description) }}</textarea>
        </div>
        
        <div class="mb-4 mt-3">
        <label for="category" class="block text-bold mt-3 mb-1">Categorías de dietas</label>
        <select id="category" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example" name="category_of_diet_id">
            @foreach ($categories as $category)
                @if($category->id == $diet->tag_of_exercise_id)
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