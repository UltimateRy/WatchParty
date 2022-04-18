<template>
    <div>
        <div class="online-list party-object pt-9 max-w-5xl h-[56rem] mx-auto sm:px-6 lg:px-8 w:full shadow-lg bg-white sm:rounded-lg">
            
             <div class="bg-gray overflow-hidden text-primary">
                <span v-if="! Object.keys(users).length > 0"> 
                    No incoming requests
                    {{users.length}}
                </span>
                <span v-else>
                    <div v-for="user in users" :user="user" :key="user.id" class="py-4">
                        <a v-bind:href="'/profiles/'+ user.id">
                            <div class="flow-root bg-gray-100 p-4 rounded-lg text-xl"> 
                                <div class="relative w-16 h-16 float-left" >
                                    <img class="rounded-full" v-bind:src="'images/sunset.png'">
                                </div>
                                <div class="pt-2 px-6 float-left">
                                    <div> {{user.username}} </div>
                                    <div class="text-base	"> sent you a friend request </div>
                                </div>
                                <div class="flex gap-x-4 float-right">
                                    <div class="py-2 item-right w-12 h-12" @click.prevent="acceptFriendRequest(user.id)">
                                        <svg class="w-9 h-9 p-1 fill-primary hover:border-2 hover:border-primary bg-white rounded-xl p-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.285 2 9 13.567 3.714 8.556 0 12.272 9 21 24 5.715z"/></svg>
                                    </div>
                                    <div class="py-2 item-right" @click.prevent="declineFriendRequest(user.id)">
                                        <svg class="w-9 h-9 p-2 fill-primary hover:border-2 hover:border-primary stroke-[6px] stroke-primary bg-white rounded-xl p-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" xml:space="preserve"><path d="M96 14 82 0 48 34 14 0 0 14l34 34L0 82l14 14 34-34 34 34 14-14-34-34z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </span>
            </div>
            
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: ['initialUsers', 'user'],
        
        data() {
            return {
                users: [],
                message:'Hello World'
            }
        }, 
        mounted() {
            this.users = this.initialUsers;//.filter(entry => entry.isOnline == 'True');
        },
        methods: {
            acceptFriendRequest(userToAccept) {
                console.log("Accept" + userToAccept);

                axios.post("/api/acceptfriendrequest", 
                    {
                        user: this.user, 
                        userToAccept: userToAccept, 
                    })
                    .then((response) => {
                        console.log(response.data);
                    });


            },
            declineFriendRequest(userToDecline) {
                console.log("Decline" + userToDecline);

                axios.post("/api/declinefriendrequest", 
                    {
                        user: this.user, 
                        userToDecline: userToDecline, 
                    })
                    .then((response) => {
                        console.log(response.data);
                    });


            }
        }
    }

</script>

<style scoped>


</style>