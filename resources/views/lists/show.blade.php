@extends('layouts.app')

@section('content')
<div id="app" class="w-full max-w-sm">
    <div class="bg-white shadow-md rounded px-8 pt-8 pb-8 mb-8">
        <ul class="list-reset">
            @foreach($list as $item)    
            <li class="@if($loop->first) border-t-2 @endif border-blue-lighter border-dashed border-b-2 p-3 px-2 text-blue">
                {{ $loop->index + 1 }}. {{ $item }}

                @if(!$loop->last)
                <a class="float-right" href="{{ url('lists/update?index=' . $loop->index . '&direction=down') }}">
                    <svg class="h-6 hover:text-blue text-blue-lighter" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g class="fill-current" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><polygon id="Combined-Shape" points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon></g></g>
                    </svg>
                </a>
                @endif
                @if(!$loop->first)
                <a class="float-right" href="{{ url('lists/update?index=' . $loop->index . '&direction=up') }}">
                    <svg class="h-6 hover:text-blue text-blue-lighter" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<g class="fill-current" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><polygon id="Combined-Shape" points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon></g></g>
                    </svg>
                </a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection