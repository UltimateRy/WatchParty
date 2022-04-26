<template>

    <div class="flex flex-row gap-x-12">
        
        <div class="flex flex-col text-center">
           

            <div class="flex flex-shrink-0 flex-wrap items-center align-center bg-gray-200 rounded-xl h-[58rem] overflow-y-scroll  no-scrollbar">
                <div class="m-3" v-for="movie in movies" :movie="movie" :key="movie.id">
                    <label class ="text-center bg-white rounded-lg w-96">
                        
                        <input name="Movie" type="radio" :id="movie.id"  :value="movie.id" @change="switchMovie($event)"> 
                        
                        <img v-bind:src="'/images/movie-images/' + movie.image + '.jpg'" class="w-[14rem] rounded-lg">
                        
                        
                    </label>
                </div> 
            </div>
            
        </div>

        <div class="w-[60rem]">
            <div class="online-list party-object pt-9 max-w-7xl h-[58rem] mx-auto sm:px-6 lg:px-8 w:full shadow-lg bg-gray-200 sm:rounded-lg p-12">
                <div class="bg-gray overflow-hidden text-primary p-4">
                    <div v-for="friend in friends" :friend="friend" :key="friend.id">

                        


                        <input type="checkbox" :id="'friend'+friend.id" :name="'friend'+friend.id" :value="friend.name">
                        <label :for="'friend'+friend.id"> 
                            {{friend.name}} 
                            
                            <div class="relative w-20 h-20 align-center" >
                                <img class="rounded-full" v-bind:src="'../images/profile-images/DEFAULT.jpg'">
                                <span v-if="friend.isOnline == 'True'">
                                    <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                                </span>
                                <span v-else>
                                    <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-gray-400 z-2"></div>
                                </span>
                            </div>
                            
                        </label><br>
                    </div>
                </div>
            

                <div>
                    <button v-on:click="createParty"  class="float-left text-left bg-primary text-white py-2 px-6 rounded-full" 
                        >CREATE
                    </button>
                    <p id="output"> Test </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['movies', 'friends'],
        computed: {
            
        },
        data () {
            return {
                optionText: null,
     
            }
        },
        methods: {
            switchMovie(event) {
                this.optionText = event.target.value;
                console.log(this.optionText);

            },
            createParty(event) {
                console.log(this.optionText);

            }
        }
    }
</script>


<style scoped>

    [type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    [type=radio] + img {
        cursor:pointer
    }

    [type=radio]:checked + img {
        outline: 8px solid #ad0000;
    }

    .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

</style>