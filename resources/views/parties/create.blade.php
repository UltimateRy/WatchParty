<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Host Party') }}
        </h2>
    </x-slot>

<body>  

<a class="float-left text-left bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-6 rounded-full" 
                    href="{{ route('parties.store') }}"> Create a new watchparty
                </a>
<div id="app" class="window no-scrollbar justify-center py-8 bg-gray-200 mx-auto h-screen sm:px-6 lg:px-8">

    <div class="flex items-start">
        <div class="max-w-[114rem] mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                <span class="text-3xl h-8 text-center text-primary">     
                            SELECT MOVIE  
                            </span> 
                            <br>
                            </div>
                            <div class="border-t border-primary"> </div>
                            <br>
                    <select-movie :movies="{{ $movies }}" :user="{{ $user }}" :friends="{{ $friends }}"> </select-movie>
                </div>
                
            </div>
        </div>
    </div>
</div>


</body>
</x-app-layout>


<style scoped>

    
    .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

</style>

