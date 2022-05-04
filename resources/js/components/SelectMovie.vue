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
            <div class="online-list party-object pt-2 max-w-7xl h-[53rem] mx-auto  w:full bg-gray-200 sm:rounded-lg py-12">
                <div class="bg-gray text-primary overflow-y-scroll  no-scrollbar pt-4">
                    <div v-for="friend in friends" :friend="friend" :key="friend.id" class="px-5">

                        

                        <label :for="'friend'+friend.id"> 
                            <input type="checkbox" :id="'friend'+friend.id" :name="friend.id" :value="friend.name">
                        
                            <div class="selectbox flex rounded-xl bg-white">
                            
                            
                                <div class="relative w-20 h-20 align-center p-2" >
                                    <img class="rounded-full" v-bind:src="'/images/profile-images/' + friend.image + '.jpg'">
                                    <span v-if="friend.isOnline == 'True'">
                                        <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                                    </span>
                                    <span v-else>
                                        <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-gray-400 z-2"></div>
                                    </span>
                                </div>

                                <div class="p-6 text-xl"> {{friend.name}} </div>
                            </div>
                            
                        </label>
                        <br>
                    </div>
                </div>
            
            </div>
            <div class="py-8 w-full">
                <button v-on:click="createParty"  class="float-left bg-primary text-white py-2 px-6 rounded-full w-full text-center text-2xl" 
                    >CREATE
                </button>
                <p id="output">  </p>
            </div>
        </div>
    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['movies', 'user', 'friends'],
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

                var array = []
                var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

                for (var i = 0; i < checkboxes.length; i++) {
                    array.push(checkboxes[i].name)
                }

                console.log(array);

                axios.post("/api/createparty", 
                {
                    user: this.user, 
                    movie: this.optionText,
                    friends: array,
                    
                })
                .then((response) => {
                    console.log(response);

                    window.location.replace('../watchparty/' + response.data);

                });

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
        outline: 6px solid #ad0000;
    }

    .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    [type=checkbox] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    [type=checkbox]:checked + div {
        /*outline: 8px solid #ad0000;*/
        background-color: rgb(253, 164, 131);
    }

    .selectbox > input[type="checkbox"]:checked {

        outline: 8px solid #ad0000;
    }

</style>