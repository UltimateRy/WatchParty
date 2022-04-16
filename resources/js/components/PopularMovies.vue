<template>
    <div class="flex flex-wrap items-center align-center ">
        <a class="card-object m-3 p-3 items-center" v-for="popularMovie in popularMovies" :popularMovie="popularMovie" :key="popularMovie.id" v-bind:href="'/movies/'+ popularMovie.id" >
            <div class= "card relative text-center bg-white rounded-lg w-56">
                <div class ="card text-center bg-white rounded-lg w-56">
                    <!--img src='https://api.lorem.space/image/movie?w=150&h=220' class="card-image rounded-lg w-56"-->
                    <img v-bind:src="'images/movie-images/' + popularMovie.image + '.jpg'" class="card-image rounded-lg w-56">

                </div>
                <div class="card-title truncate text-ellipsis"> 
                    {{popularMovie.title}}
                </div>
            </div>
        </a>
    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['popularMovies'],
        computed: {},
    }
</script>

<style scoped>
.card {
    overflow: hidden;
    
}
.card-image{
    object-fit: cover;
    transition: transform .5s;
}
.card-object{
    opacity: 0;
    animation: animateMovies .7s forwards
}
.card:hover .card-image{
    transform:scale(1.15);
}
@keyframes animateMovies {
    0% {
        transform: translateY(-300px)
    }
    100% {
        opacity: 1;
        transform: none;
    }
}

</style>
