<template>
    <div>
        <ul class="chat">
            <div v-for="message in messages" :message="message" :key="message.id">
                {{message.id}}
            </div>
        </ul>

        <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="store()" autofocus />
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-sm" id="btn-chat" @click.prevent="store()"> Send </button>
                </span>
            </div>
        </div>

    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['party'],
        computed: {},
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
                axios.post('/messages', {newMessage: this.newMessage, party_id: this.party.id})
                .then((response) => {
                    this.newMessage = '';
                    this.messages.push(response.data);
                });
            },
            listenForNewMessage() {
                Echo.private('parties.' + this.party.id)
                    .listen('NewMessage', (e) => {
                        // console.log(e);
                        this.messages.push(e);
                    });
            }
        }
    }
</script>