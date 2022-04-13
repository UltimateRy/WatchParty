<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="window py-12 bg-[#9AD4FE] mx-auto h-screen sm:px-6 lg:px-8">
        
            <div class = "mx-auto justify-center max-w-7xl" >
                <div class="flex items-start">

                    <div class ="pl-12 w-8/12 mx-auto sm:px-12">
                        <div class="w-full overflow-hidden shadow-sm sm:rounded-lg bg-white shadow-lg py-4 px-4">
                            <!--<div class="pb-4 pt-4 px-4 w:full sm:-my-px ">  -->
                                    <a class="create-party-button text-center bg-white hover:bg-green-500 text-green-500 hover:text-white font-bold px-8 py-8 w-full rounded-lg inline-flex items-stretch items-center" href="{{ route('parties.create') }}">
                                        <svg class="mr-2 fill-green-500 group-hover:fill-white fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg"> <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                                        <span class="create-party-button-wrapper text-3xl font-bold h-8 text-center"> 
                                            Create Party
                                        </span>
                                    </a>  
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
    animation: revealInvites .7s forwards;
}
.window {
    opacity: 0;
    animation: revealWindow 1.3s forwards;
    
}
.create-party-button {
    opacity: 0;
    animation: revealCreate .7s forwards;
}
.create-party-button-wrapper:hover {
    animation: animatePartyButton 1s forwards;
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
@keyframes revealCreate {
    0% {
        transform: translateY(300px)
    }
    100% {
        opacity: 1;
        transform:none;
    }

}
@keyframes animatePartyButton {
    0% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1.5);
    }
}

</style>