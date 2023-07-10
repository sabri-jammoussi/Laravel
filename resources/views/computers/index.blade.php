@extends('layout')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <h1>SABRI COMPUTERS</h1>
        </div>
        <div>
            @if(count($computers)>0)
            <ul>
                @foreach ($computers as $computer)

                <a href="{{ route ('computers.show', ['computer' => $computer['id'] ] ) }}">
                    <li>
                        <p>{{ $computer['name']}} is from <strong>{{$computer ['origin']}} </strong>{{$computer ['price']}}$    </p> 
                    </li>
                </a>

                @endforeach
            </ul>
            @else
            <p>there are no computre to display</p>
            @endif
        </div>
        @endsection
        @section('title','Computers ')