@extends('layouts.app')

@section('content')
<div class="w-full max-w-sm">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8" method="post" action="{{ url('/images') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="image">Image</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="image" type="file" name="image">
        </div>
    
        <div class="flex items-center justify-center">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Upload</button>
        </div>
    </form>
</div>
@endsection