<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="window mx-auto h-screen py-6 bg-[#132152]">
        <div class=" pb-4 mx-auto sm:px-6 lg:px-8 w:full ">  
            <a class="float-left text-center bg-green-500 
            hover:bg-green-700 text-white font-bold py-4 px-8 rounded-full" 
            href="{{ route('parties.create') }}">
            <p class="text-3xl font-bold ">Host New Party
            </p>
            </a>
        </div>
        <div class="w-4/12 mx-auto sm:px-12 float-right">
            <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg bg-[#839efd]">
                <div class="p-6 bg-white border-b border-gray-200 text-blue-600 font-bold text-lg text-center sm:rounded-lg"  >
                        INVITES                
                </div>
                <div id="app">
                    <party-list :initial-parties="{{ $parties }}" :user="{{ $user }}"></party-list>
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
    animation: revealWindow .5s forwards
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
        transform: translateY(-300px)
    }
    100% {
        opacity: 1;
        transform: none;
    }
}

</style>