<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Host Party') }}
        </h2>
    </x-slot>

<body>  

<br>

<a class="float-left text-left bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-full" 
    href="{{ route('parties.store') }}"> Create a new watchparty
</a>

<div id="app">

</div>

</body>
</x-app-layout>