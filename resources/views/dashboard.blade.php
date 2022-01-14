<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    
        <br>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w:full">  
            <a class=" align-middle float-left text-center bg-blue-500 
            hover:bg-blue-700 text-white font-bold py-4 px-8 w-1/4 rounded-full" 
            href="{{ route('parties.create') }}">
            <p class="text-3xl font-bold ">Host New Party
            </p>
            </a>
            <br>
            <br>
        </div>
        <br>
        <br>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Parties                
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="app">
                        <partylist :initial-parties="{{ $parties }}" :user="{{ $user }}"></partylist>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
