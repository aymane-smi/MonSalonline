<template>
    <div class="p-4 w-[20vw] flex flex-col border-r h-[calc(100vh_-_64px)] shadow-lg">
        <button @click="toggleMenu" class="p-3 rounded-[15px] shadow-md flex justify-between items-center border">
            <span class="font-semibold">Options</span>
            <font-awesome-icon icon="fa-solid fa-chevron-down" />
        </button>
        <div v-if="toggle_menu" class="rounded-[15px] mt-3 p-3 flex flex-col justify-center items-center shadow-lg border">
            <p @click="$emit('switch', 1)" class="cursor-pointer">Calendar</p>
            <p @click="$emit('switch', 2)" class="cursor-pointer">settings</p>
        </div>
        <MonthCalendar />
    </div>
</template>

<script lang="ts" setup>
    import {ref, Ref} from "vue";
    import MonthCalendar from "./MonthCalendar.vue";

    let toggle_menu:Ref<Boolean> = ref(false);

    const toggleMenu = ()=>{
        toggle_menu.value = !toggle_menu.value;
    };
</script>