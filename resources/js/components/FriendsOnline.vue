<template>
    <div>
        <br>
        <div class="online-list party-object pt-9 max-w-5xl h-96 mx-auto sm:px-6 lg:px-8 w:full shadow-2xl bg-white sm:rounded-lg">
            
            <div class="bg-gray overflow-hidden">
                <span v-if="!users.length"> No friends online </span>
                <div v-for="user in users" :user="user" :key="user.id">
                    <div class="flex"> 
                         <div class="relative w-16 h-16" >
                            <img class="rounded-full" v-bind:src="'images/sunset.png'">
                        </div>
                        <div class="pt-4 px-6 text-xl">
                            {{user.username}}
                        </div>
                    </div>
                </div>
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
            this.users = this.initialUsers;
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