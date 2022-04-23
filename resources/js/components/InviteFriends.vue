<template>
    <div>
        <div class="online-list party-object pt-9 max-w-5xl h-[65rem] mx-auto sm:px-6 lg:px-8 w:full shadow-lg bg-white sm:rounded-lg p-12">
            <div class="bg-gray overflow-hidden text-primary p-4">
               
                <div v-for="friend in friends" :friend="friend" :key="friend.id">
                 
                    <input type="checkbox" :name="friend.id" :value="friend.name">
                    <label :for="friend.id"> {{friend.name}} </label><br>
               </div>
            </div>
        </div>

    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['friends'],
        computed: {},
    }

</script>

<style scoped>

</style>