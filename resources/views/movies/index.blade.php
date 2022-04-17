<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="window py-8 bg-gray-200 mx-auto h-screen sm:px-6 lg:px-8">
        
            <div class = "mx-auto justify-center max-w-7xl" >
                <div class="flex items-start">

                    
                    
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