@extends('coach.templates.template')


@section('coach-addExercise')
<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    {{ $coach->name }}
</h2>
{!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
<form action="{{ route('coach.addExercise', ['training_id' => $request->route('training_id')]) }}" method="POST">
    @csrf
    @method('POST')

    <div class="accordion" id="exerciseAccordion">
        @php
        $shownTags = [];
        @endphp

        @foreach($coachExercises as $option)
        @php
        $tagId = $option->tag_of_exercise_id;
        $tagExercises = $coachExercises->where('tag_of_exercise_id', $tagId);
        @endphp

        @if(!in_array($tagId, $shownTags))
        <div class="accordion-item">
        <h2 class="accordion-header bg-purple" id="tag{{ $tagId }}Heading">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tag{{ $tagId }}Collapse" aria-expanded="false" aria-controls="tag{{ $tagId }}Collapse">
            {{ $option->tag->name }}
        </button>
    </h2>
            <div id="tag{{ $tagId }}Collapse" class="accordion-collapse collapse" aria-labelledby="tag{{ $tagId }}Heading" data-bs-parent="#exerciseAccordion">
                <div class="accordion-body">
                    @foreach($tagExercises as $tagOption)
                    <div class="form-check">
                        <input type="checkbox" name="exercises[]" value="{{ $tagOption->id }}" id="exercise{{ $tagOption->id }}" class="form-check-input" {{ $trainingExercises->contains('exercise_id', $tagOption->id) ? 'checked' : '' }}>
                        <label for="exercise{{ $tagOption->id }}" class="form-check-label">{{ $tagOption->name }}</label>
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

    <button type="submit" class="btn btn-primary mt-3">Añadir</button>
</form>

</div>

@endsection