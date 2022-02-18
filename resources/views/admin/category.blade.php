@extends('layouts.admin')

@section('content')

<create-category class="grid grid-cols-2" :categories="{{ \App\Models\Category::withCount('posts')->get() }}"></create-category>

@endsection