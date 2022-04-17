<template>
    <div class="bg-white shadow-l sm:rounded-3xl flex flex-col">
        <br>
        <p class="px-4 text-2xl text-primary text-center pb-4 "> Chat </p>
        
        <ul class="chat h-[67rem] bg-gray-200  py-4 px-4 rounded-3xl overflow-scroll no-scrollbar space-y-4 flex flex-col-reverse " >
            <div class="flex-col space-y-4">
                <div v-for="message in messages" :message="message" :key="message.id" class="px-2 py-2 messageObject bg-white text-ellipsis overflow-hidden rounded-xl">
                    <p class="text-l text-primary"> {{message}}   </p>
                </div>
            </div>
        </ul>
        <br>
        <div class="panel-footer inset-x-0 bottom-0">
            <div class="input-group flex flex-row gap-x-2.5 w-full">
                <input id="btn-input" type="text" class="basis-3/4 form-control text-lg input-sm bg-white focus:ring-primary focus:border-primary focus:ring-2 border-primary rounded-2xl" placeholder="Chat..." v-model="newMessage" @keyup.enter="store()" autofocus />
                <span class="input-group-btn basis-1/4">
                    <button class="bg-primary p-4 text-white w-full text-lg rounded-2xl" id="btn-chat" @click.prevent="store()"> Send </button>
                </span>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
    import axios from 'axios';
    const default_layout = "default";
    export default {
        props: ['party', 'user'],
        data() {
            return {
                messages: [],
                newMessage: '',
                party_id: this.party.id
            }
        },
        mounted() {
            this.listenForNewMessage();
        },
        methods: {
            
            store() {
                //console.log(this.user);
                //console.log(this.party);
                //console.log(this.newMessage);

                if (this.newMessage != "" && this.newMessage != " ") {

                    //console.log(this.newMessage);

                    axios.post("/api/sendmessage", 
                    {
                        user: this.user, 
                        party: this.party, 
                        message: this.newMessage
                    })
                    .then((response) => {
                        this.newMessage = '';
                        this.messages.push(response.data);
                        //console.log(response.data);
                    });

                }

            },
            listenForNewMessage() {
                Echo.private('parties.' + this.party.id)
                    .listen('NewMessage', (e) => {
                         console.log(e);
                        this.messages.push(e.message);
                    });
            }
        }
    }
</script>

<style scoped>

.messageObject {
    opacity: 0;
    animation: revealMessage .7s forwards;
}
.chat::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
@keyframes revealMessage {
    0% {
        transform: translateY(200px);
    }
    100% {
        opacity: 1;
        transform: none;
    }
}

</style>