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
            <div class="px-4 bg-blue-100 col-span-4">
                <video-player :party="{{$p}}"> </video-player> 
            </div>
            <div class="bg-green-200">
                <br>
                <p class="px-4"> Chat </p>
                <br>
                <party-chat :party="{{$p}}" :key="{{$id}}" :user="{{$user}}" class="px-4">></party-chat>
            </div>
        </div>
    </div>
</body>

</x-app-layout>
