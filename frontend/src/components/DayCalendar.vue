<template>
    <div class="flex flex-col w-full overflow-y-scroll">
        <div v-for="n in hours" class="w-full h-full border p-7 flex justify-between items-center">
            <span>{{ 9+n-1 }} - {{ 9+n }}</span>
            <div class="p-2 text-white bg-green-500 rounded-md">Your appointement will be at {{ 9+n-1 }} - {{ 9+n }}</div>
            <span></span>
        </div>
    </div>
</template>
<script lang="ts" setup>
    let hours = 9;
</script>