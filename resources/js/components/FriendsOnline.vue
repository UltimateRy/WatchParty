<template>
    <div>
        <br>
        <div class="online-list pt-9 max-w-5xl h-[57rem] mx-auto sm:px-6 lg:px-8 w:full shadow-lg bg-white sm:rounded-lg">
            
            <div class="bg-gray overflow-hidden">
                <span v-if="!users.length"> 
                    No friends online 
                </span>
                <span v-else>
                    <div v-for="user in users" :user="user" :key="user.id">
                        <div v-if="user.isOnline == 'True'">
                            <a v-bind:href="'/profiles/'+ user.id">
                                <div class="flex bg-gray-100 p-4 rounded-lg"> 
                                    <div class="relative w-16 h-16" >
                                        <img class="rounded-full" v-bind:src="'/images/profile-images/' + user.image + '.jpg'">
                                        <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                                    </div>
                                    <div class="pt-4 px-6 text-xl">
                                        {{user.username}}
                                    </div>
                                </div>
                            </a>
                        </div>
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
            this.users = this.initialUsers.filter(entry => entry.isOnline == 'True');
        }
    }
</script>

<style scoped>

.online-list {
    opacity: 0;
    animation: revealOnlinelist .7s forwards;

}
@keyframes revealOnlinelist {
    0% {
        transform: translateY(-300px)
    }
    
    100% {
        opacity: 1;
        transform: none;
    }
}


</style>