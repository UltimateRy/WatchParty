<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watchparty') }}
        </h2>
    </x-slot>
<head>
</head>

<body>     
    <div id="app">
        <div class=" px-4 py-4 grid gap-4 grid-cols-5 grid-rows-1">
            <div class="px-4 bg-blue-200 col-span-4 shadow-sm sm:rounded-3xl">
                <video-player :party="{{$p}}" :key="{{$id}}" :user="{{$user}}">  </video-player> 
            </div>
            <div class="bg-violet-200 shadow-sm sm:rounded-3xl">
                <br>
                <p class="px-4"> Chat </p>
                <br>
                <party-chat :party="{{$p}}" :key="{{$id}}" :user="{{$user}}" class="px-4">></party-chat>
            </div>
        </div>
    </div>
</body>


</x-app-layout>
