<template>
<div>
    <div class="pt-9 max-w-5xl pb-9 h-[20rem] mx-auto sm:px-6 lg:px-8 w:full shadow-lg bg-white sm:rounded-lg ">
        <div class="border-2 border-primary rounded-lg h-5/7 overflow-hidden">
            
            <p class="text-center pt-4 text-2xl text-primary"> ADD FRIENDS </p>


            <div class="p-6 input-group flex flex-row gap-x-2.5 w-full">
                <input id="btn-input" type="text" class="basis-4/5 form-control text-lg input-sm bg-white focus:ring-primary focus:border-primary focus:ring-2 border-primary rounded-2xl" placeholder="Search username..." v-model="username" @keyup.enter="addFriend()" autofocus />
                <span class="input-group-btn basis-1/5">
                    <button class="bg-primary p-4 text-white w-full text-lg rounded-2xl" id="btn-chat" @click.prevent="addFriend()"> Add </button>
                </span>
            </div>
        </div>
        <br>
        <div v-if="responseSuccessful == 1">
            <div  id="response" class="response-message bg-green-400 text-center p-4 text-2xl rounded-xl text-white">
                SUCCESS  
            </div>
        </div>
        <div v-if="responseUnsuccessful == 1">
            <div  id="response" class="response-message bg-red-400 text-center p-4 text-2xl rounded-xl text-white">
                COULDN'T FIND USER!
            </div>
        </div>
        <div v-if="responseAlreadyFollowing == 1">
            <div  id="response" class="response-message bg-orange-400 text-center p-4 text-2xl rounded-xl text-white">
                ALREADY FRIENDS!
            </div>
        </div>
        <div v-if="responseAddYourself == 1">
            <div  id="response" class="response-message bg-orange-400 text-center p-4 text-2xl rounded-xl text-white">
                CANNOT ADD YOURSELF!
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import axios from 'axios'
    const default_layout = "default";
    export default {
            props: ['user'],
            data() {
                return {
                    message:'Hello World',
                    username: '',
                    responseSuccessful: 0,
                    responseUnsuccessful: 0,
                    responseAlreadyFollowing: 0,
                    responseAddYourself: 0,
                }
            }, 
            methods: {
                addFriend() {

                    console.log("TEST");
                    this.responseSuccessful = !this.responseSuccessful;

                    setTimeout(() => this.responseSuccessful = false, 2000);
                    
                    console.log("Attempting to add friend with username:" + this.username);
                    
                    axios.post("/api/addfriend", 
                    {
                        user: this.user, 
                        friendUsername: this.username, 
                    })
                    .then((response) => {
                        
                        console.log(response.data);

                        if (response.data == "Success") {
                            thi.responseAddYourself = 0;
                            this.responseAlreadyFollowing = 0;
                            this.responseUnsuccessful = 0;
                            this.responseSuccessful = 1;
                            setTimeout(() => this.responseSuccessful = false, 1000);
                        } else if (response.data == "Failure") {
                             this.responseAddYourself = 0;
                            this.responseAlreadyFollowing = 0;
                            this.responseSuccessful = 0;
                            this.responseUnsuccessful = 1;
                            setTimeout(() => this.responseUnsuccessful = false, 1000);
                        } else if (response.data == "Already Following") {
                            this.responseAddYourself = 0;
                            this.responseSuccessful = 0;
                            this.responseUnsuccessful = 0;
                            this.responseAlreadyFollowing = 1;
                            setTimeout(() => this.responseAlreadyFollowing = false, 1000);
                        } else if (response.data == "Cannot Add Yourself") {
                            this.responseSuccessful = 0;
                            this.responseUnsuccessful = 0;
                            this.responseAlreadyFollowing = 0;
                            this.responseAddYourself = 1;
                            setTimeout(() => this.responseAddYourself = false, 1000);
                        } 
                    });
                }
            }
        }
</script>

<style scoped>

.response-message{
    opacity: 0;
    animation: revealResponseMessage 3s forwards;
}
@keyframes revealResponseMessage {
    0% {
        transform: translateY(-30px)
    }
    10% {
        opacity: 0.3;
    }
    20%, 80% {
        opacity: 1;
        transform: none;
    }
    100% {
        transform: translateY(-30px)
        
    }
}
</style>
