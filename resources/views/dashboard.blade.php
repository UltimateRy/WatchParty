<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="window mx-auto h-screen py-6 bg-[#9AD4FE]">

        <div class="flex flex-row">

            <div class ="w-8/12 mx-auto sm:px-12">
                <div class="w-full overflow-hidden shadow-sm sm:rounded-lg bg-white">
                    <div class="pb-12 pt-8 w:full sm:-my-px">  
                        <a class="text-center bg-indigo-500 
                                hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full inline-flex items-center" 
                                href="{{ route('parties.create') }}">
                                <svg class="mr-2 fill-white fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg"> <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                                <span class="text-3xl font-bold h-8"> Create Party
                                </span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="w-4/12 pr-12 h-0 bg-[#9AD4FE] text-blue-600 font-bold text-lg text-center sm:rounded-lg"  >
                <div class="bg-white sm:rounded-lg py-6 shadow-lg">
                    INVITES    
                </div>            
                <div id="app">
                    <party-list :initial-parties="{{ $parties }}" :user="{{ $user }}"></party-list>
                </div>
            </div>
        </div>
        </div>
    </div> 
</x-app-layout>

<style scoped>

.invite-tab {
    opacity: 0;
    animation: revealInvites .7s forwards
}
.window {
    opacity: 0;
    animation: revealWindow 1.3s forwards
}
@keyframes revealInvites {
    0% {
        transform: translateX(300px)
    }
    100% {
        opacity: 1;
        transform: none;
    }
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