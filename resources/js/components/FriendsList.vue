<template>
    <div>

        <br>
        <div class="online-list party-object pt-9 max-w-5xl h-[65rem] mx-auto sm:px-6 lg:px-8 w:full shadow-lg bg-white sm:rounded-lg">
            
            <div class="bg-gray overflow-hidden text-primary">
                <span v-if="!users.length"> 
                    No added friends 
                </span>
                <span v-else>
                    <div v-for="user in users" :user="user" :key="user.id" class="py-4">
                        <a v-bind:href="'/profiles/'+ user.id">
                            <div class="flex bg-gray-100 p-4 rounded-lg"> 
                                <div class="relative w-20 h-20 align-center" >
                                    <img class="rounded-full" v-bind:src="'images/profile-images/DEFAULT.jpg'">
                                    <span v-if="user.isOnline == 'True'">
                                        <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                                    </span>
                                    <span v-else>
                                        <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-gray-400 z-2"></div>
                                    </span>
                                </div>
                                <div class="pt-2 px-6 text-xl">
                                    <div class="text-2xl"> {{user.name}} </div>
                                    <div class="pl-1"> {{user.username}} </div>
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
        }
    }
</script>


<style scoped>

.online-list {
    opacity: 0;
    animation: revealFriendslist 1s forwards;

}
@keyframes revealFriendslist {
    0% {
        transform: translateY(300px)
    }
    
    100% {
        opacity: 1;
        transform: none;
    }
}


</style>
            
        