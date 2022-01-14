<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<head>
</head>

<body>  
   
    <h1> Video Player </h1>
    <div id="message"></div>
    <br>
    <div id="app">
       <video-player> </video-player>
    </div>


</body>

</x-app-layout>
