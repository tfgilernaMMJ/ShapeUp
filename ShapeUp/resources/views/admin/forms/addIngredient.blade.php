@extends('admin.templates.template')


@section('dashboard-addIngredient')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    {{ $title }}
</h2>
{!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
<form action="{{ route('admin.addIngredient', ['diet_id' => $request->route('diet_id')]) }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" id="data-input" name="dataInput">
        <div class="accordion" id="ingredientsAccordion">
            @php
            $shownTags = [];
            @endphp
            @foreach($ingredients as $option)
            @php
            $tagId = $option->tag_of_ingredient_id;
            $tagIngredients = $ingredients->where('tag_of_ingredient_id', $tagId);
            @endphp

            @if(!in_array($tagId, $shownTags))
            <div class="accordion-item">
                <h2 class="accordion-header" id="tag{{ $tagId }}Heading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tag{{ $tagId }}Collapse" aria-expanded="true" aria-controls="tag{{ $tagId }}Collapse">
                        {{ $option->tag->name }}
                    </button>
                </h2>
                <div id="tag{{ $tagId }}Collapse" class="accordion-collapse collapse" aria-labelledby="tag{{ $tagId }}Heading" data-bs-parent="#ingredientsAccordion">
                    <div class="accordion-body">
                        @foreach($tagIngredients as $tagOption)
                        <div class="form-check">
                        <input type="checkbox" name="ingredients[]" value="{{ $tagOption->id }}" id="ingredient{{ $tagOption->id }}" class="form-check-input" {{ $dietIngredients->contains('ingredient_id', $tagOption->id) ? 'checked' : '' }}>

                            <label for="ingredient{{ $tagOption->id }}" class="form-check-label">{{ $tagOption->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @php
            $shownTags[] = $tagId;
            @endphp
            @endif
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Añadir a {{ $title }}</button>
    </form>

</div>


@endsection