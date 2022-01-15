<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watchparty') }}
        </h2>
    </x-slot>
<head>
</head>

<body>  
    <div class="relative min-h-screen">
        <div class="px-3">
            <div class="max-w-7xl sm:px-3 lg:px-5">
                <div id="message"></div>
                <div id="app">
                <video-player> </video-player>
                </div>
            </div>
        </div>
        <div class="bg-blue-200 text-white w-64">
            <br>
            <p> Chat </p>
        </div>
    </div>

</body>

</x-app-layout>
