<template>
    <div class="flex flex-col w-full overflow-y-scroll">
        <div v-for="n in hours.valueOf()" class="w-full h-full border p-7 flex justify-between items-center">
            <span>{{ 9+n-1 }} - {{ 9+n }}</span>
            <div class="p-2 text-white bg-green-500 rounded-md">Your appointement will be at {{ 9+n-1 }} - {{ 9+n }}</div>
            <span></span>
        </div>
    </div>
</template>
<script lang="ts" setup>
    import {watch, computed, Ref, ref,} from "vue";
    import { useCalendarStore } from "../store/CalendarStore";
    import { storeToRefs } from "pinia";
    let hours = 9;
    const {day} = storeToRefs(useCalendarStore());
    const dateInstance = new Date();
    if(new Date(dateInstance.getFullYear(), dateInstance.getMonth(), day.value.valueOf()).getDay() === 6)
        hours = 4;
</script>