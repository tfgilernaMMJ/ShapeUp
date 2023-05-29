@extends('coach.templates.template')

@section('messages-nav-lat')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Mensajería
            <hr class="bg-custom-600 border-4 h-25">
        </h2>

        <ol class="list-group list-group-numbered d-flex justify-content-center align-items-center">
            <div id="exerciseAccordion" class="accordion w-75 mt-4">
                @foreach($coachMessages as $key => $message)
                <div class="accordion-item">
                    <h2 class="accordion-header bg-purple" id="message{{ $message->id }}Heading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#message{{ $message->id }}Collapse" aria-expanded="false" aria-controls="message{{ $message->id }}Collapse">
                                <span class="me-2">{{ $message->user->name }}</span>
                                <span class="badge bg-primary rounded-pill">{{ $message->user->frequentlyAskedQuestions->count() }}</span>
                            </button>
                        </div>
                    </h2>
                    <div id="message{{ $message->id }}Collapse" class="accordion-collapse collapse" aria-labelledby="message{{ $message->id }}Heading" data-bs-parent="#exerciseAccordion">
                        <div class="accordion-body d-flex justify-content-between align-items-center">
                            {{$message->message}}
                            <!-- Modal trigger button -->
                            <button type="button" class="btn-lg" data-bs-toggle="modal" data-bs-target="#modal{{$message->id}}">
                                Responder
                            </button>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal{{$message->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action=" method="POST">
                                                <div class="mb-4">
                                                    <label for="answer_message" class="block text-bold mb-1">Respuesta</label>
                                                    <textarea class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="answer_message" name="answer_message" placeholder="Escribe para responder" required></textarea>
                                                </div>                                          
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Responder</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modal{{$message->id}}'), options)
                            </script>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </ol>
    </div>
</main>
@endsection
