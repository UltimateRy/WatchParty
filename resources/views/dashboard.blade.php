<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="window py-8 bg-gray-200 mx-auto h-screen sm:px-6 lg:px-8">
        
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
                        <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white shadow-lg py-4 px-12 items-center flex justify-center items-center">
                            <a class="create-party-button border-primary border-2 text-white text-center bg-primary px-32 py-4 h-fit rounded-lg" href="{{ route('parties.create') }}">
                                <span class="create-party-button-inner text-3xl h-8 text-center mx-1/2 "> 
                                    <div class="create-party-button-text flex">
                                    <svg class="fill-white w-12 pr-4"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" xml:space="preserve">
                                            <path d="M499.9 10C229.4 10 10 229.4 10 500c0 270.7 219.4 490 489.9 490C770.7 990 990 770.6 990 500S770.7 10 499.9 10zm290.9 500.2L361.4 784.3c-2.3 1.9-5.2 2.8-8.1 2.8l-5.8-1.2c-4.3-2.1-7.1-6.6-7.1-11.6V225.8c0-4.9 2.7-9.4 7.1-11.5 4.6-2.2 9.9-1.6 13.9 1.4l429.3 274.2c3 2.6 4.9 6.2 4.9 10.1.1 3.9-1.9 7.6-4.8 10.2z"/>
                                        </svg>    
                                        <p class="pt-0.5"> HOST PARTY </p>
                                        
                                    </div>
                                </span>
                            </a>  
                        </div>
                        <br>
                        <div class="popular-movies no-scrollbar w-full h-[57rem] overflow-y-scroll shadow-sm sm:rounded-lg bg-white shadow-lg py-6 px-4 text-primary text-lg text-center">
                            <div>
                            <span class="text-3xl h-8 text-center">     
                                POPULAR  
                            </span> 
                            <br>
                            <br>
                            </div>
                            <div class="border-t border-primary"> </div>
                            <br>
                            <popular-movies :popular-movies="{{ $popularMovies }}" :user="{{ $user }}" class=""> </popular-movies>
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
                        <br>         
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
    .create-party-button-inner {
        overflow: hidden;
    }
    .create-party-button-text {
        object-fit: cover;
        transition: transform .5s;
    }
    .create-party-button:hover .create-party-button-text{
        transform:scale(1.15);
    }
    .popular-movies {
        opacity: 0;
        animation: animatePopularMovies 2s forwards;
    }
    .no-scrollbar::-webkit-scrollbar {
        display: none;
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
    @keyframes animatePopularMovies {
        0% {
            transform: translateY(300px);
        }
        100% {
            opacity: 1;
            transform: none;
        }
    }

</style>