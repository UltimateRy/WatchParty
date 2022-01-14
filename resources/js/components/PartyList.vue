<template>
    <div>
        <div v-for="party in parties" :party="party" :key="party.id">
            <br>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue-100 border-b border-gray-200">
                        Movie: {{party.movie_id}} hosted by user {{party.host_id}}
                    </div>
                </div>
            </div>
        </div>

        {{message}}
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