<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div id="app" class="window py-8 bg-gray-200 mx-auto h-screen sm:px-6 lg:px-8">
        
        <div class="popular-movies no-scrollbar w-full h-[57rem] overflow-y-scroll shadow-sm sm:rounded-lg bg-white shadow-lg py-6 px-4 text-primary text-lg text-center">
            <div>
                <span class="text-3xl h-8 text-center">     
                    MOVIES  
                </span> 
                <br>
                <br>
                </div>
                <div class="border-t border-primary"> </div>
                <br>
                <popular-movies :popular-movies="{{ $movies }}"> </popular-movies>
            </div>
        </div>
    </div> 
</x-app-layout>

<style scoped>


.window {
    opacity: 0;
    animation: revealWindow 1.3s forwards;
}
@keyframes revealWindow {
    0% {
        transform: translateY(300px)
    }
    100% {
        opacity: 1;
        transform: none;
    }
}


</style>