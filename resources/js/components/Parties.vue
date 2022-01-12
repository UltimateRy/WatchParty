<template>
    <div>
        <party v-for="party in parties" :party="party" :key="party.id"> </party>
        {{message}}
    </div>
</template>

<script>
    export default {
        props: ['initialParties', 'user'],
        data() {
            return {
                parties: [],
                message:'Hello World'
            }
        },
        mounted() {
            this.parties = this.initialParties;
            Bus.$on('partyCreated', (party) => {
                this.parties.push(party);
            });
            this.listenForNewParties();
        },
        methods: {
            listenForNewParties() {
                Echo.private('users.' + this.user.id)
                    .listen('PartyCreated', (e) => {
                        this.parties.push(e.party);
                    });
            }
        }
    }
</script>