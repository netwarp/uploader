<template>
    <video controls preload="auto">
        <source :src="src" type="video/webm">
    </video>
</template>

<script>
    export default {
        mounted() {
            console.log('video component')
        },
        props: ['src']
    }
</script>