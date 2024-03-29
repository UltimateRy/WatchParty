<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>
   
    <div id="app" class="window no-scrollbar py-4 bg-gray-200 mx-auto h-screen sm:px-6 lg:px-8" >
        <div class="mx-auto justify-center max-w-8xl" >
            <div class = "flex items-start gap-x-12 justify-center">


                <add-friends :user="{{$user}}" class="add-friends w-3/12 py-6"> </add-friends>

                <friends-list :initial-users="{{ $friends }}"  class="w-4/12"> </friends-list>  


                <div class="requests-column w-3/12 py-6">
                    <div class="requests-title bg-white rounded-xl p-8 text-primary text-2xl shadow-lg text-center">
                        <div class=" inline-flex items-center">
                            <svg class="fill-primary w-9 h-9" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <path d="M243.87638 370.455263a202.017 202.017 0 1 0 413.450497 0 202.017 202.017 0 1 0-413.450497 0Zm369.417631 397.024386c0-64.61974 31.533181-121.864512 80.040964-157.218718.033769-.024559.035816-.075725.002047-.101307-25.232684-20.117177-53.011354-37.176714-82.785471-50.595328-.022513-.010233-.049119-.00614-.067538.00921C567.3404 596.084048 511.5477 618.11276 450.601629 618.11276s-116.737748-22.027689-159.882384-58.539254c-.01842-.016373-.045025-.019443-.067538-.00921-124.322494 56.03113-213.969234 175.367053-227.862662 316.935325-.004093.037862.026606.070608.064468.070608h583.793116c.051165 0 .081864-.056282.052189-.099261-21.083177-31.087018-33.404807-68.598354-33.404807-108.991319zm194.428177-153.49593c-84.773755 0-153.49593 68.722174-153.49593 153.49593s68.722174 153.49593 153.49593 153.49593 153.49593-68.722174 153.49593-153.49593-68.722174-153.49593-153.49593-153.49593zm79.242786 176.008666h-56.665581c-.035816 0-.064468.028653-.064468.064468v56.665581c0 11.7056-8.701173 21.88545-20.354584 22.986527-13.340843 1.260713-24.670889-9.31618-24.670889-22.410406v-57.240679c0-.035816-.028653-.064468-.064468-.064468h-56.664558c-11.7056 0-21.88545-8.701173-22.986527-20.354584-1.260713-13.340843 9.31618-24.670889 22.410406-24.670889h57.240679c.035816 0 .064468-.028653.064468-.064468v-56.665581c0-11.7056 8.701173-21.88545 20.354584-22.986527 13.340843-1.260713 24.670889 9.31618 24.670889 22.410406v57.240679c0 .035816.028653.064468.064468.064468h57.240679c13.094226 0 23.671119 11.330046 22.410406 24.670889-1.101078 11.653412-11.280928 20.354584-22.985504 20.354584z"/>
                            </svg>
                            <span class="text-2xl h-6 pl-2 text-center"> 
                                REQUESTS
                            </span>
                        </div>
                    </div>
                    <friend-requests :initial-users="{{ $requests }}" :user="{{$user}}" class="request-list pt-9">   </friend-requests>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

<style scoped>

    .window {
        opacity: 0;
        animation: revealWindow 1s forwards;
    }
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .requests-column {
        opacity: 0;
        animation: revealColumn 1s forwards;
    }
    .requests-title {
        opacity: 0;
        animation: revealTitle .7s forwards;
    }
    .request-list {
        opacity: 0;
        animation: revealRequests .7s forwards;
    }
    .add-friends {
        opacity 0;
        animation: revealAddFriends 1s forwards;
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
    @keyframes revealTitle {
        0% {
            transform: translateY(-300px)
        }
        100%
        {
            opacity: 1;
            transform: none;
        }
    }
    @keyframes revealRequests {
        0% {
            transform: translateY(-300px)
            opacity: 0;
        }
        50% {
            transform: translateY(-300px)
            opacity: 0;
        }
        100%
        {
            opacity: 1;
            transform: none;
        }
    }
    @keyframes revealColumn {
        0% {
            transform: translateX(300px)
        }
        100% {
            transform: none;
            opacity: 1;
        }
    }
    @keyframes revealAddFriends {
        0% {
            transform: translateX(-300px)
        }
        100% {
            transform: none;
            opacity: 1;
        }
    }

</style>


