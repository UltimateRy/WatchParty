<template>
    <div class="h-[57rem] overflow-auto rounded-lg no-scrollbar">
        <div v-for="party in parties" :party="party" :key="party.id">
           <div class="party-object pt-9 max-w-5xl mx-auto sm:px-6 lg:px-8 w:full shadow-lg bg-white sm:rounded-lg">
                <div class="bg-gray overflow-hidden">
                        <div class="flex flex-row content-evenly">
                                <!-- <img  v-bind:src="'images/' + party.host.id"> -->
                                <a v-bind:href="'/profiles/'+ party.host.id">
                                    <div class="flex"> 
                                        <div class="relative w-16 h-16" >
                                            <img class="rounded-full" v-bind:src="'images/sunset.png'">
                                            <span v-if="party.host.isOnline == 'True'"> 
                                                <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                                            </span>
                                            <span v-if="party.host.isOnline == 'False'"> 
                                                <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-gray-400 z-2"></div>
                                            </span>
                                        </div>
                                        <div class="pt-4 px-6 text-xl">
                                            {{party.host.username}}
                                        </div>
                                    </div>
                                </a> 
                        </div> 
                        <br>
                        <div class="float-left">
                            invited you to <br>
                            <a v-bind:href="'/movies/'+ party.movie.id">
                                {{party.movie.title}}  
                            </a> 
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="party-list flex flex-row content-evenly">
                            <div class="party-button-parent">
                                <div class="party-button button-first w-1/6 px-4">
                                    <a class="float-left text-right bg-primary border-2 border-primary text-white px-10 rounded-lg" 
                                    v-bind:href="'/watchparty/'+ party.id">Join</a>
                                </div>
                            </div>
                            <div class="party-button-parent">
                                <div class="party-button button-second w-1/6 px-4">
                                    <a class="px-4 float-left text-right bg-transparent border-transparent hover:border-primary text-primary px-4 border-2 rounded-lg px-6" 
                                    v-bind:href="'/watchparty/'+ party.id">Decline</a>
                                </div>
                            </div>
                        </div>
                        <br>                      
                    
                </div>
            </div>
            <br>
        </div>
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

<style scoped>

.party-list {
    text-transform: uppercase;
    line-height: 40px;
}
.party-object {
    opacity: 0;
    animation: revealParty .7s forwards
}
.party-button {
    display: block;
    opacity: 0;
    animation-delay: .5s;
    animation: revealText 1s forwards;
}
.party-button-parent:hover {
    cursor: pointer;
    animation: bounce 1s forwards;
}
.button-first{
    animation-delay: .175s;
}
.button-second{
    animation-delay: .25s;
}
@keyframes revealText {
    from {
        transform: translateY(30px)
    }
    to {
        opacity: 1;
        transform: none;
    }
}
@keyframes revealParty {
    0% {
        transform: translateY(-300px)
    }
    
    100% {
        opacity: 1;
        transform: none;
    }
}
@keyframes bounce {
	0%{
		-webkit-transform: translateY(0);
		-ms-transform:     translateY(0);
		transform:         translateY(0)
	}
	100% {
		-webkit-transform: translateY(-10px);
		-ms-transform:     translateY(-10px);
		transform:         translateY(-10px)
	}
}



</style>