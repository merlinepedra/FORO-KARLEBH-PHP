@extends('layouts.admin')

@section('title', 'Categories')

@section('content')

<create-category :categories="{{ \App\Models\Category::withCount('posts')->get() }}"></create-category>

@endsection