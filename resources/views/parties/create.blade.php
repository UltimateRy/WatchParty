<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Host Party') }}
        </h2>
    </x-slot>

<body>  

<br>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <a class="float-left text-left bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-full" 
                    href="{{ route('parties.store') }}"> Create a new watchparty
                </a>

                <br>
                <br>

                <div id="app">
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</x-app-layout>