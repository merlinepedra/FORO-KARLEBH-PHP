@extends('layouts.admin')

@section('content')

@forelse($comments as $comment)
{{ $comment->comment }}
@empty
@endforelse

{{ $comments->links() }}

@endsection