<template>
    <div class="w-screen h-screen blur_"></div>
    <form class="absolute top-0 left-0 mx-auto rounded-md p-4 bg-white">
        <p>Register</p>
    </form>
</template>
<script lang="ts" setup>

document.body.classList.remove("pt-3");
</script>
<style scoped>
    .blur_{
        backdrop-filter: blur(10px);
    }
</style>