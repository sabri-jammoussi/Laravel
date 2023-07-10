@extends('layout')
@section('title','Show ')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
               <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1>price of  COMPUTERS</h1>
                </div>
           <div>
            <h3>{{ $computer['name']}} is from <strong>{{$computer ['origin']}} </strong>{{$computer ['price']}}$  </h3>
            <a class="edit-btn" href="{{route('computers.edit',[$computer ->id])}}">edit</a> 
            <!-- lezm ta3tih paramètre el id  -->
               <form action="{{route('computers.destroy',[$computer ->id])}}" method="POST">
               @csrf  
               @method('DELETE')
                         <input type="submit" value="delete" class="delete-btn">
               </form>
           </div>
@endsection     
