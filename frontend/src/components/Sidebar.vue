<template>
    <div class="p-4 w-[20vw] flex flex-col">
        <button @click="toggleMenu" class="p-3 rounded-[15px] shadow-md flex justify-between items-center border">
            <span class="font-semibold">Options</span>
            <font-awesome-icon icon="fa-solid fa-chevron-down" />
        </button>
        <div v-if="toggle_menu" class="rounded-[15px] mt-3 p-3 flex flex-col justify-center items-center shadow-lg border">
            <p>Calendar</p>
            <p>settings</p>
        </div>
    </div>
</template>

<script lang="ts" setup>
    import {ref, computed} from "vue";

    let toggle_menu = ref<Boolean>(false);

    // const toggleMenu = ()=>{
    //     console.log(toggle_menu);
    //     toggle_menu = !toggle_menu;
    // };
</script>