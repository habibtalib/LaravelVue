@extends('layouts.app')

@section('content')
<div class="w-full max-w-sm">
    <div class="flex mb-8 rounded shadow-md">
        <img class="w-full h-full" src="{{ asset('storage/' . $path) }}" />
    </div>
</div>
@endsection