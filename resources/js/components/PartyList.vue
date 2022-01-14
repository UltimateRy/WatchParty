<template>
    <div>
        <div v-for="party in parties" :party="party" :key="party.id">
            <br>
           <div class="pt-9 max-w-5xl mx-auto sm:px-6 lg:px-8 w:full">
                <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue-100 border-b border-gray-200">
                        <div class="flex flex-row content-evenly">
                            <div class="w-1/2">
                                <a v-bind:href="'/profiles/'+ party.host.id">
                                    {{party.host.username}}
                                </a> 
                                invited you to watch
                                <a v-bind:href="'/movies/'+ party.movie.id">
                                    {{party.movie.title}}  
                                </a> 
                            </div>
                        </div> 
                        <br>
                        <div class="flex flex-row content-evenly">
                            <div class="w-1/3">
                                <a class="float-right text-right bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-full" 
                                v-bind:href="'/watchparty/'+ party.id">Join Party</a>
                            </div>
                             <div class="w-1/3"> 
                                <a class="float-right text-right bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full" >
                                    
                                </a>
                             </div>
                            <div class="w-1/2">
                                <a class="float-right text-right bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-full" 
                                v-bind:href="'/watchparty/'+ party.id">Leave Party</a>
                            </div>
                        </div>
                        <br>                      
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['initialParties', 'user'],
        computed: {},
        data() {
            return {
                parties: [],
                message:'Hello World',
            }
        },
        mounted() {
            this.parties = this.initialParties;
            Bus.$on('PartyCreated', (party) => {
                this.parties.push(party);
            });
            this.listenForNewParties();
        },
        methods: {
            listenForNewParties() {
                Echo.private('App.Models.User.' + this.user.id)
                    .listen('PartyCreated', (e) => {
                        //message = 'New Parties were found!';
                        this.parties.push(e.party);
                    });
            }
        }
    };
</script>