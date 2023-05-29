@extends('coach.templates.template')

@section('messaging-nav')
text-gray-800 dark:text-gray-100
@endsection

@section('messaging-nav-lat')
<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
@endsection

@section('messages-nav-lat')
@php
use App\Models\AnswerQuestion;
use App\Models\FrequentlyAskedQuestion;
@endphp
{!! Toastr::message() !!}
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Mensajería
        </h2>
        <hr class="bg-custom-600 border-6 h-50">

        @if ($coachMessages->count() == 0)
        <p class="mt-3">No tienes ninguna conversación</p>
        @else
        <ol class="list-group list-group-numbered d-flex justify-content-center align-items-center">
            <div id="exerciseAccordion" class="accordion w-75 mt-4">
                @foreach($coachMessages as $key => $message)
                @php
                $count = $message->user->frequentlyAskedQuestions->count();
                $answeredCount = 0;
                @endphp
                @foreach($message->user->frequentlyAskedQuestions as $question)
                @php
                $findAnswer = AnswerQuestion::where('frequently_asked_question_id', $question->id)->first();
                if ($findAnswer) {
                $count--;
                }
                @endphp
                @endforeach
                <div class="accordion-item">
                    <h2 class="accordion-header" id="message{{ $message->id }}Heading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#message{{ $message->id }}Collapse" aria-expanded="false" aria-controls="message{{ $message->id }}Collapse">
                            <span class="me-2">{{ $message->user->name }}</span>
                            @if ($answeredCount == $count)
                            <span class="badge bg-primary rounded-pill">
                                <i class='bx bx-check-square' ></i> Respondido
                            </span>
                            @else
                            <span class="badge bg-primary rounded-pill">
                                {{ $count - $answeredCount }}
                            </span>
                            @endif
                        </button>
                    </h2>
                    @foreach($message->user->frequentlyAskedQuestions as $userQuestion)
                    <div id="message{{ $message->id }}Collapse" class="accordion-collapse collapse" aria-labelledby="message{{ $message->id }}Heading" data-bs-parent="#accordionExample">
                        <div class="accordion-body d-flex justify-content-between align-items-center">

                            <span class="badge bg-purple-600 rounded-pill"> Pregunta: {{$userQuestion->message}} </span>
                            @php
                            $findAnswer = AnswerQuestion::where('frequently_asked_question_id', $userQuestion->id)->first();
                            @endphp
                            @if ($findAnswer && $findAnswer->frequently_asked_question_id == $userQuestion->id)
                            <span class="badge bg-success rounded-pill"> Respuesta: {{$findAnswer->answer_message}} </span>
                            @else
                            <!-- Modal trigger button -->
                            <button type="button" class="btn-lg customHover" data-bs-toggle="modal" data-bs-target="#modal{{$userQuestion->id}}">
                                Responder
                            </button>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal{{$userQuestion->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">¿Desea responder?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('coach.answer', ['frequently_id' => $userQuestion->id, 'user_id' => $userQuestion->user->id])}}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <strong>{{$userQuestion->message}}</strong>
                                                <br><br>
                                                <div class="mb-4">
                                                    <label for="answer_message" class="block text-bold mb-1">Respuesta</label>
                                                    <textarea class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="answer_message" name="answer_message" placeholder="Escribe para responder" required></textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Responder</button>
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif



                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modal{{$userQuestion->id}}'), options)
                            </script>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </ol>
        @endif
    </div>
</main>
@endsection