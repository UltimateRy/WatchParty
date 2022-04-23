<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Host Party') }}
        </h2>
    </x-slot>

<body>  

<br>

<div id="app" class="window py-8 bg-gray-200 mx-auto h-screen sm:px-6 lg:px-8">

    <div class="max-w-[100rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <select-movie :movies="{{ $movies }}" :user="{{ $user }}"> </select-movie>
                </div>
           
            
            <a class="float-left text-left bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-6 rounded-full" 
                href="{{ route('parties.store') }}"> Create a new watchparty
            </a>
         </div>
    </div>
   
    <br>
    <div class="max-w-[100rem] mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <invite-friends class="px-12" :friends="{{ $friends }}" :user="{{ $user }}"> </invite-friends>
        </div>
    </div>


</div>



</body>
</x-app-layout>