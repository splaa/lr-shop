<template>
    <div class="container">
        <h2>Article component</h2>
        <pre v-text="$attrs"/>
    </div>
</template>

<script>
    export default {
        name: 'Articlecomponent',
        mounted(){
            console.log('Component' + name + 'mounted');
        }
    };
</script>
