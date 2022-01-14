
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<head>
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
</head>

<body>  

    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
   
    <h1> Video Player </h1>

    <div id="message"></div>

    <input type="file" accept="video/*"/>
    <br>
    <br>

    <div id="app">
       <player> </player>
    </div>


</body>

</x-app-layout>
