<template>
     <div class="mx-auto justify-center max-w-8xl" >
        <div class = "flex items-start gap-x-12 justify-center pt-12">
                <div class="movie-card bg-white rounded-xl p-8 w-[60rem] text-primary text-2xl shadow-lg text-center flex-col">
                       
                    <div class="flex pb-6">
                        <img v-bind:src="'../images/movie-images/' + movieimage.file_path + '.jpg'" class="card-image rounded-lg w-1/3">
                        
                        <div class="flex flex-col"> 
                            <div class="text-center">
                                <span class="text-6xl h-6 pl-8 text-center"> 
                                    {{movie.title}}
                                </span>
                            </div>
                            
                            <span class="text-2xl h-12 pl-12 pt-12 text-left"> 
                                {{movie.length}} minutes
                            </span>

                           </div> 
                    </div>

                    <div class="bg-gray-200 pt-12 rounded-xl h-[30rem]">
                        <div class="p-12">
                            {{movie.synopsis}}
                            
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['movie', 'movieimage'],
        computed: {},
    }
</script>

<style scoped>

    .movie-card{
        opacity: 0;
        animation: animateMovie .7s forwards
    }

    @keyframes animateMovie {
        0% {
            transform: translateY(-300px)
        }
        100% {
            opacity: 1;
            transform: none;
        }
    }

</style>
