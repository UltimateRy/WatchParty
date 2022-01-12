<template>
    <div>
        <div v-for="party in parties" :party="party" :key="party.id">
            This is a party
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
                message:'Hello World'
            }
        },
        mounted() {
            this.parties = this.initialParties;
            Bus.$on('PartyCreated', (party) => {
                this.parties.push(party);
            });
        }
    };
</script>