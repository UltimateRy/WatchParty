<template>
    <div class="flex flex-wrap items-center align-center bg-gray-200 rounded-xl">
        <div class="m-3" v-for="movie in movies" :movie="movie" :key="movie.id">
            <label class ="text-center bg-white rounded-lg w-96">
                
                <input name="Movie" type="radio" :id="movie.id" :value="movie.title"> 
                
                <img v-bind:src="'/images/movie-images/' + movie.image + '.jpg'" class="w-[14rem] rounded-lg">
                
                
            </label>
        </div> 
    </div>
</template>

<script>
    const default_layout = "default";
    export default {
        props: ['movies'],
        computed: {},
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


</style>