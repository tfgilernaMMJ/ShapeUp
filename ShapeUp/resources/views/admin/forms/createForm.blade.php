@extends('admin.templates.template')


@section('dashboard-createForm')

<h2 class="my-6 mt-4 px-3 ml-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Creación de {{ $entidad }}
</h2>
{!! Toastr::message() !!}
<div class="container bg-transparent mt-5">
<form action="{{ route('admin.create', ['entity' => $entidad, 'category' => request()->category]) }}" method="GET">
    <input type="hidden" id="data-input" value="{{ json_encode($dataInput) }}" name="dataInput">
        @foreach($data as $key => $input)
        <div class="mb-4">
            <label for="{{ $dataInput[$key] }}" class="block text-bold mb-1">
                @if(is_object($input))
                {{ucwords($key)}}
                @else
                {{ucwords($input) }}
                @endif

            </label>
            @if(is_object($input))
            <select name="{{ $dataInput[$key] }}" id="{{ $key }}" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" aria-label=".form-select-lg example">
                <option selected class="bg-purple-600">Open this select menu</option>
                @foreach($input as $option)
                <option value="{{ $option->id }}" class="fw-bold text-purple-600">{{ $option->name }}</option>
                @endforeach
            </select>
            @else
            <input type="text" class="block w-full py-2 px-3 bg-gray-100 rounded-lg" id="{{ $key }}" name="{{ $dataInput[$key] }}" placeholder="Enter your {{ $key }}">
            @endif
        </div>
        @endforeach



        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>



@endsection