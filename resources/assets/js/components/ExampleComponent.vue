<template>
<div>
    <button v-on:click="greet">Greet</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            greet: function() {
                axios.get(document.URL + '/asdf').then(response => console.log(response.data))
            }
        }
    }
</script>
