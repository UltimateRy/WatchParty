<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="window py-12 bg-primary mx-auto h-screen sm:px-6 lg:px-8">
        
            <div id="app" class = "mx-auto justify-center max-w-8xl" >
               
                <div class="flex items-start">

                    <div class="w-4/12 h-0 pl-12 text-primary text-lg text-center sm:rounded-lg"  >
                        <div class="bg-white w-full sm:rounded-lg py-6 px-6 shadow-lg">
                            <div class="inline-flex items-center">
                                
                            <svg class="fill-primary pt-2 w-9 h-9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 12.5c-5.92 0-9 3.5-9 5.5v1h18v-1c0-2-3.08-5.5-9-5.5z"/><circle cx="10" cy="6" r="5"/>
                            </svg>
                           
                            

                                <span class="text-2xl h-6 text-center"> 
                                    ONLINE
                                </span>
                            </div>
                        </div>            
                        <div   >
                            <friends-online :initial-users="{{ $onlineFollowing }}" > </friends-online>
                        </div>
                    </div>

                    <div class ="pl-12 pr-12 w-8/12 mx-auto sm:px-12">
                        <div class="w-full overflow-hidden shadow-sm sm:rounded-lg bg-white shadow-lg py-6 px-4">
                            <!--<div class="pb-4 pt-4 px-4 w:full sm:-my-px ">  -->
                                    <a class="create-party-button text-center bg-white hover:bg-green-500 text-green-500 hover:text-white px-8 py-8 w-full rounded-lg inline-flex items-stretch items-center" href="{{ route('parties.create') }}">
                                        <svg class="mr-2 fill-green-500 group-hover:fill-white fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg"> <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                                        <span class="create-party-button-wrapper text-3xl h-8 text-center"> 
                                            Create Party
                                        </span>
                                    </a>  
                        </div>
                        <br>
                        <div class="w-full overflow-hidden shadow-sm sm:rounded-lg bg-white shadow-lg py-6 px-4 text-primary text-lg text-center">
                            <span class="create-party-button-wrapper text-3xl h-8 text-center">     
                                POPULAR  
                            </span> 
                            <br>
                            <br>
                            <div class="border-t border-primary"> </div>
                            <br>
                            
                        </div>
                        
                    </div>
                    
                    
                    <div class="w-4/12 pr-12 h-0 bg-primary text-primary text-lg text-center sm:rounded-lg"  >
                        <div class="bg-white sm:rounded-lg py-6 px-6 shadow-lg">
                            <div class="inline-flex items-center">

                                <svg class="fill-primary pr-2 pt-2 w-10 h-10" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512">
                                    <path d="M512 85.25V448H0V85.25l256 224 256-224zM487.688 64H24.297L256 266.75 487.688 64z"/>
                                </svg>

                                <span class="text-2xl h-6 text-center"> 
                                    INVITES
                                </span>   
                            </div>
                        </div>            
                        <div   >
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
        transform: translateX(300px)
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