<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>
   
    <div id="app" class="window no-scrollbar py-4 bg-gray-200 mx-auto h-screen sm:px-6 lg:px-8" >
    
        <show-movie :movie="{{ $movie }}" :movieImage="{{ $movieImage }}"> </show-movie>
    
    </div>
</x-app-layout>