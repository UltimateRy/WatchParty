<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watchparty') }}
        </h2>
    </x-slot>
<head>
</head>

<body>     
    <div id="app" class="window bg-gray-200 no-scrollbar">
        <div class=" px-4 py-4 grid gap-4 grid-cols-5 grid-rows-1">
            <div class="px-4 bg-white col-span-4 shadow-sm sm:rounded-3xl">
                <video-player :party="{{$p}}" :key="{{$id}}" :user="{{$user}}" :movie="{{$movie}}">  </video-player> 

                

            </div>
            <party-chat :party="{{$p}}" :key="{{$id}}" :user="{{$user}}" class="px-4">></party-chat>
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
    .window {
        opacity: 0;
        animation: revealWindow 1.3s forwards;
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