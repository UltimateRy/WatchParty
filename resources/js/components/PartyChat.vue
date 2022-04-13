<template>
    <div>
        <ul class="chat h-full overflow-auto">
            <div v-for="message in messages" :message="message" :key="message.id">
                {{message}}
                
            </div>
        </ul>
        <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" class="w-full form-control input-sm bg-blue-100 min-width-32" placeholder="Message..." v-model="newMessage" @keyup.enter="store()" autofocus />
                <br>
                <br>
                <span class="input-group-btn">
                    <button class="bg-green-500 text-white font-bold w-1/4 rounded-full" id="btn-chat" @click.prevent="store()"> Send </button>
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