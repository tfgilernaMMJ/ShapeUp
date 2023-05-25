@extends('admin.templates.template')


@section('dashboard-ingredients-categories')

@include('admin.templates.tables')
@endsection

@section('categories-nav')
text-gray-800 dark:text-gray-100
@endsection

@section('categories-nav-lat')
<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
@endsection